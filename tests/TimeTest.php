<?php

// MailWizz runs in UTC; each test sets the application zone and restores it afterwards.
$inZone = function (string $zone, callable $test): void {
    $previous = date_default_timezone_get();
    date_default_timezone_set($zone);
    try {
        $test();
    } finally {
        date_default_timezone_set($previous);
    }
};

return [
    'Uhrzeiten stehen in der Zeitzone des Benutzers' => function () use ($inZone) {
        $inZone('UTC', function () {
            $autumn = gmmktime(22, 30, 0, 9, 27, 2026);
            $winter = gmmktime(12, 0, 0, 1, 15, 2026);
            assertSame('28.09.2026, 00:30 Uhr', DeutschExtResultPresenter::time($autumn, DeutschExtResultPresenter::timeZone('Europe/Berlin')));
            assertSame('15.01.2026, 13:00 Uhr', DeutschExtResultPresenter::time($winter, DeutschExtResultPresenter::timeZone('Europe/Berlin')));
            assertSame('27.09.2026, 18:30 Uhr', DeutschExtResultPresenter::time($autumn, DeutschExtResultPresenter::timeZone('America/New_York')));
        });
    },

    'ohne gültige Zeitzone gilt die Zeitzone der Anwendung' => function () use ($inZone) {
        foreach (['UTC', 'Asia/Tokyo'] as $default) {
            $inZone($default, function () use ($default) {
                foreach ([null, '', 'Mars/Olympus'] as $name) {
                    assertSame($default, DeutschExtResultPresenter::timeZone($name)->getName(), 'Zeitzone ' . var_export($name, true));
                }
            });
        }
        $inZone('Asia/Tokyo', function () {
            assertSame('28.09.2026, 07:30 Uhr', DeutschExtResultPresenter::time(gmmktime(22, 30, 0, 9, 27, 2026), DeutschExtResultPresenter::timeZone('')));
        });
    },

    'ohne Zeitpunkt steht „noch nie“' => function () {
        assertSame('noch nie', DeutschExtResultPresenter::time(0, new DateTimeZone('Europe/Berlin')));
    },
];
