<?php

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'])) {
    $newEmail = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    $query = ("UPDATE users SET email = :new WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':new', $newEmail, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
    $statement->execute();

    $_SESSION['user'] = $statement->fetch(PDO::FETCH_ASSOC);
}


redirect("/account.php");
