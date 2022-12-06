<?php
include "./../dbConnect.php";
session_start();

if (isset($_GET) && $_GET["action"] == 'create') {
    global $conn;

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $staffID = mysqli_real_escape_string($conn, $_POST['staff-id']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);

    $query = "INSERT INTO task(title, description, staff_id, start_date, deadline, status, dep) VALUES('$title', '$desc', '$staffID', CURDATE(), '$deadline', 'pending', '{$_SESSION['user_dep']}')";
    mysqli_query($conn, $query);
    header("Location: ../../pages/task.php");
}
