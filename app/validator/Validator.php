<?php
class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
    public static function email($value)
    {
        return
            filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    public static function phone($value)
    {
        return
            preg_match('/^[0-9]{10}$/', $value);
    }
    public static function required($value)
    {
        return !empty(trim($value));
    }
    public static function date($value)
    {
        return (bool) strtotime($value);
    }
    public static function integer($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT);
    }
    public static function float($value)
    {
        return filter_var(
            $value,
            FILTER_VALIDATE_FLOAT
        );
    }
    public static function role($value, $allowedRoles = [2, 3])
    {
        return in_array($value, $allowedRoles);
    }
}