<?php
declare(strict_types=1);
require_once 'src/Entities/CommentEntity.php';

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

    public function commentsThatBelongToPost(int $post_id) : array|false
    {
        $query = $this->db->prepare("SELECT `comments`.`comment`, `comments`.`date`, `users`.`username` 
                                            FROM `comments`
                                            JOIN `users`
                                                ON `comments`.`user_id` = `users`.`id`
                                            WHERE `comments`.`post_id` = :post_id
                                            ORDER BY `comments`.`date` DESC;");
        $query->setFetchMode(PDO::FETCH_CLASS, CommentEntity::class);
        if ($query->execute(['post_id' => $post_id])) {
            return $query->fetchAll();
        }
        return false;

    }
}