<?php
session_start();
$errors = @$_SESSION['err.user'];
unset($_SESSION['err.user']);
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
<h1>add user</h1>
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
<form action="../logic/addUser.php" method="post">
    <input type="text" name="firstname" placeholder="enter your firstname">
    <input type="text" name="lastname" placeholder="enter your lastname">
    <input type="number" name="national_code" placeholder="enter your national code">
    <input type="date" name="birthdate" placeholder="enter your birthdate">
    <button type="submit" value="true" name="submit">add</button>
</form>

</body>
</html>