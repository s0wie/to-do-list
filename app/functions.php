<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// Change name to getDaysLeft
function getdaysLeft(string $deadline)
{
    $todaysDate = date('y-m-d');
    $deadlineDate = $deadline;

    $days = strtotime($deadlineDate) - strtotime($todaysDate);
    return $days / 86400;
}

// Add functions to check if user is online,
// etc

//FETCH LISTS IN ORDER TO DISPLAY AND EDIT SPECIFIC LISTS
// function getListsForEdit(PDO $database) {
// if (isset($_POST['list-id'])) :
//     $id = trim(filter_var($_POST['list-id'], FILTER_SANITIZE_NUMBER_INT));
//     $statement = $database->prepare('SELECT * FROM lists WHERE id = :id');
//     $statement->bindParam(':id', $id, PDO::PARAM_INT);
//     $statement->execute();
//     return $statement->fetch(PDO::FETCH_ASSOC);
// endif;
// }
