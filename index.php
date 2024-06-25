<?php
require_once 'User.php';
require_once 'Book.php';
require_once 'Operator.php';
require_once 'Library.php';
require_once 'Request.php';
$operator = new Operator();
$library = new Library();
$library->setOperator($operator);
//add user
$user1 = $operator->createUser();
$user2 = $operator->createUser();
$operator->addUser($user1, $library);
$operator->addUser($user2, $library);
//add book
$book = $operator->createBook();
$operator->addBook($book, $library);


//rent
$request = $user1->rentRequest($book, $library);
$operator->rentResult($request, $library);
var_dump($library);