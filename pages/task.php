<?php
include "./../utils/task/taskSupport.php";
if (!isset($_SESSION)) {
    session_start();
}

$limit = 9;
$page = (isset($_GET['table_no']) && is_numeric($_GET['table_no'])) ? $_GET['table_no'] : 1;
$paginationStart = ($page - 1) * $limit;

$totalTasks = getAllTask();
$totalPages = ceil(count($totalTasks) / 8);
$tasks = array_slice($totalTasks, $paginationStart, $limit);

$prev = $page - 1;
$next = $page + 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <style>
        <?php include "../main.css";
        include "../style/task.css" ?>
    </style>
    <title>Task</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include "../components/main/sidebar.php";
            ?>

            <script>
                var taskLink = document.querySelector('#sidebar-menu li:nth-child(2)');
                taskLink.classList.add('isActive');
            </script>

            <div class="col-auto col-10 p-0">
                <div class="page-title">
                    <h2>Task</h2>
                    </h2>
                </div>

                <div class="page-content">
                    <!--  -->
                    <div class="row justify-content-center w-100">
                        <!-- Task assignment-->
                        <div id="task-button" class="col-10 col-auto">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <!-- Button trigger modal -->
                                <?php
                                if (isset($_SESSION) && $_SESSION['user_role'] == 'manager') {
                                    echo '
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal">
                                    Create task
                                    </button>
                                    ';
                                }
                                ?>

                                <!-- Modal -->
                                <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createTaskModalLabel">Create Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./../utils/task/taskHandling.php?action=create" method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label for="createTaskTitle" class="form-label">Title</label>
                                                        <input type="text" name="title" class="form-control" id="createTaskTitle" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="createTaskDesc" class="form-label">Description</label>
                                                        <input type="text" name="desc" class="form-control" id="createTaskDesc" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="createTaskStaff" class="form-label">Staff</label>
                                                        <select id="createTaskStaff" class="form-select" aria-label="Default select example" name="staff-id" required>
                                                            <option selected disabled>---- Choose staff ---- </option>
                                                            <?php
                                                            $users = getAllEmployees();
                                                            foreach ($users as $user) {
                                                                echo "
                                                                    <option value='{$user['id']}'>{$user['fullname']}</option>
                                                                    ";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="createTaskDeadline" class="form-label">Deadline</label>
                                                        <input type="date" name="deadline" class="form-control" id="createTaskDeadline" required>
                                                    </div>
                                                    <label class="form-label" for="customFile">Upload related
                                                        documents</label>
                                                    <input type="file" name="file[]" class="form-control" id="customFile" multiple="multiple" />
                                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table -->
                        <div id="task-list" class="col-10 col-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Task ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Staff</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $tasks = getAllTask();
                                    foreach ($tasks as $task) {
                                        $row_color = getTaskRowColor($task['status']);
                                        $files = getAllFilesRelated($task['id']);
                                        $fileLinksHTML = "";
                                        foreach ($files as $file) {
                                            $fileLinksHTML = $fileLinksHTML . "
                                            <a class='d-block m-0 p-0' href='http://localhost/web-assignment/utils/task/dowload.php?file={$file['name']}'>{$file['name']}</a>
                                            ";
                                        }
                                        $task_user = getUserById($task['staff_id']);
                                        $delete_button = $_SESSION['user_role'] != 'employee' ? "<a class='btn btn-danger' href='http://localhost/web-assignment/utils/task/taskHandling.php?action=delete&id={$task['id']}'>Delete</a>" : "";
                                        $activeSubmitBtn = $task['status'] == 'pending' ? '' : 'disabled';
                                        $submit_button = $_SESSION['user_role'] == 'employee' ? "<button type='button' class='btn btn-light {$activeSubmitBtn}' data-bs-toggle='modal' data-bs-target='#submitTaskModal{$task['id']}'>Submit</button>" : "";

                                        $submitFiles = [];
                                        if ($task['status'] == 'finished') {
                                            $submitTask = getTaskSubmit($task['id']);
                                            $submitFiles = getAllFilesSubmit($task['id']);
                                        }
                                        $fileSubmitLinksHTML = "";
                                        foreach ($submitFiles as $file) {
                                            $fileSubmitLinksHTML = $fileSubmitLinksHTML . "
                                            <a class='d-block m-0 p-0' href='http://localhost/web-assignment/utils/task/dowload.php?file={$file['name']}'>{$file['name']}</a>
                                            ";
                                        }

                                        $submitTaskHTML = $task['status'] == 'finished' ? "
                                        <hr>
                                        <div><p>SUBMISSION:</p></div>
                                        <div>Description: {$submitTask['description']}</div>
                                        <div>Files: </div>
                                        <div>{$fileSubmitLinksHTML}</div>
                                        " : "";

                                        echo "
                                        <tr class='table-{$row_color}'>
                                        <th scope='row' class='task-id'>{$task['id']}</th>
                                        <td>{$task['title']}</td>
                                        <td>{$task_user['fullname']}</td>
                                        <td>{$task['deadline']}</td>
                                        <td>{$task['status']}</td>
                                        <td class='view-task'>
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#viewTaskModal{$task['id']}'>
                                                View
                                            </button>
                                            {$delete_button}
                                            {$submit_button}
                                        </td>
                                            

                                            <!-- View Modal -->
                                            <div class='modal fade' id='viewTaskModal{$task['id']}' tabindex='-1' aria-labelledby='viewTaskModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='viewTaskModalLabel'>
                                                                {$task['title']}</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <div>Task ID : <span> {$task['id']} </span></div>
                                                            <div>Description :
                                                                <div>
                                                                {$task['description']}
                                                                </div>
                                                            </div>
                                                            <div>Employee : <span> {$task_user['fullname']} </span></div>
                                                            <div>Start Date : <span> {$task['start_date']} </span></div>
                                                            <div>Due Date : <span> {$task['deadline']} </span></div>
                                                            <div>Department : <span> {$task['dep']} </span></div>
                                                            <div class='mb-1'>Attachment(s) :</div>
                                                            <div class='m-0 p-0'>{$fileLinksHTML}</div>

                                                            {$submitTaskHTML}
                                                            
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit Modal -->
                                            <div class='modal fade' id='submitTaskModal{$task['id']}' tabindex='-1' aria-labelledby='submitTaskModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='submitTaskModalLabel'>
                                                                {$task['title']}</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                        <form action='./../utils/task/taskHandling.php?action=submit&id={$task['id']}' method='POST' enctype='multipart/form-data'>
                                                            <div class='mb-3'>
                                                                <label for='submitDescInput' class='form-label'>Description</label>
                                                                <input type='text' name='desc' class='form-control' id='submitDescInput' required>
                                                            </div>
                                                            <label class='form-label' for='submitCustomFile'>Upload related
                                                                documents</label>
                                                            <input type='file' name='file[]' class='form-control' id='submitCustomFile' multiple='multiple' />
                                                            <button type='submit' class='btn btn-primary mt-3'>Submit</button>
                                                        </form>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>


                        <!-- Pagination for table-->
                        <div id="pagination-bar" class="col-10 col-auto">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?php if ($page <= 1) {
                                                                echo 'disabled';
                                                            } ?>">
                                        <a class="page-link" href="<?php if ($page <= 1) {
                                                                        echo '#';
                                                                    } else {
                                                                        echo "?table_no=" . $prev;
                                                                    } ?>">Previous</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                        <li class="page-item <?php if ($page == $i) {
                                                                    echo 'active';
                                                                } ?>">
                                            <a class="page-link" href="task.php?table_no=<?= $i; ?>">
                                                <?= $i; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item <?php if ($page >= $totalPages) {
                                                                echo 'disabled';
                                                            } ?>">
                                        <a class="page-link" href="<?php if ($page >= $totalPages) {
                                                                        echo '#';
                                                                    } else {
                                                                        echo "?table_no=" . $next;
                                                                    } ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>



                        <div class="row justify-content-center">

                        </div>
                    </div>

                </div>
                <!--  -->
            </div>
        </div>

    </div>
    </div>
</body>