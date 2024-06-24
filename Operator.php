<?php
require_once 'User.php';
require_once 'Book.php';

class Operator
{

    public function createUser(): User|string
    {
        try {
            $firstname = readline('First Name: ');
            $lastname = readline('Last Name: ');
            $nationalCode = readline('National Code: ');
            $birthdate = readline('Birth Date: ');
            return new User($firstname, $lastname, $nationalCode, $birthdate);
        } catch (\Exception $e) {
            return $e->getMessage() . PHP_EOL;
        }
    }

    public function addUser(User $user,Library $library): void
    {
       $users = $library->getUsers();
       $users[] = $user;
       $library->setUsers($users);
    }
    public function createBook(): Book|string
    {
        try {

            return new Book(readline('Book title: '), readline('Book u_code : '), readline('Book author: '), readline('Book publish date: '), readline('Book vendor: '));
        } catch (\Exception $e) {
            return $e->getMessage() . PHP_EOL;
        }
    }

    public function addBook(Book $book,Library $library): void
    {
        $books = $library->getBooks();
        $books[] = $book;
        $library->setBooks($books);
    }
}