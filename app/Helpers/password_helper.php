<?php

if (!function_exists('pepper_password')) {
    function pepper_password($password)
    {
        $pepper = getenv('PASSWORD_PEPPER');
        return hash_hmac('sha256', $password, $pepper);
    }
}

if (!function_exists('hash_password')) {
    function hash_password($password)
    {
        $peppered = pepper_password($password);
        return password_hash($peppered, PASSWORD_BCRYPT);
    }
}

if (!function_exists('verify_password')) {
    function verify_password($passwordInput, $hash)
    {
        $peppered = pepper_password($passwordInput);
        return password_verify($peppered, $hash);
    }
}

if (!function_exists('generate_password')) {
    function generate_password()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
        return substr(str_shuffle(str_repeat($chars, 8)), 0, 8);
    }
}
