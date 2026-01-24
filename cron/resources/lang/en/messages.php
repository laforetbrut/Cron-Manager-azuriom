<?php

return [
    'admin' => [
        'title' => 'Cron Manager',
        'permission' => 'Manage Cron',
        'description' => 'This plugin allows you to execute Azuriom scheduled tasks from an external service securely.',
        'url_label' => 'Cron URL',
        'url_help' => 'Use this URL to configure your external cron job. Keep it secret!',
        'regenerate_btn' => 'Regenerate Key',
        'regenerate_confirm' => 'Are you sure you want to regenerate the key? The old URL will stop working.',
        'key_regenerated' => 'Cron key regenerated successfully.',
        'copy' => 'Copy',
        'status' => 'Cron Status',
        'status_online' => 'Online',
        'status_offline' => 'Offline',
        'last_execution' => 'Last execution: :time',
        'never' => 'Never',
        'secret_key' => 'Secret Key (Bearer token)',
        'secret_key_desc' => 'Copy this key into the "Header" or "Authorization" field of your cron job manager.',
    ],
    'tutorial' => [
        'title' => 'Tutorial: Configure Cron-Job.org',
        'introduction' => 'Follow these steps to configure automatic execution of your Azuriom tasks via a free external service.',
        'step1' => 'Create an account or login at :url.',
        'step2' => 'Click on "Create cronjob".',
        'step3' => 'In the "URL" field, paste the URL displayed above.',
        'step4' => 'Set the schedule to "Every 1 minute" and save.',
        'step5' => 'In the "Advanced" tab, in the "Headers" section, set the "Authorization" key to "Bearer" followed by the "Secret key" above.',
        'step6' => 'In the "Advanced" tab, in the "Advanced" section, in the "Request method" field, set it to "POST".',
        'warning' => 'If you regenerate your key, do not forget to update your Bearer token in your cron job manager.',
    ],
];
