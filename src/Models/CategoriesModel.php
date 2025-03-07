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
        if ($query->execute()) {
            return $query->fetchAll();
        }
    }
    public function getCategoryID($categoryID){
        $query = $this->db->prepare("SELECT `categories`.`id`
                                            FROM `categories`
                                            WHERE `categories`.`name` = :categoryID;");
        $query -> setFetchMode(PDO::FETCH_CLASS, CategoryEntity::class);
        if ($query->execute([':categoryID'=>$categoryID])) {
            return $query->fetchAll();
        }
    }

}