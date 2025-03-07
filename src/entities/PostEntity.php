<?php

class PostEntity{
    private int $id;
    private string $title;
    private ?string $author;
    private string $content;
    private string $date_time;
    private int $likes;
    private int $dislikes;
    private string $category;
    private string $category2;

    /**
     * @param int $id
     * @param string $title
     * @param string|null $author
     * @param string $content
     * @param string $date_time
     * @param int $likes
     * @param int $dislikes
     * @param string $category
     * @param string $category2
     */
    public function __construct(int $id = 1, string $title = '', ?string $author = '', string $content = '', string $date_time = '', int $likes = 0, int $dislikes = 0, string $category = '', string $category2 = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
        $this->date_time = $date_time;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
        $this->category = $category;
        $this->category2 = $category2;
    }


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