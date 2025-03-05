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
        if (!str_contains($email, '@')
            || !(str_ends_with($email, '.com')
            || str_ends_with($email, '.co.uk'))
            || str_starts_with($email, '@'))
        {
            return false;
        }

        return true;
    }

    static public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8 || str_contains($password, 'password'))
        {
            return false;
        }

        return true;
    }
}