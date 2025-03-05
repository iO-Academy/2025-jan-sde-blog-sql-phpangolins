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

    public function checkUser($email, $password): bool|UserEntity
    {
        $query = $this->db->prepare("SELECT `id`,`username`, `email`, `password` FROM `users` WHERE `email` = :email AND `password` = :password;");
        $query -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, UserEntity::class);
        if ($query->execute([':email' => $email, ':password' => $password])) {
           return $query->fetch();
        } else {
            return false;
        }
    }
}