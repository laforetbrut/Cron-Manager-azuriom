# Cron Manager Plugin for Azuriom

🌍 **[Version française](README.fr.md)**

## 📋 Description

**Cron Manager** is an Azuriom plugin that allows you to manage and secure the execution of scheduled tasks (cron) and email queue processing for your site via free external services like [Cron-Job.org](https://console.cron-job.org).

This plugin was created to solve a common problem: **the absence of native cron on shared hosting**. Without SSH access or server scheduled tasks, it becomes impossible to automatically execute Laravel commands like `schedule:run` or `queue:work`, which are essential for Azuriom to function properly.

## 🎯 Why this plugin?

### Problem

On shared hosting, you generally don't have:
- SSH access
- Ability to configure cron tasks
- Server control

However, Azuriom requires regular execution of:
- `php artisan schedule:run` to execute scheduled tasks
- `php artisan queue:work` to process email queue

### Solution

This plugin exposes **secure URLs** that allow an external service to execute your cron tasks and process email queues for you. The URLs are protected by a unique secret key, ensuring that only authorized requests can trigger execution.

## ✨ Features

- ✅ **Cron Manager**: Execute scheduled tasks automatically
- ✅ **Queue Manager**: Process email queue automatically
- ✅ **Secure URLs**: Unique and regenerable authentication key
- ✅ **Real-time monitoring**: Visual status indicators (Online / Offline)
- ✅ **Timestamp**: Displays the last execution with a readable timestamp
- ✅ **Integrated tutorial**: Step-by-step guide to configure Cron-Job.org
- ✅ **Maintenance compatible**: Works even if the site is in maintenance mode
- ✅ **Modern admin interface**: Clean design with colored status badges

## 📦 Installation

1. Download the plugin
2. Place it in the `plugins/` folder of your Azuriom installation
3. Activate the plugin from the admin panel

## 🔧 Configuration

### 1. Access the admin panel

Go to **Extensions > Cron Manager**

### 2. Copy the URL and Secret Key

In the admin panel, you will find the execution URL and your secret key.

**Example URL:**
```
https://your-site.com/cron/execute
```

### 3. Configure Cron-Job.org (FREE)

Follow these steps to configure the automatic execution of your Azuriom tasks via a free external service.

1. Create an account or log in at [console.cron-job.org](https://console.cron-job.org).
2. Click on **"Create cronjob"**.
3. In the **"COMMON"** tab:
   - **Title**: `Cron job`
   - **URL**: Paste the execution URL shown in your admin panel.
   - **Execution schedule**: Select **"Every 1 minute"**.
4. In the **"AVANCÉ"** tab:
   - In the **"En-têtes"** section, click on **"+ AJOUTER"**:
     - **Key**: `Authorization`
     - **Value**: `Bearer ` (with a space at the end) followed by your **Secret key**.
   - In the **"Avancé"** section (at the bottom):
     - **Request method**: Select **POST**.
5. Click on **"CREATE CRONJOB"** (or the save button) to finalize.

**Tutorial video:** [https://www.youtube.com/watch?v=7q2Rd9w_FUI](https://www.youtube.com/watch?v=7q2Rd9w_FUI)

### 4. Configure Queue Manager (for emails)

If you want to automatically process email queues:

1. In the same admin panel, find the **Queue Manager** section below the Cron Manager
2. Copy the **Queue URL** (e.g., `https://your-site.com/cron/queue/execute`)
3. Create a **second cron job** on Cron-Job.org with the same configuration as step 3, but:
   - Use the **Queue URL** instead
   - Set the schedule to **Every 5 minutes** (or according to your needs)
   - Use the **same Bearer token** for authentication
4. This will process all pending emails automatically

### 5. Verification

Return to the plugin's admin panel. The status should change to **🟢 Online** after the first successful execution.

## 🔐 Security

- **Secret key**: Automatically generated during installation
- **Regeneration**: Ability to regenerate the key at any time
- **Maintenance protection**: The cron bypasses maintenance mode to ensure continuity

## 🌐 Compatibility

- **Azuriom**: 1.2.0+
- **PHP**: 8.0+
- **Hosting**: Shared, VPS, Dedicated

## 🆘 Support

For any questions or issues:
- **Minecraft server**: [https://www.arcadia-echoes-of-power.fr](https://www.arcadia-echoes-of-power.fr)
- **Discord**: [https://arcadia-echoes-of-power.fr/discord](https://arcadia-echoes-of-power.fr/discord)

## 📄 License

This plugin is distributed under the MIT license. See the [LICENSE](LICENSE) file for more details.

## 👨‍💻 Author

Developed by **vyrriox**, **Brice6** for the Azuriom community.

---

💡 **Tip**: Remember to regularly check the cron status from your admin panel to ensure everything is working properly!
