<?php

class Book
{
    public function __construct(private string $title, private string $uCode, private string $author, private string $publishDate, private int $vendor){}

    /**
     * @return string
     */
    public function getUCode(): string
    {
        return $this->uCode;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getPublishDate(): string
    {
        return $this->publishDate;
    }

    /**
     * @return int
     */
    public function getVendor(): int
    {
        return $this->vendor;
    }

}