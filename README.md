# FMLite (File Manager Lite)

A lightweight, single-file PHP web file manager designed for fast, secure, and easy remote file management. **FMLite** allows you to manage your server's files directly from any web browser without needing heavy control panels or FTP clients.

Perfect for quick server administrative tasks, shared hosting environments, and low-resource web servers.

<img width="1328" height="544" alt="FMLite" src="https://github.com/user-attachments/assets/63b12206-dfff-4afb-9c26-2aa6f0508841" />


## 🚀 Features

* **Zero Configuration:** Drop the script into any directory on your PHP-enabled server and start managing files instantly.
* **Core File Operations:** Create, rename, delete, copy, move, and edit files directly in the browser.
* **File Upload & Download:** Easily upload files to your server or download them as zip archives.
* **Code/Text Editor:** Built-in lightweight syntax highlighting or plain text editing for quick configuration changes.
* **Responsive UI:** Clean, mobile-friendly interface so you can manage your server on the go.
* **Secure Access:** Simple authentication/password protection to keep unauthorized users out.

---

## 🛠️ Quick Start

Follow these three simple steps to secure, upload, and start using **FMLite**:

### 1. Set Your Password
Before uploading, open the script in a text editor and change the default security credentials to protect your server.
* Open your main PHP file (e.g., `index.php`).
* Locate the configuration array near the top of the file:
  ```php
  $password='your_password';
  ```
### 2. Upload the Script
Upload the single FMLite.php file (or the entire fmlite directory) to your web server using your preferred transfer method:

* **Via FTP/SFTP: Drag and drop the file into your public web folder (e.g., public_html, www, or /var/www/html/).

* **Via cPanel/Plesk: Use the hosting control panel's built-in file manager to upload the script directly.

### 3. Launch & Start Managing
Open your web browser and navigate to the URL where you uploaded the file:

[http://yourdomain.com/FMLite.php](http://yourdomain.com/FMLite.php)

## 📄 License
Distributed under the MIT License.
