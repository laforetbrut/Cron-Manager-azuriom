# Historique des modifications

Tous les changements notables apportés au plugin Cron Manager pour Azuriom seront documentés dans ce fichier.

## [1.1.0] - 2026-01-26

### Ajouté
- **Gestionnaire de File d'Attente** : Nouvelle fonctionnalité pour traiter automatiquement la file d'attente des emails via des tâches cron externes
- Ajout de la méthode `handleQueue()` dans `CronController` pour exécuter `php artisan queue:work --stop-when-empty`
- Nouvelle route `/cron/queue/execute` pour le traitement de la file d'attente
- Section Gestionnaire de File d'Attente dans le panneau d'administration avec :
  - Affichage de l'URL de queue
  - Indicateur de statut d'exécution de la queue (En ligne/Hors ligne)
  - Horodatage de la dernière exécution
  - Tutoriel de configuration
- Traductions pour le Gestionnaire de File d'Attente dans 4 langues (français, anglais, espagnol, allemand)
- Documentation pour le Gestionnaire de File d'Attente dans README.md et README.fr.md

### Modifié
- Mise à jour de la version du plugin de 1.0.0 à 1.1.0
- Amélioration des fichiers README pour inclure les instructions de configuration du Gestionnaire de File d'Attente

## [1.0.0] - Version initiale

### Ajouté
- Version initiale du plugin Cron Manager
- Exécution sécurisée des tâches cron via des services externes
- Authentification par Bearer token
- Surveillance du statut du cron (En ligne/Hors ligne)
- Affichage de l'horodatage de la dernière exécution
- Fonctionnalité de régénération de clé
- Panneau d'administration avec tutoriel intégré
- Support multilingue (français, anglais, espagnol, allemand)
- Compatibilité avec les environnements d'hébergement mutualisé
- Contournement du mode maintenance pour l'exécution du cron
