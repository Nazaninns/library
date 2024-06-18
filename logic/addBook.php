<?php
require_once '../helper/helper.php';
session_start();
function validation()
{
    $errors = [];
    if (isset($_POST['submit'])) {
        foreach ($_POST as $key => $value) {
            if (!filled($value)) {
                $errors[$key] = 'Please enter a value for ' . $key;
            }
        }
        $isUnique = unique('../data/books.json','uCode',$_POST['u_code']);
        if (!$isUnique && !filled($errors['u_code'])) {
            $errors['u_code'] = 'Book already exists';
        }
    }
    return $errors;
}



function addBook()
{
    if (isset($_POST['submit'])) {
        if (is_file('../data/books.json')) {
            $books = json_decode(file_get_contents('../data/books.json'), true);
            $lastBook = array_key_last($books);
            $id = $books[$lastBook]['id'] + 1;
        }

        $book = [
            'id' => $id ?? 1,
            'title' => $_POST['title'],
            'uCode' => trim($_POST['u_code']),
            'author' => $_POST['author'],
            'publishDate' => $_POST['publish_date'],
            'vendor' => $_POST['vendor'],
        ];
        $books[] = $book;
        $books = json_encode($books);
        file_put_contents('../data/books.json', $books, JSON_PRETTY_PRINT);
    }
    header('location: ../index.php');
}

$errors = validation();
if (!empty($errors)) {
    $_SESSION['err.book'] = $errors;
    header('location:../views/addBook.php');
}
else {
    addBook();
}
