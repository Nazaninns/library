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
        $isUnique = unique('../data/users.json', 'nationalCode', $_POST['national_code']);
        if (!$isUnique && !filled($errors['national_code'])) {
            $errors['national_code'] = 'your  national code already exists';
        }
    }
    return $errors;
}


function addUser()
{
    if (isset($_POST['submit'])) {
        if (is_file('../data/users.json')) {
            $users = json_decode(file_get_contents('../data/users.json'), true);
            $lastUser = array_key_last($users);
            $id = $users[$lastUser]['id'] + 1;
        }

        $user = [
            'id' => $id ?? 1,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'nationalCode' => $_POST['national_code'],
            'birthdate' => $_POST['birthdate']
        ];
        $users[] = $user;
        $users = json_encode($users);
        file_put_contents('../data/users.json', $users, JSON_PRETTY_PRINT);
    }
    header('location: ../index.php');
}

$errors = validation();
if (!empty($errors)) {
    $_SESSION['err.user'] = $errors;
    header('location:../views/addUser.php');
} else {
    addUser();
}





