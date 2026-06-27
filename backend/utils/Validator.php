<?php
/**
 * Validation Helper
 */

class Validator {
    
    private static $errors = [];
    
    /**
     * Get errors
     */
    public static function getErrors() {
        return self::$errors;
    }
    
    /**
     * Clear errors
     */
    public static function clearErrors() {
        self::$errors = [];
    }
    
    /**
     * Add error
     */
    public static function addError($field, $message) {
        self::$errors[$field] = $message;
    }
    
    /**
     * Has errors
     */
    public static function hasErrors() {
        return !empty(self::$errors);
    }
    
    /**
     * Validate email
     */
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    /**
     * Validate phone
     */
    public static function validatePhone($phone) {
        return preg_match('/^[+]?[(]?[0-9]{1,4}[)]?[-\s\.]?[(]?[0-9]{1,4}[)]?[-\s\.]?[0-9]{1,9}$/', $phone);
    }
    
    /**
     * Validate date
     */
    public static function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    
    /**
     * Validate required
     */
    public static function validateRequired($value, $field) {
        if (empty($value)) {
            self::addError($field, ucfirst($field) . ' is required');
            return false;
        }
        return true;
    }
    
    /**
     * Validate min length
     */
    public static function validateMinLength($value, $min, $field) {
        if (strlen($value) < $min) {
            self::addError($field, ucfirst($field) . ' must be at least ' . $min . ' characters');
            return false;
        }
        return true;
    }
    
    /**
     * Validate max length
     */
    public static function validateMaxLength($value, $max, $field) {
        if (strlen($value) > $max) {
            self::addError($field, ucfirst($field) . ' must not exceed ' . $max . ' characters');
            return false;
        }
        return true;
    }
}
?>
