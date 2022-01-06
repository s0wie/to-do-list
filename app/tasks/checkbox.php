<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// UPDATE CHECKBOX

if (isset($_POST['checkbox'])) {
    $checkbox = true;
    var_dump($checkbox);
    $id = $_POST['id'];
    $query = ("UPDATE tasks SET completed = :completed WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':completed', $checkbox, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
} else {
    $checkbox = false;
    var_dump($checkbox); //
    $query = ("UPDATE tasks SET completed = :completed WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':completed', $checkbox, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

// redirect('/tasks.php');
