<?php

class Request
{
    public function __construct(private int $id, private int $user_nationalCode, private string $book_uCode,private string $status)
    {
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserNationalCode(): int
    {
        return $this->user_nationalCode;
    }

    /**
     * @param int $user_nationalCode
     */
    public function setUserNationalCode(int $user_nationalCode): void
    {
        $this->user_nationalCode = $user_nationalCode;
    }

    /**
     * @return string
     */
    public function getBookUCode(): string
    {
        return $this->book_uCode;
    }

    /**
     * @param string $book_uCode
     */
    public function setBookUCode(string $book_uCode): void
    {
        $this->book_uCode = $book_uCode;
    }

}