<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


function daysLeft(string $deadline)
{
    $todaysDate = date('y-m-d');
    $deadlineDate = $deadline;

    $days = strtotime($deadlineDate) - strtotime($todaysDate);
    return abs($days / 86400);
}
