<?php
include "./../utils/dbConnect.php";

if (!isset($_SESSION)) {
    session_start();
}

function getUserById($id)
{
    global $conn;
    $query = " SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}
