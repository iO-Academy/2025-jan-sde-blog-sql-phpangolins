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
        $query = $this->db->prepare("INSERT INTO `posts` (`title`, `content`) VALUES (:title, :content);");
        if ($query->execute([':title' => $title, ':content' => $content])) {
            return true;
        }
        return false;
    }
}