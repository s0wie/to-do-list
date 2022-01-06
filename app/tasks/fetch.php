<?php

// FETCH TASKS TO DISPLAY ON PAGE
$statement = $database->prepare('SELECT * FROM tasks WHERE user_id = :userId');
$statement->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);


// FETCH LISTS TO DISPLAY ON PAGE
$statement = $database->prepare('SELECT * FROM lists WHERE user_id = :userId');
$statement->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
$statement->execute();
$lists = $statement->fetchAll(PDO::FETCH_ASSOC);
