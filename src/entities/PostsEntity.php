<?php

class PostsEntity{
    private int $id;
    private string $title;
    private ?string $author;
    private string $content;
    private string $date_time;
    private int $likes;
    private int $dislikes;
    private string $category;
    private int $category2;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory2(): int
    {
        return $this->category2;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function getDislikes(): int
    {
        return $this->dislikes;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function getDateTime(): string
    {
        return $this->date_time;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


}