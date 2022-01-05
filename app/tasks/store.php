<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we store/insert new posts in the database.

// INSERT TASKS
if (isset($_POST['title'], $_POST['deadline'], $_POST['description'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $deadline = $_POST['deadline'];
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));

    $statement = $database->prepare("INSERT INTO tasks (title, deadline, description, user_id) VALUES (:title, :deadline, :description, :userId)");
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->query("SELECT * FROM tasks");
}


redirect('/tasks.php');
