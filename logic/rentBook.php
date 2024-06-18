<?php
session_start();

function checkVendor()
{
    if (is_file('../books/books.json')) {
        $books = file_get_contents('../data/books.json');
        $books = json_decode($books, 1);
        foreach ($books as $book) {
            if ($book['id'] == $_POST['submit']) {
                if ($book['vendor'] == 0) {
                    $_SESSION['err.book'] = "sorry we haven't enough quantity";
                    return false;
                }
            }
        }
    }
    return true;
}

function checkCountUser()
{
    $status = true;
    if (is_file('../data/user_book.json')) {
        $data = file_get_contents('../data/user_book.json');
        $data = json_decode($data, 1);
        $count = 0;
        foreach ($data as $datum) {
            if ($datum['user_id'] == $_SESSION['user_id']) $count++;
        }
        if ($count >= 2) {
            $_SESSION['err.userCount'] = "sorry you cant rent book until give us back previous books";
            $status = false;
        }
    }
    return $status;
}

function addRecord()
{
    $data = file_get_contents('../data/user_book.json');
    $data = json_decode($data, 1);
    $record = [
        'user_id' => $_SESSION['user_id'],
        'book_id' => $_POST['submit']
    ];
    $data[] = $record;
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('../data/user_book.json', $data);
}

function decreaseVendor()
{
    $books = file_get_contents('../data/books.json');
    $books = json_decode($books, 1);
    foreach ($books as $index => $book) {
        if ($book['id'] == $_POST['submit']) {
            $book[$index]['vendor'] = $book['vendor'] - 1;
        }
    }

    file_put_contents('../data/books.json', json_encode($books, JSON_PRETTY_PRINT));
}

if (checkVendor() && checkCountUser()) {
    addRecord();
    decreaseVendor();
    header('location:../views/response.php');
} else {
    header('location:../views/rentBook.php');
}