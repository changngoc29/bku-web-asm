<?php
include "./../utils/dbConnect.php";
if (!isset($_SESSION)) {
    session_start();
}

$updateTaskStatusQuery = "UPDATE task 
                        SET status = 'overdue' 
                        WHERE status = 'pending'
                        AND deadline <= CURDATE() - INTERVAL 1 DAY";

mysqli_query($conn, $updateTaskStatusQuery);

function getAllTask()
{
    global $conn;
    $query = '';
    if (isset($_SESSION) && $_SESSION['user_role'] == 'manager') {
        $query = "SELECT * FROM task WHERE dep='{$_SESSION['user_dep']}' ORDER BY deadline";
    } else if (isset($_SESSION) && $_SESSION['user_role'] == 'employee') {
        $query = "SELECT * FROM task WHERE dep='{$_SESSION['user_dep']}' AND staff_id={$_SESSION['user_id']} ORDER BY deadline";
    } else {
        $query = " SELECT * FROM task ORDER BY deadline";
    }
    $result = mysqli_query($conn, $query);

    $tasks = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($tasks, $row);
    }

    return $tasks;
}

function getTaskSubmit($id)
{
    global $conn;
    $query = " SELECT * FROM submit_task WHERE task_id = $id";
    $result = mysqli_query($conn, $query);

    $submitTask = mysqli_fetch_assoc($result);
    return $submitTask;
}

function getAllFilesSubmit($taskId)
{
    global $conn;
    $query = "SELECT * FROM submit_file WHERE task_id=$taskId";
    $result = mysqli_query($conn, $query);

    $files = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($files, $row);
    }

    return $files;
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
    $query = '';
    if (isset($_SESSION) && $_SESSION['user_role'] == 'manager') {
        $query = " SELECT * FROM user WHERE role != 'manager' AND role != 'director' AND dep='{$_SESSION['user_dep']}'";
    } else {
        $query = " SELECT * FROM user WHERE role != 'director' AND role != 'manager'";
    }

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

function getUserById($id)
{
    global $conn;
    $query = " SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
