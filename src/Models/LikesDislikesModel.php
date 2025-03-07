<?php
declare(strict_types=1);
require_once 'src/Entities/LikeDislikeEntity.php';
class LikesDislikesModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function checkUserHasLikedPost(int $userId, int $postId) : LikeDislikeEntity|false
    {
        $query = $this->db->prepare("SELECT `has_liked` FROM `likes_dislikes_link` WHERE `user_id` = :user_id AND `post_id` = :post_id");
        $query->setFetchMode(PDO::FETCH_CLASS, LikeDislikeEntity::class);
        if ($query->execute(['user_id' => $userId, 'post_id' => $postId])){
            return $query->fetch();
        }
        return false;
    }

    public function updateHasLiked(int $userId, int $postId) : void
    {
        $query = $this->db->prepare("UPDATE `likes_dislikes_link` SET `has_liked` = 1 WHERE `user_id` = :user_id AND post_id = :post_id; ");
        $query->execute(['user_id' => $userId, 'post_id' => $postId]);
    }
}