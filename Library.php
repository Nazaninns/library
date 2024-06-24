<?php

class Library
{
    private array $users =[];
    private array $books =[];
    private Operator $operator ;

    /**
     * @return Operator
     */
    public function getOperator(): Operator
    {
        return $this->operator;
    }

    /**
     * @param Operator $operator
     */
    public function setOperator(Operator $operator): void
    {
        $this->operator = $operator;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param array $users
     */
    public function setUsers(array $users): void
    {
        $this->users = $users;
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


}