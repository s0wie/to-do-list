<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// DELETE TASK
if (isset($_POST['id'])) :
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $database->prepare('DELETE FROM tasks WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
endif;

// DELETE LIST ALONG WITH TASKS
if (isset($_POST['list-id'])) :
    $id = filter_var($_POST['list-id'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $database->prepare('DELETE FROM lists WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $statement2 = $database->prepare('DELETE FROM tasks WHERE list_id = :id');
    $statement2->bindParam(':id', $id, PDO::PARAM_INT);
    $statement2->execute();
endif;

if (isset($_POST['today'])) :
    redirect('/index.php');
else :
    redirect('/lists.php');
endif;
