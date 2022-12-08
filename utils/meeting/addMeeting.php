<?php
include "./../dbConnect.php";
session_start();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);

    $insert = "INSERT INTO meeting(name, time, date, room, host, dep) VALUES('$name','$time','$date','$room','{$_SESSION['user_name']}','{$_SESSION['user_dep']}')";
    mysqli_query($conn, $insert);
    $_SESSION['status'] = "Successfully added";
    header("Location: ../../pages/meeting.php");
}
