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
    return abs($days / 86400);
}

// Add functions to check if user is online,
// etc
