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
<h1>welcome to my library</h1>
<h4>
    <?php
    session_start();
    $error = @$_SESSION['err.user'];
    unset($_SESSION['err.user']);
    if ($error)
        echo $error
    ?>
</h4>
<form action="../logic/checkUser.php" method="post">
    <input type="text" name="national_code" placeholder="enter your national code">
    <button type="submit" name="submit">submit</button>
</form>
</body>
</html>
