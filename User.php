<?php

class User
{


    public function __construct(private string $firstname, private string $lastname, private int $nationalCode, private string $birthdate, private array $books = [])
    {
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return int
     */
    public function getNationalCode(): int
    {
        return $this->nationalCode;
    }

    /**
     * @return array
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * @param array $books
     */
    public function setBooks(array $books): void
    {
        $this->books = $books;
    }


    public function requestToRent()
    {

    }

    public function rentRequest(Book $book, Library $library): Request
    {
        $requests = $library->getRequests();
        if (count($requests) <= 0) $id = 1;
        else $id = count($requests) + 1;
        $request = new Request($id, $this->nationalCode, $book->getUCode(), 'pending');
        $requests[] = $request;
        $library->setRequests($requests);
        return $request;
    }
}
