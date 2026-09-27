<?php
// Minimal test runner without dependencies. Every file tests/*Test.php returns
// an array of test name => closure. A test fails when it throws.
//
//   php tests/run.php

declare(strict_types=1);

define('MW_PATH', __DIR__);

$root = dirname(__DIR__);
foreach (glob($root . '/deutsch/common/lib/*.php') as $file) {
    require_once $file;
}

final class AssertionFailed extends RuntimeException
{
}

function assertSame($expected, $actual, string $message = ''): void
{
    if ($expected !== $actual) {
        throw new AssertionFailed(($message !== '' ? $message . ': ' : '') . 'erwartet ' . var_export($expected, true) . ', erhalten ' . var_export($actual, true));
    }
}

function assertTrue(bool $condition, string $message = 'Bedingung nicht erfüllt'): void
{
    if (!$condition) {
        throw new AssertionFailed($message);
    }
}

function assertThrows(string $class, callable $callback, string $contains = ''): void
{
    try {
        $callback();
    } catch (Throwable $e) {
        if (!$e instanceof $class) {
            throw new AssertionFailed('erwartet ' . $class . ', erhalten ' . get_class($e) . ': ' . $e->getMessage());
        }
        if ($contains !== '' && !str_contains($e->getMessage(), $contains)) {
            throw new AssertionFailed('Meldung enthält nicht „' . $contains . '“: ' . $e->getMessage());
        }

        return;
    }
    throw new AssertionFailed('erwartet ' . $class . ', es wurde nichts geworfen');
}

$passed = 0;
$failed = 0;
foreach (glob(__DIR__ . '/*Test.php') as $file) {
    $tests = require $file;
    foreach ($tests as $name => $test) {
        try {
            $test();
            $passed++;
        } catch (Throwable $e) {
            $failed++;
            printf("FEHLER %s › %s\n   %s\n", basename($file, '.php'), $name, $e->getMessage());
        }
    }
}

printf("%d Tests bestanden, %d fehlgeschlagen.\n", $passed, $failed);
exit($failed > 0 ? 1 : 0);
