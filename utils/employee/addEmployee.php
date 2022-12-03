<?php
include "./../dbConnect.php";
session_start();

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = $_POST['phone'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $dep = mysqli_real_escape_string($conn, $_POST['dep']);

    $select = " SELECT * FROM user WHERE username = '$username' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = 'user already exist!';
    } else {
        $insert = "INSERT INTO user(fullname, gender, phone, username, password, role, dep) VALUES('$fullname','$gender','$phone','$username','$password','$role','$dep')";
        mysqli_query($conn, $insert);
        $_SESSION['status'] = "Successfully added";
        header("Location: ../../pages/employee.php");
    }
}
