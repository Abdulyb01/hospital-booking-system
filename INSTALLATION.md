# Installation Guide

## Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server (or Nginx)
- phpMyAdmin (optional but recommended)
- Modern web browser

## Step-by-Step Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Abdulyb01/hosptal-booking-system.git
cd hosptal-booking-system
```

### 2. Set Up MySQL Database

1. Open phpMyAdmin or MySQL command line
2. Create a new database:
   ```sql
   CREATE DATABASE hospital_booking_system;
   ```
3. Import the database schema:
   ```bash
   mysql -u root -p hospital_booking_system < database/schema.sql
   ```

### 3. Configure Database Connection

1. Copy `backend/config/db.php.example` to `backend/config/db.php`
2. Edit `backend/config/db.php` with your database credentials:
   ```php
   $db_host = 'localhost';
   $db_user = 'root';
   $db_pass = 'your_password';
   $db_name = 'hospital_booking_system';
   ```

### 4. Deploy the Application

**For XAMPP:**
- Copy the folder to `C:\xampp\htdocs\hosptal-booking-system` (Windows)
- Access via `http://localhost/hosptal-booking-system`

**For Linux (Apache):**
- Copy to `/var/www/html/hosptal-booking-system`
- Set proper permissions:
  ```bash
  sudo chown -R www-data:www-data /var/www/html/hosptal-booking-system
  sudo chmod -R 755 /var/www/html/hosptal-booking-system
  ```

### 5. Start the Application

1. Start Apache and MySQL services
2. Open browser and navigate to `http://localhost/hosptal-booking-system`
3. Log in with default credentials

## Default Admin Credentials

- **Username:** admin@hospital.com
- **Password:** Admin@123

⚠️ **Change these credentials immediately after first login!**

## Troubleshooting

### Database Connection Error
- Verify MySQL is running
- Check database credentials in `backend/config/db.php`
- Ensure database exists

### File Upload Issues
- Check folder permissions for `upload/` directory
- Ensure `upload/` directory exists and is writable

### Email/SMS Not Working
- Configure SMTP settings in `backend/config/mail.php`
- Set up SMS gateway API keys

## Support

For issues and support, please open an issue on GitHub.
