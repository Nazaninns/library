<?php
require_once 'User.php';
require_once 'Book.php';
require_once 'Operator.php';
require_once 'Library.php';

$operator = new Operator();
$library = new Library();
$library->setOperator($operator);
//add user
$user = $operator->createUser();
$operator->addUser($user,$library);
//add book
$book = $operator->createBook();
$operator->addBook($book,$library);
var_dump($library);
