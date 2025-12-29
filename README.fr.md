# Plugin Cron Manager pour Azuriom

🌍 **[English version](README.md)**

## 📋 Description

**Cron Manager** est un plugin Azuriom qui permet de gérer et sécuriser l'exécution des tâches planifiées (cron) de votre site via des services externes gratuits comme [Cron-Job.org](https://console.cron-job.org).

Ce plugin a été créé pour résoudre un problème commun : **l'absence de cron natif sur les hébergements mutualisés**. Sans accès SSH ou aux tâches planifiées du serveur, il devient impossible d'exécuter automatiquement les commandes Laravel comme `schedule:run`, essentielles au bon fonctionnement d'Azuriom.

## 🎯 Pourquoi ce plugin ?

### Problématique

Sur un hébergement mutualisé (shared hosting), vous n'avez généralement pas :
- Accès SSH
- Possibilité de configurer des tâches cron
- Contrôle sur le serveur

Pourtant, Azuriom nécessite l'exécution régulière de `php artisan schedule:run` pour :
- Exécuter les tâches planifiées

### Solution

Ce plugin expose une **URL sécurisée** qui permet à un service externe d'exécuter vos tâches cron à votre place. L'URL est protégée par une clé secrète unique, garantissant que seules les requêtes autorisées peuvent déclencher l'exécution.

## ✨ Fonctionnalités

- ✅ **URL sécurisée** : Clé d'authentification unique et régénérable
- ✅ **Monitoring en temps réel** : Indicateur visuel du statut du cron (En ligne / Hors ligne)
- ✅ **Horodatage** : Affiche la dernière exécution avec un timestamp lisible
- ✅ **Tutoriel intégré** : Guide pas à pas pour configurer Cron-Job.org
- ✅ **Compatible maintenance** : Le cron fonctionne même si le site est en mode maintenance
- ✅ **Interface admin moderne** : Design épuré avec badges de statut colorés

## 📦 Installation

1. Téléchargez le plugin
2. Placez-le dans le dossier `plugins/` de votre installation Azuriom
3. Activez le plugin depuis le panel admin

## 🔧 Configuration

### 1. Accéder au panel admin

Rendez-vous dans **Extensions > Cron Manager**

### 2. Copier l'URL

Une URL unique vous est fournie, exemple :
```
https://votre-site.fr/cron/execute?key=VOTRE_CLE_SECRETE
```

### 3. Configurer Cron-Job.org (GRATUIT)

1. Créez un compte sur [console.cron-job.org](https://console.cron-job.org)
2. Créez un nouveau cron job
3. Collez l'URL copiée
4. Configurez l'intervalle : **Toutes les minutes** (`* * * * *`)
5. Activez le job

### 4. Vérification

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
- **Site Web** : [https://www.arcadia-echoes-of-power.fr](https://www.arcadia-echoes-of-power.fr)
- **Discord** : [https://arcadia-echoes-of-power.fr/discord](https://arcadia-echoes-of-power.fr/discord)

## 📄 Licence

Ce plugin est distribué sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 👨‍💻 Auteur

Développé par **vyrriox** pour la communauté Azuriom.

---

💡 **Astuce** : Pensez à vérifier régulièrement le statut du cron depuis votre panel admin pour vous assurer que tout fonctionne correctement !
