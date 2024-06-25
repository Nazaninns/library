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

    public function addUser(User $user, Library $library): void
    {
        $users = $library->getUsers();
        if (count($users) > 0) {
            foreach ($users as $value) {
                if ($value->getNationalCode() !== $user->getNationalCode()) $users[] = $user;
            }
        }
        if (count($users) <= 0) $users[] = $user;
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

    public function addBook(Book $book, Library $library): void
    {
        $books = $library->getBooks();
        if (count($books) > 0) {
            foreach ($books as $value) {
                if ($value->getUCode() !== $book->getUCode()) $books[] = $book;
            }
        }
        if (count($books) <= 0) $books[] = $book;
        $library->setBooks($books);
    }
    //index requests
    public function requests(Library $library): array
    {
        return $library->getRequests();
    }

    //show request

    public function request($id, Library $library): Request
    {
        $req = null ;
        $requests = $library->getRequests();
        foreach ($requests as $request) {
            if ($request->getId() === $id)  $req = $request;
        }
        return $req;
    }

    public function checkRequest()
    {
        $books = (new Library())->getBooks();
        $requests = $this->requests;
        foreach ($requests as $book) {

        }
    }
}