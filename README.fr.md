# Plugin Cron Manager pour Azuriom

🌍 **[English version](README.md)**

## 📋 Description

**Cron Manager** est un plugin Azuriom qui permet de gérer et sécuriser l'exécution des tâches planifiées (cron) et du traitement de la file d'attente des emails de votre site via des services externes gratuits comme [Cron-Job.org](https://console.cron-job.org).

Ce plugin a été créé pour résoudre un problème commun : **l'absence de cron natif sur les hébergements mutualisés**. Sans accès SSH ou aux tâches planifiées du serveur, il devient impossible d'exécuter automatiquement les commandes Laravel comme `schedule:run` ou `queue:work`, essentielles au bon fonctionnement d'Azuriom.

## 🎯 Pourquoi ce plugin ?

### Problématique

Sur un hébergement mutualisé (shared hosting), vous n'avez généralement pas :
- Accès SSH
- Possibilité de configurer des tâches cron
- Contrôle sur le serveur

Pourtant, Azuriom nécessite l'exécution régulière de :
- `php artisan schedule:run` pour exécuter les tâches planifiées
- `php artisan queue:work` pour traiter la file d'attente des emails

### Solution

Ce plugin expose des **URLs sécurisées** qui permettent à un service externe d'exécuter vos tâches cron et de traiter la file d'attente des emails à votre place. Les URLs sont protégées par une clé secrète unique, garantissant que seules les requêtes autorisées peuvent déclencher l'exécution.

## ✨ Fonctionnalités

- ✅ **Gestionnaire Cron** : Exécute les tâches planifiées automatiquement
- ✅ **Gestionnaire de File d'Attente** : Traite la file d'attente des emails automatiquement
- ✅ **URLs sécurisées** : Clé d'authentification unique et régénérable
- ✅ **Monitoring en temps réel** : Indicateurs visuels de statut (En ligne / Hors ligne)
- ✅ **Horodatage** : Affiche la dernière exécution avec un timestamp lisible
- ✅ **Tutoriel intégré** : Guide pas à pas pour configurer Cron-Job.org
- ✅ **Compatible maintenance** : Fonctionne même si le site est en mode maintenance
- ✅ **Interface admin moderne** : Design épuré avec badges de statut colorés

## 📦 Installation

1. Téléchargez le plugin
2. Placez-le dans le dossier `plugins/` de votre installation Azuriom
3. Activez le plugin depuis le panel admin

## 🔧 Configuration

### 1. Accéder au panel admin

Rendez-vous dans **Extensions > Cron Manager**

### 2. Copier l'URL et la Clé Secrète

Dans le panel admin, vous trouverez l'URL d'exécution et votre clé secrète.

**Exemple d'URL :**
```
https://votre-site.fr/cron/execute
```

### 3. Configurer Cron-Job.org (GRATUIT)

Suivez ces étapes pour configurer l'exécution automatique de vos tâches Azuriom via un service externe gratuit.

1. Créez un compte ou connectez-vous sur [console.cron-job.org](https://console.cron-job.org).
2. Cliquez sur **"Create cronjob"**.
3. Dans l'onglet **"COMMON"** :
   - **Titre** : `Cron job`
   - **URL** : Collez l'URL d'exécution affichée dans votre panel admin.
   - **Calendrier d'exécution** : Sélectionnez **"Chaque 1 minute"**.
4. Dans l'onglet **"AVANCÉ"** :
   - Dans la partie **"En-têtes"**, cliquez sur **"+ AJOUTER"** :
     - **Clé** : `Authorization`
     - **Valeur** : `Bearer ` (avec un espace à la fin) suivi de votre **Clé secrète**.
   - Dans la partie **"Avancé"** (en bas) :
     - **Méthode de demande** : Sélectionnez **POST**.
5. Cliquez sur **"CRÉER UN CRONJOB"** (ou le bouton de sauvegarde) pour finaliser.

**Vidéo tutoriel :** [https://www.youtube.com/watch?v=7q2Rd9w_FUI](https://www.youtube.com/watch?v=7q2Rd9w_FUI)

### 4. Configurer le Gestionnaire de File d'Attente (pour les emails)

Si vous souhaitez traiter automatiquement la file d'attente des emails :

1. Dans le même panel admin, trouvez la section **Gestionnaire de File d'Attente** sous le Gestionnaire Cron
2. Copiez l'**URL de Queue** (ex : `https://votre-site.fr/cron/queue/execute`)
3. Créez un **deuxième cron job** sur Cron-Job.org avec la même configuration que l'étape 3, mais :
   - Utilisez l'**URL de Queue** à la place
   - Définissez le calendrier sur **Toutes les 5 minutes** (ou selon vos besoins)
   - Utilisez le **même Bearer token** pour l'authentification
4. Cela traitera automatiquement tous les emails en attente

### 5. Vérification

Retournez sur le panel admin du plugin. Le statut doit passer à **🟢 En Ligne** après la première exécution réussie.

## 🔐 Sécurité

- **Clé secrète** : Générée automatiquement lors de l'installation
- **Régénération** : Possibilité de régénérer la clé à tout moment
- **Protection maintenance** : Le cron contourne le mode maintenance pour assurer la continuité

## 🌐 Compatibilité

- **Azuriom** : 1.1.0+
- **PHP** : 7.4+
- **Hébergement** : Mutualisé, VPS, Dédié

## 🆘 Support

Pour toute question ou problème :
- **Minecraft serveur** : [https://www.arcadia-echoes-of-power.fr](https://www.arcadia-echoes-of-power.fr)
- **Discord** : [https://arcadia-echoes-of-power.fr/discord](https://arcadia-echoes-of-power.fr/discord)

## 📄 Licence

Ce plugin est distribué sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 👨‍💻 Auteur

Développé par **vyrriox**, **Brice6** pour la communauté Azuriom.

---

💡 **Astuce** : Pensez à vérifier régulièrement le statut du cron depuis votre panel admin pour vous assurer que tout fonctionne correctement !
