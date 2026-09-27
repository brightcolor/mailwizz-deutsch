<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Loads a text package from GitHub (or any other https address): first the
 * package description manifest.json, then the text file next to it. The text
 * file is only accepted when its SHA-256 matches the description.
 */
final class DeutschExtRemoteSource
{
    private const MANIFEST_MAX_BYTES = 1048576;

    public function __construct(
        private string $manifestUrl,
        private int $timeoutSeconds,
        private int $maxBytes,
        private string $userAgent
    ) {
    }

    /**
     * @return array{version: string, sha256: string, json: string}
     */
    public function fetch(string $language): array
    {
        $manifestJson = $this->get($this->manifestUrl, self::MANIFEST_MAX_BYTES);
        try {
            $manifest = json_decode($manifestJson, true, 32, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            throw new DeutschExtException('Die Paketbeschreibung (manifest.json) ist kein gültiges JSON. Prüfe die Adresse in den Einstellungen; bis dahin gelten die installierten Texte.');
        }
        if (!is_array($manifest) || ($manifest['format'] ?? null) !== DeutschExtBundle::FORMAT) {
            throw new DeutschExtException('Die Paketbeschreibung hat ein unbekanntes Format. Aktualisiere die Erweiterung; bis dahin gelten die installierten Texte.');
        }

        $name = $language . '.json';
        $file = $manifest['files'][$name] ?? null;
        if (!is_array($file) || !is_string($file['sha256'] ?? null) || !preg_match('/^[a-f0-9]{64}$/', $file['sha256'])) {
            throw new DeutschExtException(sprintf('Die Paketbeschreibung enthält keine Textdatei für „%s“. Prüfe den Sprachcode und die Adresse in den Einstellungen.', $language));
        }
        $version = is_string($manifest['version'] ?? null) ? $manifest['version'] : '';
        if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
            throw new DeutschExtException('Die Paketbeschreibung hat keine gültige Versionsnummer. Bis zur nächsten Veröffentlichung gelten die installierten Texte.');
        }

        $json = $this->get(self::sibling($this->manifestUrl, $name), $this->maxBytes);
        if (!hash_equals($file['sha256'], hash('sha256', $json))) {
            throw new DeutschExtException('Die geladene Textdatei passt nicht zur Prüfsumme in der Paketbeschreibung und wurde verworfen. Beim nächsten Prüflauf folgt ein neuer Versuch.');
        }

        return ['version' => $version, 'sha256' => $file['sha256'], 'json' => $json];
    }

    /**
     * Address of a file in the same folder as the package description.
     */
    public static function sibling(string $url, string $file): string
    {
        $path = (string)parse_url($url, PHP_URL_PATH);
        $base = substr($url, 0, strpos($url, $path) + strrpos($path, '/') + 1);

        return $base . rawurlencode($file);
    }

    private function get(string $url, int $limit): string
    {
        try {
            $response = httpClient()->request('GET', $url, [
                'timeout'         => $this->timeoutSeconds,
                'connect_timeout' => min(10, $this->timeoutSeconds),
                'http_errors'     => false,
                'stream'          => true,
                'allow_redirects' => ['max' => 5, 'protocols' => ['https']],
                'headers'         => ['User-Agent' => $this->userAgent, 'Accept' => 'application/json, application/octet-stream'],
            ]);
        } catch (Throwable $e) {
            throw new DeutschExtException(sprintf(
                'Die Adresse %s war nicht erreichbar (%s). Es gelten weiter die installierten Texte; der nächste Versuch folgt beim nächsten Prüflauf.',
                $url,
                $e->getMessage()
            ));
        }

        $status = $response->getStatusCode();
        if ($status !== 200) {
            throw new DeutschExtException(sprintf(
                'Der Abruf von %s ergab HTTP %d. Prüfe die Adresse in den Einstellungen; bis dahin gelten die installierten Texte.',
                $url,
                $status
            ));
        }

        $body = $response->getBody();
        $data = '';
        while (!$body->eof()) {
            $data .= $body->read(65536);
            if (strlen($data) > $limit) {
                throw new DeutschExtException(sprintf(
                    'Die Datei unter %s ist größer als erlaubt (%s MB). Ist das so gewollt, erhöhe „Größte Download-Datei“ in den Einstellungen.',
                    $url,
                    number_format($limit / 1048576, 0, ',', '.')
                ));
            }
        }

        return $data;
    }
}
