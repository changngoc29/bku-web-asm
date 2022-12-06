<?php
include "./../dbConnect.php";
session_start();

if (isset($_GET) && $_GET["action"] == 'create') {
    global $conn;
    echo $_POST['title'];
    echo $_POST['desc'];
    echo $_POST['staff-id'];
    echo $_POST['deadline'];

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $staffID = mysqli_real_escape_string($conn, $_POST['staff-id']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
}
