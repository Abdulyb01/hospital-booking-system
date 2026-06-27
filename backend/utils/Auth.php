<?php
/**
 * Authentication Handler
 */

class Auth {
    
    /**
     * Hash password
     */
    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    
    /**
     * Verify password
     */
    public static function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
    
    /**
     * Generate token
     */
    public static function generateToken() {
        return bin2hex(random_bytes(32));
    }
    
    /**
     * Start session
     */
    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    /**
     * Check if user is authenticated
     */
    public static function isAuthenticated() {
        self::startSession();
        return isset($_SESSION['user_id']);
    }
    
    /**
     * Get current user
     */
    public static function getCurrentUser() {
        self::startSession();
        return $_SESSION['user'] ?? null;
    }
    
    /**
     * Get current user ID
     */
    public static function getCurrentUserId() {
        self::startSession();
        return $_SESSION['user_id'] ?? null;
    }
    
    /**
     * Require authentication
     */
    public static function requireAuth() {
        if (!self::isAuthenticated()) {
            Response::error('Unauthorized', 401);
        }
    }
    
    /**
     * Require role
     */
    public static function requireRole($role) {
        self::requireAuth();
        if ($_SESSION['user_role'] !== $role) {
            Response::error('Forbidden', 403);
        }
    }
    
    /**
     * Logout
     */
    public static function logout() {
        self::startSession();
        session_destroy();
    }
}
?>
