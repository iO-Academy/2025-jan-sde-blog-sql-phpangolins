<?php

declare(strict_types=1);

require_once 'src/Entities/UserEntity.php';

class UsersModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function checkUser($email, $password): UserEntity|false
    {
        $query = $this->db->prepare("SELECT `id`,`username`, `email`, `password` FROM `users` WHERE `email` = :email AND `password` = :password;");
        $query -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, UserEntity::class);
        if ($query->execute([':email' => $email, ':password' => $password])) {
           return $query->fetch();
        }
        return false;
    }

    public function addUser(string $username, string $email, string $password): void
    {
        $query = $this->db->prepare("INSERT INTO `users` (`username`, `email`, `password`)
        VALUES (:username, :email, :password);");
        $query->execute([':username' => $username, ':email' => $email, ':password' => $password]);
    }

     public function registrationValidationCheckUsername(string $username): bool
    {
        $query = $this->db->prepare("SELECT `username` FROM `users` WHERE `username` = :username;");
        $query->execute([':username' => $username]);
        if ($query->fetch())
        {
            return false;
        }
        return true;
    }

    public function registrationValidationCheckEmail(string $email): bool
    {
        $query = $this->db->prepare("SELECT `email` FROM `users` WHERE `email` = :email;");
        $query->execute([':email' => $email]);
        if ($query->fetch())
        {
            return false;
        }
        return true;
    }

//    public function registrationValidationCheck(string $username, string $email): bool
//    {
//        $query = $this->db->prepare("SELECT 1 FROM `users` WHERE `username` = :username OR `email` = :email LIMIT 1;");
//        if ($query->execute([':username' => $username, ':email' => $email]))
//        {
//            return false;
//        }
//        return true;
//    }


}