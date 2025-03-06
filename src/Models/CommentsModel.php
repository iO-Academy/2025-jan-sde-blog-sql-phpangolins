<?php
declare(strict_types=1);

class CommentsModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function insertCommentIntoTable(string $comment, int $post_id, int $user_id) : bool
    {
        $query = $this->db->prepare("INSERT INTO `comments` (`comment`, `post_id`, `user_id`, `date`)
                                            VALUES (:comment, :post_id, :user_id, :date);");
        if ($query->execute([':comment' => $comment, ':post_id' => $post_id, ':user_id' => $user_id, ':date' => date("Y-m-d")])) {
            return true;
        }
        return false;
    }
}