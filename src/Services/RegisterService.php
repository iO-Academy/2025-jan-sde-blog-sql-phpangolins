<?php

require_once 'src/models/UsersModel.php';
class RegisterService
{
    static public function validateUsername(string $username): bool
    {
        if (strlen($username) < 3 || strlen($username) > 25)
        {
            return false;
        }

        return true;
    }

    static public function validateEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }

        return true;
    }

    static public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8 || strlen($password) > 50)
        {
            return false;
        }

        return true;
    }
}