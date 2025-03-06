<?php
declare(strict_types=1);

class CommentEntity
{
    private int $id;
    private string $comment;
    private int $post_id;
    private string $username;
    private string $date;

    /**
     * @param int $id
     * @param string $comment
     * @param int $post_id
     * @param string $username
     * @param string $date
     */
    public function __construct(int $id = 0, string $comment = '', int $post_id = 0, string $username = '', string $date = '')
    {
        $this->id = $id;
        $this->comment = $comment;
        $this->post_id = $post_id;
        $this->username = $username;
        $this->date = $date;
    }


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