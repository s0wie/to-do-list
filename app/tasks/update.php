<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete posts in the database.

if (isset($_POST['title'], $_POST['description'], $_POST['deadline'])) {
    $newTitle = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $newDescription =
        $newDeadline =
        $id = $_POST['id'];

    $query = ("UPDATE tasks SET title = :newTitle WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newTitle', $newTitle, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/tasks.php');
