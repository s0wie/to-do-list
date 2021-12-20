<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Messages in this session
$_SESSION['messages'][] = [
    'text' => 'Whoops',
    'type' => 'error',
];

// In this file we register a new user.

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    move_uploaded_file($avatar['tmp_name'], __DIR__ . '/../database/images/' . date("Y-m-d H:i:s") . 'avatar.png');
}

// To add a users name, not sanitized, ändra allt här nedan(//)
if (isset($_POST['username'])) {
    $username = trim(filter_var(($_POST['username']), FILTER_SANITIZE_STRING));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $message = "This is a sanitized and valid email";
    // } else {
    //     $message = $_SESSION['messages']['text'];
    // }

    $password = $_POST['password'];
    $image = $_FILES['avatar'];

    $statement = $database->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();
}


redirect('/');
