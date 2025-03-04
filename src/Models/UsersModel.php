<?php

class UsersModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function checkUser($email, $password): bool|array
    {
        $query = $this->db->prepare("SELECT `id`,`username`, `email`, `password` FROM `users` WHERE `email` = :email AND `password` = :password;");

        if ($query->execute([':email' => $email, ':password' => $password])) {
           return $query->fetch();
        } else {
            return false;
        }
    }

}








//            if ($query->execute(['email' => $email])) {
//                return true;
//            } else {
//                return false;
//            }
//        }
//        return false;
//    }
//}

//public function checkUserExists(): array|bool
//
//{
//
//    if (isset($_POST['submitted'])) {
//
//        $username = $_POST['username'];
//
//        $query = $this->db->prepare(
//
//            "SELECT `id`, `username`, `password`
//
//                    FROM `users`
//
//                    WHERE `username` = :username;");
//
//        if ($query->execute([':username' => $username])) {
//
//            return $query->fetch();
//
//        } return false;
//
//    }
//
//    return true;
//
//}