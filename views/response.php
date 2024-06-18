<?php
session_start();
$users = file_get_contents('../data/users.json');
$users = json_decode($users, 1);
foreach ($users as $user) {
    if ($user['id'] == $_SESSION['user_id']) {
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
    }
}
?>

<h1>thank you dear <?= $firstname??" " . ' ' ?> <?= $lastname ??" " ?></h1><br>
<h2>we call you soon</h2>
