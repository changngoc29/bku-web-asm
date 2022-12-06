<?php
include "./../utils/dbConnect.php";
if (!isset($_SESSION)) {
    session_start();
}

function getAllTask()
{
    global $conn;
    $query = " SELECT * FROM task";
    $result = mysqli_query($conn, $query);

    $tasks = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($tasks, $row);
    }

    return $tasks;
}

function getTaskRowColor($status)
{
    if ($status == 'pending') return 'warning';
    else if ($status == 'overdue') return 'danger';
    else if ($status == 'finished') return 'success';
}
