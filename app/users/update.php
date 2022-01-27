<?php

require __DIR__ . '/../autoload.php';

// In this file, we handle changes to account details

// HANDLING PROFILE PICTURE
if (isset($_FILES['avatar'])) :
    $avatar = $_FILES['avatar'];
    $avatarDestination = __DIR__ . '/../database/uploads/' . date("Y-m-d H:i:s") . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], $avatarDestination);

    $imageUrl = date("Y-m-d H:i:s") . $avatar['name'];

    $query = ("UPDATE users SET image_url = :newImage WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newImage', $imageUrl, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['user']['image_url'] = $imageUrl;
    $_SESSION['message'] = "You've successfully uploaded a new profile picture!";

    // TO DO: VALIDATE TYPE AND SIZE
endif;

// HANDLING EMAIL CHANGE
if (isset($_POST['email'])) {
    $newEmail = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    $query = ("UPDATE users SET email = :new WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':new', $newEmail, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['user']['email'] = $newEmail;
    $_SESSION['message'] = "Your email is now changed.";
}

// HANDLING PASSWORD CHANGE
if (isset($_POST['password'])) {
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = ("UPDATE users SET password = :newPassword WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['changedPassword'] = "Your password is now changed.";
    $_SESSION['message'] = "Your password is now changed.";
}

// HANDLING USERNAME CHANGE
if (isset($_POST['username'])) {
    $newUsername = trim(filter_var($_POST['username'], FILTER_SANITIZE_EMAIL));

    $query = ("UPDATE users SET username = :new WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':new', $newUsername, PDO::PARAM_STR);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['user']['username'] = $newUsername;
    $_SESSION['message'] = "Your username is now changed.";
}

redirect("/account.php");
