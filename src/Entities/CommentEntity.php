<?php
declare(strict_types=1);

class CommentEntity
{
    private int $id;
    private string $comment;
    private int $post_id;
    private string $username;
    private string $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getPostId(): int
    {
        return $this->post_id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getDate(): string
    {
        return $this->date;
    }



}