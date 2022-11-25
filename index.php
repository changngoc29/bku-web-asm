<?php
if ($_GET['page']) {
    if ($_GET['page'] == 'home') {
        header("Location: /web-assignment/pages/home.php");
    } elseif ($_GET['page'] == 'task') {
        header("Location: /web-assignment/pages/task.php");
    } elseif ($_GET['page'] == 'profile') {
        header("Location: /web-assignment/pages/profile.php");
    } elseif ($_GET['page'] == 'employee') {
        header("Location: /web-assignment/pages/employee.php");
    }
} else {
    header("Location: /web-assignment/pages/login.php");
}
