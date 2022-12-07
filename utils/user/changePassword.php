<?php
include "./../dbConnect.php";
session_start();

if (isset($_POST)) {
    global $conn;
    $userQuery = "SELECT * FROM user WHERE id={$_SESSION['user_id']}";
    $result = mysqli_query($conn, $userQuery);

    $user = mysqli_fetch_assoc($result);
    if ($_POST['oldPassword'] != $user['password']) {
        echo "Incorrect old password";
    } else {
        $changePasswordQuery = "UPDATE user SET password='{$_POST['newPassword']}' WHERE id={$_SESSION['user_id']}";
        mysqli_query($conn, $changePasswordQuery);
        echo "Change successful";
    }
}
