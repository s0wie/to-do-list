<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['deleteUserId'])) {
    $id = filter_var($_POST['deleteUserId'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $database->prepare('DELETE FROM tasks WHERE user_id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare('DELETE FROM lists WHERE user_id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare('DELETE FROM users WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    unset($_SESSION['user']);

    redirect('/');
}
