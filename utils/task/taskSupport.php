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

function getAllEmployees()
{
    global $conn;
    $query = " SELECT * FROM user WHERE role != 'admin'";
    $result = mysqli_query($conn, $query);

    $users = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($users, $row);
    }

    return $users;
}

function getAllFilesRelated($taskId)
{
    global $conn;
    $query = "SELECT * FROM files WHERE task_id=$taskId";
    $result = mysqli_query($conn, $query);

    $files = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($files, $row);
    }

    return $files;
}
