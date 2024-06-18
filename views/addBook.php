<?php
session_start();
$errors = @$_SESSION['err.book'];
unset($_SESSION['err.book']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>add book</h1>
<h3>
    <?php
    if (!empty($errors)) {
        foreach ($errors as $key => $value) {
            echo $value;
            echo '<br>';
        }
    }
    ?>
</h3>
<form action="../logic/addBook.php" method="post">
    <input type="text" name="title" placeholder="title ">
    <input type="text" name="u_code" placeholder="u_code ">
    <input type="text" name="author" placeholder="author ">
    <input type="date" name="publish_date" placeholder="publish_date ">
    <input type="number" name="vendor" placeholder="vendor ">
    <button type="submit" name="submit" value="true">add</button>
</form>
</body>
</html>
