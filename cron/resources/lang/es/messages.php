<?php

return [
    'admin' => [
        'title' => 'Gestor de Cron',
        'permission' => 'Gestionar Cron',
        'description' => 'Este plugin le permite ejecutar tareas programadas de Azuriom desde un servicio externo de forma segura.',
        'url_label' => 'URL de Cron',
        'url_help' => 'Utilice esta URL para configurar su tarea cron externa. ¡Manténgala en secreto!',
        'regenerate_btn' => 'Regenerar clave',
        'regenerate_confirm' => '¿Está seguro de que desea regenerar la clave? La URL antigua dejará de funcionar.',
        'key_regenerated' => 'Clave de Cron regenerada con éxito.',
        'copy' => 'Copiar',
        'status' => 'Estado del Cron',
        'status_online' => 'En línea',
        'status_offline' => 'Fuera de línea',
        'last_execution' => 'Última ejecución: :time',
        'never' => 'Nunca',
        'secret_key' => 'Clave secreta (Bearer token)',
        'secret_key_desc' => 'Copie esta clave en el campo "Header" o "Authorization" de su gestor de tareas cron.',
    ],
    'tutorial' => [
        'title' => 'Tutorial: Configurar Cron-Job.org',
        'introduction' => 'Siga estos pasos para configurar la ejecución automática de sus tareas de Azuriom a través de un servicio externo gratuito.',
        'step1' => 'Cree una cuenta o inicie sesión en :url.',
        'step2' => 'Haga clic en "Create cronjob".',
        'step3' => 'En el campo "URL", pegue la URL mostrada arriba.',
        'step4' => 'Configure el horario en "Every 1 minute" y guarde.',
        'step5' => 'En la pestaña "Advanced", en la sección "Headers", establezca la clave "Authorization" como "Bearer" seguida de la "Secret key" anterior.',
        'step6' => 'En la pestaña "Advanced", en la sección "Advanced", en el campo "Request method", establézcalo en "POST".',
        'warning' => 'Si regenera su clave, no olvide actualizar su Bearer token en su gestor de tareas cron.',
    ],
];
