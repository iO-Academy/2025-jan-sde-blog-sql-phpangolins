<?php

class LikeDislikeEntity
{
    private int $id;
    private int $user_id;
    private int $post_id;
    private int $has_liked;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getPostId(): int
    {
        return $this->post_id;
    }

    public function getHasLiked(): int
    {
        return $this->has_liked;
    }
}