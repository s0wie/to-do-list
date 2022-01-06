<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete new posts in the database.
if (isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $database->prepare('DELETE FROM tasks WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    // $insertSQL = $database->prepare('DELETE FROM tasks WHERE list_id = :id');
    // $insertSQL->bindParam(':id', $taskID, PDO::PARAM_INT);
}

redirect('/tasks.php');
