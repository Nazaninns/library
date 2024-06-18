<?php
session_start();
function check($nationalCode)
{
    $users = file_get_contents('../data/users.json');
    $users = json_decode($users, 1);
    foreach ($users as $user) {
        if ($user['nationalCode'] == $nationalCode) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
    }
    return false;
}

if (isset($_POST['submit'])) {
    if (check($_POST['national_code']) && !empty($_POST['national_code'])) {
        header('location:../views/rentBook.php');
    } else {
        $_SESSION['err.user'] = 'first authenticate please';
        header('location:../views/checkUser.php');
    }

}