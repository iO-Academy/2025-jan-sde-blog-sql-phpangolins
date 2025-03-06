<?php

declare(strict_types=1);

class AddPostsModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addPost($title, $content, $userID): bool
    {
        $query = $this->db->prepare("INSERT INTO `posts` (`title`, `content`, `user_id`, `date_time`) VALUES (:title, :content, :user_id, NOW());");
        if ($query->execute([':title' => $title, ':content' => $content, ':user_id' => $userID])) {
            return true;
        }
        return false;
    }
}