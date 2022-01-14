<?php

// FETCH TASKS TO DISPLAY ON PAGE
$statement = $database->prepare('SELECT * FROM tasks WHERE user_id = :userId ORDER BY completed');
$statement->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);


// FETCH LISTS TO DISPLAY ON PAGE
$statement = $database->prepare('SELECT * FROM lists WHERE user_id = :userId');
$statement->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
$statement->execute();
$lists = $statement->fetchAll(PDO::FETCH_ASSOC);

// FETCH TASKS IN ORDER TO DISPLAY AND EDIT SPECIFIC TASKS
if (isset($_POST['task-id'])) {
    $id = trim(filter_var($_POST['task-id'], FILTER_SANITIZE_NUMBER_INT));
    $statement = $database->prepare('SELECT * FROM tasks WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $task = $statement->fetch(PDO::FETCH_ASSOC);
};

// FETCH LISTS IN ORDER TO DISPLAY AND EDIT SPECIFIC LISTS
if (isset($_POST['list-id'])) {
    $id = trim(filter_var($_POST['list-id'], FILTER_SANITIZE_NUMBER_INT));
    $statement = $database->prepare('SELECT * FROM lists WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);
};
