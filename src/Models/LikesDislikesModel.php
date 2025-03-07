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
        $query = $this->db->prepare("SELECT `has_liked`, `has_disliked` FROM `likes_dislikes_link` WHERE `user_id` = :user_id AND `post_id` = :post_id");
        $query->setFetchMode(PDO::FETCH_CLASS, LikeDislikeEntity::class);
        if ($query->execute(['user_id' => $userId, 'post_id' => $postId])){
            return $query->fetch();
        }
        return false;
    }

    public function updateHasLiked(int $userId, int $postId, int $setVal) : void
    {
        $query = $this->db->prepare("UPDATE `likes_dislikes_link` SET `has_liked` = :setVal WHERE `user_id` = :user_id AND post_id = :post_id; ");
        $query->execute([':setVal' => $setVal,'user_id' => $userId, 'post_id' => $postId]);
    }

    public function addHasLiked(int $userId, int $postId, int $hasLiked, int $hasDisliked) : void
    {
        $query = $this->db->prepare("INSERT INTO `likes_dislikes_link` (`user_id`, `post_id`, `has_liked`, `has_disliked`) VALUES (:user_id, :post_id, :has_liked, :has_disliked)");
        $query->execute([':user_id' => $userId, ':post_id' => $postId, 'has_liked' => $hasLiked, 'has_disliked' => $hasDisliked]);
    }

    public function updateHasDisliked(int $userId, int $postId, int $setVal) : void
    {
        $query = $this->db->prepare("UPDATE `likes_dislikes_link` SET `has_disliked` = :setVal WHERE `user_id` = :user_id AND post_id = :post_id; ");
        $query->execute([':setVal' => $setVal, 'user_id' => $userId, 'post_id' => $postId]);
    }

    public function addHasDisliked(int $userId, int $postId,int $hasLiked, int $hasDisliked) : void
    {
        $query = $this->db->prepare("INSERT INTO `likes_dislikes_link` (`user_id`, `post_id`, `has_liked`, `has_disliked`) VALUES (:user_id, :post_id, :has_liked, :has_disliked)");
        $query->execute([':user_id' => $userId, ':post_id' => $postId, 'has_liked' => $hasLiked, 'has_disliked' => $hasDisliked]);
    }
}