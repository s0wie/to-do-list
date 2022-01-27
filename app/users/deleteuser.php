<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$delete = filter_var($_POST['deleteUserWriting'], FILTER_SANITIZE_STRING);

if ($delete === 'DELETE') {
    $id = $_POST['deleteUserId'];
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
} else {
    $_SESSION['deleteMessage'] = "Something went wrong, try again if you still want to delete your account.";

    redirect("/account.php");
}
