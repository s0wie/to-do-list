<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// UPDATE CHECKBOX

if (isset($_POST['checkbox'])) {
    $checkbox = 1;
    var_dump($checkbox);
    $id = $_POST['id'];
    $query = ("UPDATE tasks SET completed = :completed WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':completed', $checkbox, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
} else {
    $checkbox = 0;
    $id = $_POST['id'];
    var_dump($checkbox);
    $query = ("UPDATE tasks SET completed = :completed WHERE id = :id");
    $statement = $database->prepare($query);
    $statement->bindParam(':completed', $checkbox, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

// EN STRÄNG SOM EN BOOL KOMMER ALLTID VARA SANT om den inte är tom.

// $checked = isset($_POST['checkbox']) ? "true" : "false";
// die(var_dump($checked));
// $query = ("UPDATE tasks SET completed = :completed WHERE id = :id");
// die(var_dump($query));
// $id = $_POST['id'];
// $statement = $database->prepare($query);
// $statement->bindParam(':completed', $checked, PDO::PARAM_STR);
// $statement->bindParam(':id', $id, PDO::PARAM_INT);
// $statement->execute();

// redirect('/tasks.php');
