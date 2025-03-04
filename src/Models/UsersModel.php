<?php



//prepare
$query->setFetchMode(PDO::FETCH_CLASS, ProductEntity::class);
//execute

class UsersModel
{
    public PDO $db;

    public function __construct (PDO $db)
    {
        $this->db=$db;
    }

}