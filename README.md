# Cron Manager Plugin for Azuriom

🌍 **[Version française](README.fr.md)**

## 📋 Description

**Cron Manager** is an Azuriom plugin that allows you to manage and secure the execution of scheduled tasks (cron) for your site via free external services like [Cron-Job.org](https://console.cron-job.org).

This plugin was created to solve a common problem: **the absence of native cron on shared hosting**. Without SSH access or server scheduled tasks, it becomes impossible to automatically execute Laravel commands like `schedule:run`, which are essential for Azuriom to function properly.

## 🎯 Why this plugin?

### Problem

On shared hosting, you generally don't have:
- SSH access
- Ability to configure cron tasks
- Server control

However, Azuriom requires regular execution of `php artisan schedule:run` to:
- Execute scheduled tasks

### Solution

This plugin exposes a **secure URL** that allows an external service to execute your cron tasks for you. The URL is protected by a unique secret key, ensuring that only authorized requests can trigger execution.

## ✨ Features

- ✅ **Secure URL**: Unique and regenerable authentication key
- ✅ **Real-time monitoring**: Visual cron status indicator (Online / Offline)
- ✅ **Timestamp**: Displays the last execution with a readable timestamp
- ✅ **Integrated tutorial**: Step-by-step guide to configure Cron-Job.org
- ✅ **Maintenance compatible**: The cron works even if the site is in maintenance mode
- ✅ **Modern admin interface**: Clean design with colored status badges

## 📦 Installation

1. Download the plugin
2. Place it in the `plugins/` folder of your Azuriom installation
3. Activate the plugin from the admin panel

## 🔧 Configuration

### 1. Access the admin panel

Go to **Extensions > Cron Manager**

### 2. Copy the URL

A unique URL is provided to you, example:
```
https://your-site.com/cron/execute?key=YOUR_SECRET_KEY
```

### 3. Configure Cron-Job.org (FREE)

1. Create an account on [console.cron-job.org](https://console.cron-job.org)
2. Create a new cron job
3. Paste the copied URL
4. Configure the interval: **Every minute** (`* * * * *`)
5. Activate the job

### 4. Verification

Return to the plugin's admin panel. The status should change to **🟢 Online** after the first successful execution.

## 🔐 Security

- **Secret key**: Automatically generated during installation
- **Regeneration**: Ability to regenerate the key at any time
- **Maintenance protection**: The cron bypasses maintenance mode to ensure continuity

## 🌐 Compatibility

- **Azuriom**: 1.1.0+
- **PHP**: 7.4+
- **Hosting**: Shared, VPS, Dedicated

## 🆘 Support

For any questions or issues:
- **Minecraft server*: [https://www.arcadia-echoes-of-power.fr](https://www.arcadia-echoes-of-power.fr)
- **Discord**: [https://arcadia-echoes-of-power.fr/discord](https://arcadia-echoes-of-power.fr/discord)

## 📄 License

This plugin is distributed under the MIT license. See the [LICENSE](LICENSE) file for more details.

## 👨‍💻 Author

Developed by **vyrriox**, **Brice6** for the Azuriom community.

---

💡 **Tip**: Remember to regularly check the cron status from your admin panel to ensure everything is working properly!
