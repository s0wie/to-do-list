<?php

require __DIR__ . '/../autoload.php';


if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $avatarDestination = __DIR__ . '/../database/images/' . date("Y-m-d H:i:s") . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], $avatarDestination);

    $imageUrl = date("Y-m-d H:i:s") . $avatar['name'];

    $query = ("UPDATE users SET image_url = :newImage WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newImage', $imageUrl, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['user']['image_url'] = $imageUrl;
}

if (isset($_POST['email'])) {
    $newEmail = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    $query = ("UPDATE users SET email = :new WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':new', $newEmail, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['changedEmail'] = "Your email is now changed.";
    $_SESSION['user']['email'] = $newEmail;
}

if (isset($_POST['password'])) {
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = ("UPDATE users SET password = :newPassword WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['changedPassword'] = "Your password is now changed.";
}

redirect("/account.php");
