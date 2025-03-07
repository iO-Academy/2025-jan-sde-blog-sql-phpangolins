<?php

class CategoriesModel
{
    public PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getCategories(){
        $query = $this->db->prepare("SELECT `categories`.`name`, `categories`.`id`
                                            FROM `categories`;");
        $query -> setFetchMode(PDO::FETCH_CLASS, CategoryEntity::class);
//        $query->execute();
        if ($query->execute()) {
            return $query->fetchAll();
        }
    }


}