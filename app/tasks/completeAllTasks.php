<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Complete all tasks
if (isset($_POST['completeAllTasksId'])) {
    $id = trim(filter_var($_POST['completeAllTasksId'], FILTER_SANITIZE_NUMBER_INT));

    die(var_dump($id));

    $query = ("UPDATE tasks SET completed = 1 WHERE list_id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    redirect('/lists.php');
}
