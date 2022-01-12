<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// UPPDATE TASKS
if (isset($_POST['title'], $_POST['description'], $_POST['deadline'])) {
    $newTitle = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $newDescription = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $newDeadline = trim(filter_var($_POST['deadline'], FILTER_SANITIZE_STRING));
    $id = $_POST['id'];

    $query = ("UPDATE tasks SET title = :newTitle, description = :newDescription, deadline = :newDeadline WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newTitle', $newTitle, PDO::PARAM_STR);
    $statement->bindParam(':newDescription', $newDescription, PDO::PARAM_STR);
    $statement->bindParam(':newDeadline', $newDeadline, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    if (isset($_POST['today'])) {
        redirect('/index.php');
    } else {
        redirect('/lists.php');
    }
}


// UPDATE LISTS

if (isset($_POST['list-title'])) {
    $newTitle = trim(filter_var($_POST['list-title'], FILTER_SANITIZE_STRING));
    $id = $_POST['id'];

    $query = ("UPDATE lists SET title = :newTitle WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':newTitle', $newTitle, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    redirect('/lists.php');
}
