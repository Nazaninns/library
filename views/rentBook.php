<?php
session_start();
$books = file_get_contents('../data/books.json');
$books = json_decode($books, 1);
$errors = [
    'err.book' => @$_SESSION['err.book'],
    'err.userCount' => @$_SESSION['err.userCount']
];
unset($_SESSION['err.book']);
unset($_SESSION['err.userCount']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Thanks for choosing us :)</h1>
    <?php
    foreach ($errors as $error) {
        if (!empty($error)) {
            echo $error;
        }
    }
    ?>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Publish Date</th>
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book) { ?>
            <tr>
                <th scope="row"><?= (@$book['id']) ?></th>
                <td><?= (@$book['title']) ?></td>
                <td><?= (@$book['author']) ?></td>
                <td><?= (@$book['publishDate']) ?></td>
                <form action="../logic/rentBook.php" method="post">
                    <td>
                        <button class="btn btn-dark" type="submit" name="submit" value="<?= @$book['id'] ?>">send
                        </button>
                    </td>
                </form>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
