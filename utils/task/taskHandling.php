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
    $taskQueryObj = mysqli_query($conn, $query);

    $taskIdQuery = "SELECT id FROM task WHERE title='$title' AND description='$desc' AND staff_id=$staffID AND deadline='$deadline' AND status='pending' AND start_date=CURDATE() AND dep='{$_SESSION['user_dep']}'";

    $taskId = mysqli_fetch_assoc(mysqli_query($conn, $taskIdQuery))['id'];

    if (isset($_FILES['file'])) {
        // echo var_dump($_FILES);
        $target_dir = "uploads/";
        $allowUpload   = true;
        //Những loại file được phép upload
        $allowtypes    = array('txt', 'dat', 'data', 'pdf', 'docx', 'csv', 'xlsx', 'png', 'jpg', 'zip', 'html', 'css', 'php', 'js', 'py', 'cpp');
        //Kích thước file lớn nhất được upload (bytes)
        $maxfilesize   = 10000000; //10MB

        $files = $_FILES['file'];

        $names = $files['name'];
        $types = $files['type'];
        $tmp_names = $files['tmp_name'];
        $errors = $files['error'];
        $sizes = $files['size'];

        $numitems = count($names);
        $numfiles = 0;
        for ($i = 0; $i < $numitems; $i++) {
            $target_file   = $target_dir . basename($names[$i]);
            //Lấy phần mở rộng của file (txt, jpg, png,...)
            $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

            //1. Kiểm tra file có bị lỗi không?
            if ($errors[$i] != 0) {
                echo "<br>The uploaded file is error or no file selected.";
                // die;
            }

            //2. Kiểm tra loại file upload có được phép không?
            if (!in_array($fileType, $allowtypes)) {
                echo "<br>Only allow for uploading .txt, .dat or .data files.";
                $allowUpload = false;
            }

            //3. Kiểm tra kích thước file upload có vượt quá giới hạn cho phép
            if ($sizes[$i] > $maxfilesize) {
                echo "<br>Size of the uploaded file must be smaller than $maxfilesize bytes.";
                $allowUpload = false;
            }

            //4. Kiểm tra file đã tồn tại trên server chưa?
            if (file_exists($target_file)) {
                echo "<br>The file name already exists on the server.";
                $allowUpload = false;
            }

            if ($allowUpload) {
                //Lưu file vào thư mục được chỉ định trên server
                if (move_uploaded_file($tmp_names[$i], $target_file)) {
                    echo "<br>File " . basename($names[$i]) . " uploaded successfully.";
                    echo "The file saved at " . $target_file;

                    $fileQuery = "INSERT INTO files(name, task_id) VALUES ('$names[$i]', '$taskId')";

                    mysqli_query($conn, $fileQuery);
                } else {
                    echo "<br>An error occurred while uploading the file.";
                }
            }
        }
    } else {
        echo "No files selected.";
    }

    header("Location: ../../pages/task.php");
}

if (isset($_GET) && $_GET["action"] == 'submit') {
    global $conn;

    $desc = mysqli_real_escape_string($conn, $_POST['desc']);

    $query = "INSERT INTO submit_task(description, task_id) VALUES('{$_POST['desc']}', {$_GET['id']})";
    $taskQueryObj = mysqli_query($conn, $query);

    if (isset($_FILES['file'])) {
        // echo var_dump($_FILES);
        $target_dir = "uploads/";
        $allowUpload   = true;
        //Những loại file được phép upload
        $allowtypes    = array('txt', 'dat', 'data', 'pdf', 'docx', 'csv', 'xlsx', 'png', 'jpg', 'zip', 'html', 'css', 'php', 'js', 'py', 'cpp');
        //Kích thước file lớn nhất được upload (bytes)
        $maxfilesize   = 10000000; //10MB

        $files = $_FILES['file'];

        $names = $files['name'];
        $types = $files['type'];
        $tmp_names = $files['tmp_name'];
        $errors = $files['error'];
        $sizes = $files['size'];

        $numitems = count($names);
        $numfiles = 0;
        for ($i = 0; $i < $numitems; $i++) {
            $target_file   = $target_dir . basename($names[$i]);
            //Lấy phần mở rộng của file (txt, jpg, png,...)
            $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

            //1. Kiểm tra file có bị lỗi không?
            if ($errors[$i] != 0) {
                echo "<br>The uploaded file is error or no file selected.";
                // die;
            }

            //2. Kiểm tra loại file upload có được phép không?
            if (!in_array($fileType, $allowtypes)) {
                echo "<br>Only allow for uploading .txt, .dat or .data files.";
                $allowUpload = false;
            }

            //3. Kiểm tra kích thước file upload có vượt quá giới hạn cho phép
            if ($sizes[$i] > $maxfilesize) {
                echo "<br>Size of the uploaded file must be smaller than $maxfilesize bytes.";
                $allowUpload = false;
            }

            //4. Kiểm tra file đã tồn tại trên server chưa?
            if (file_exists($target_file)) {
                echo "<br>The file name already exists on the server.";
                $allowUpload = false;
            }

            if ($allowUpload) {
                //Lưu file vào thư mục được chỉ định trên server
                if (move_uploaded_file($tmp_names[$i], $target_file)) {
                    echo "<br>File " . basename($names[$i]) . " uploaded successfully.";
                    echo "The file saved at " . $target_file;

                    $fileQuery = "INSERT INTO submit_file(name, task_id) VALUES ('$names[$i]', '{$_GET['id']}')";

                    mysqli_query($conn, $fileQuery);
                } else {
                    echo "<br>An error occurred while uploading the file.";
                }
            }
        }
    } else {
        echo "No files selected.";
    }
    $updateTaskStatusQuery = "UPDATE task 
                        SET status = 'finished' 
                        WHERE id={$_GET['id']}";

    mysqli_query($conn, $updateTaskStatusQuery);
    header("Location: ../../pages/task.php");
}

if (isset($_GET) && $_GET["action"] == 'delete') {
    global $conn;
    $query = "DELETE FROM task WHERE id={$_GET['id']}";

    mysqli_query($conn, $query);
    header("Location: ../../pages/task.php");
}
