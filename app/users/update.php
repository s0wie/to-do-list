<?php

require __DIR__ . '/../autoload.php';

if (isset($_POST['email'])) {
    $newEmail = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    $query = ("UPDATE users SET email = :new WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':new', $newEmail, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->query('SELECT * FROM users WHERE id = :id');
    $_SESSION['user'] = $statement->fetch(PDO::FETCH_ASSOC);

    $_SESSION['changedEmail'] = "Your email is now changed";
}

if (isset($_POST['password'])) {
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = ("UPDATE users SET password = :newPassword WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['changedPassword'] = "Your password is now changed";
}

redirect("/account.php");
