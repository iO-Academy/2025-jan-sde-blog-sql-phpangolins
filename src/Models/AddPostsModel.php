<?php

declare(strict_types=1);

class AddPostsModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addPost($title, $content): bool
    {
        $query = $this->db->prepare("INSERT INTO `posts` (`title`, `content`, `date_time`) VALUES (:title, :content, NOW());");
        if ($query->execute([':title' => $title, ':content' => $content])) {
            return true;
        }
        return false;
    }
}