<?php
/**
 * Hospital Booking System - Backend API Router
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Load configuration
require_once 'config/config.php';
require_once 'config/db.php';

// Load utilities
require_once 'utils/Response.php';
require_once 'utils/Auth.php';
require_once 'utils/Validator.php';

// Get request method and path
$request_method = $_SERVER['REQUEST_METHOD'];
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_path = str_replace('/hosptal-booking-system/backend/api/', '', $request_path);

// Route the request
$routes = [
    'auth' => 'controllers/AuthController.php',
    'patients' => 'controllers/PatientController.php',
    'appointments' => 'controllers/AppointmentController.php',
    'doctors' => 'controllers/DoctorController.php',
    'departments' => 'controllers/DepartmentController.php',
    'followups' => 'controllers/FollowupController.php',
    'reminders' => 'controllers/ReminderController.php',
    'feedback' => 'controllers/FeedbackController.php',
    'notifications' => 'controllers/NotificationController.php'
];

$endpoint = explode('/', $request_path)[0];

if (isset($routes[$endpoint])) {
    require_once $routes[$endpoint];
} else {
    Response::error('Endpoint not found', 404);
}
?>
