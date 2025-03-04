<?php

class PostsModel{

    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(): array|false
    {
        $query = $this->db->prepare('SELECT `posts`.`id`, `posts`.`title`, `posts`.`content`, `posts`.`date_time`, `categories`.`name` AS `category`, `users`.`username` AS `author`
                                            FROM `posts`
                                            JOIN `categories` 
                                            ON `posts`.`category_id` = `categories`.`id`
                                            JOIN `users`
                                            ON `posts`.`user_id`=`users`.`id`;');
        $query -> setFetchMode(PDO::FETCH_CLASS, PostsEntity::class);
        $query->execute();
        if ($query->execute()){
            return $query->fetchAll();
        }
        return false;
    }
}