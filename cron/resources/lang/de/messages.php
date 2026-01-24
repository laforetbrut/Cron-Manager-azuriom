<?php

return [
    'admin' => [
        'title' => 'Cron-Manager',
        'permission' => 'Cron verwalten',
        'description' => 'Dieses Plugin ermöglicht es Ihnen, geplante Azuriom-Aufgaben sicher von einem externen Dienst auszuführen.',
        'url_label' => 'Cron-URL',
        'url_help' => 'Verwenden Sie diese URL, um Ihren externen Cron-Job zu konfigurieren. Halten Sie sie geheim!',
        'regenerate_btn' => 'Schlüssel regenerieren',
        'regenerate_confirm' => 'Sind Sie sicher, dass Sie den Schlüssel regenerieren möchten? Die alte URL wird nicht mehr funktionieren.',
        'key_regenerated' => 'Cron-Schlüssel erfolgreich regeneriert.',
        'copy' => 'Kopieren',
        'status' => 'Cron-Status',
        'status_online' => 'Online',
        'status_offline' => 'Offline',
        'last_execution' => 'Letzte Ausführung: :time',
        'never' => 'Nie',
        'secret_key' => 'Geheimschlüssel (Bearer token)',
        'secret_key_desc' => 'Kopieren Sie diesen Schlüssel in das Feld „Header“ oder „Authorization“ Ihres Cron-Job-Managers.',
    ],
    'tutorial' => [
        'title' => 'Tutorial: Cron-Job.org konfigurieren',
        'introduction' => 'Folgen Sie diesen Schritten, um die automatische Ausführung Ihrer Azuriom-Aufgaben über einen kostenlosen externen Dienst zu konfigurieren.',
        'step1' => 'Erstellen Sie ein Konto oder melden Sie sich unter :url an.',
        'step2' => 'Klicken Sie auf „Create cronjob“.',
        'step3' => 'Fügen Sie im Feld „URL“ die oben angezeigte URL ein.',
        'step4' => 'Stellen Sie den Zeitplan auf „Every 1 minute“ ein und speichern Sie.',
        'step5' => 'Setzen Sie im Reiter „Advanced“ im Abschnitt „Headers“ den Schlüssel „Authorization“ auf „Bearer“, gefolgt vom oben genannten „Secret key“.',
        'step6' => 'Stellen Sie im Reiter „Advanced“ im Abschnitt „Advanced“ das Feld „Request method“ auf „POST“.',
        'warning' => 'Wenn Sie Ihren Schlüssel regenerieren, vergessen Sie nicht, Ihr Bearer token in Ihrem Cron-Job-Manager zu aktualisieren.',
    ],
];
