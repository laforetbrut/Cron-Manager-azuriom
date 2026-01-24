<?php

return [
    'admin' => [
        'title' => 'Gestionnaire Cron',
        'permission' => 'Gérer le Cron',
        'description' => 'Ce plugin vous permet d\'exécuter les tâches planifiées d\'Azuriom depuis un service externe de manière sécurisée.',
        'url_label' => 'URL de Cron',
        'url_help' => 'Utilisez cette URL pour configurer votre tâche cron externe. Gardez-la secrète !',
        'regenerate_btn' => 'Régénérer la clé',
        'regenerate_confirm' => 'Êtes-vous sûr de vouloir régénérer la clé ? L\'ancienne URL ne fonctionnera plus.',
        'key_regenerated' => 'La clé Cron a été régénérée avec succès.',
        'copy' => 'Copier',
        'status' => 'Statut du Cron',
        'status_online' => 'En Ligne',
        'status_offline' => 'Hors Ligne',
        'last_execution' => 'Dernière exécution : :time',
        'never' => 'Jamais',
        'secret_key' => 'Clé secrète (Bearer token)',
        'secret_key_desc' => 'Copiez cette clé dans le champ "Header" ou "Authorization" de votre gestionnaire de cron.
',
    ],
    'tutorial' => [
        'title' => 'Tutoriel : Configurer Cron-Job.org',
        'introduction' => 'Suivez ces étapes pour configurer l\'exécution automatique de vos tâches Azuriom via un service externe gratuit.',
        'step1' => 'Créez un compte ou connectez-vous sur :url.',
        'step2' => 'Cliquez sur "Create cronjob".',
        'step3' => 'Dans le champ "URL", collez l\'URL affichée ci-dessus.',
        'step4' => 'Configurez la fréquence sur "Every 1 minute" (Toutes les minutes) et sauvegardez.',
        'step5' => 'Dans l\'onglet "Avancé, dans la partie "En-tête", mettez en clé "Authorization" et en valeur "Bearer" en préfix suivi du "Secret key" ci-dessus',
        'step6' => 'Dans l\'onglet "Avancé, dans la partie "Avancé", dans la "Méthode de demande" mettre POST',
        'warning' => 'Si vous régénérez votre clé, n\'oubliez pas de mettre à jour votre Bearer token dans votre gestionnaire de tâches cron.',
    ],
];
