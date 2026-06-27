<?php
/**
 * Application Configuration
 */

// Application Settings
define('APP_NAME', 'Hospital Booking System');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost/hosptal-booking-system');
define('APP_TIMEZONE', 'UTC');

// File Upload Settings
define('UPLOAD_DIR', __DIR__ . '/../../upload/');
define('MAX_UPLOAD_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx']);

// Session Settings
define('SESSION_TIMEOUT', 3600); // 1 hour
define('REMEMBER_ME_DURATION', 30 * 24 * 3600); // 30 days

// Email Settings
define('MAIL_FROM', 'noreply@hospital.com');
define('MAIL_FROM_NAME', 'Hospital Booking System');
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-app-password');

// SMS Settings (Twilio or similar)
define('SMS_ENABLED', false);
define('SMS_API_KEY', '');
define('SMS_API_SECRET', '');

// Reminder Settings
define('REMINDER_ENABLED', true);
define('REMINDER_EMAIL_ENABLED', true);
define('REMINDER_SMS_ENABLED', false);
define('REMINDER_PUSH_ENABLED', false);

// Appointment Settings
define('APPOINTMENT_SLOT_DURATION', 30); // minutes
define('APPOINTMENT_BOOKING_DAYS_AHEAD', 90);
define('APPOINTMENT_CANCELLATION_HOURS_BEFORE', 24);

// Default Reminder Times (in hours before appointment)
define('DEFAULT_REMINDERS', [24, 12, 1]); // 24 hours, 12 hours, 1 hour before

// Pagination
define('ITEMS_PER_PAGE', 10);

// Set Timezone
date_default_timezone_set(APP_TIMEZONE);

// Error Reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../../logs/error.log');
?>
