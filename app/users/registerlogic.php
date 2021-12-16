<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    move_uploaded_file($avatar['tmp_name'], __DIR__ . '/../database/images/' . date("Y-m-d H:i:s") . 'avatar.png');
}

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $email = $_POST['email'];
    $imgurl = $_FILES['avatar'];
    $password = $_POST['password'];


    $database = new PDO('sqlite:database.db');

    $database->exec("INSERT INTO users (username, email, image_url, password) VALUES ('$username', '$email','$imgurl', '$password')");
}


redirect('/');
