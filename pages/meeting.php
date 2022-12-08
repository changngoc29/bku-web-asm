<?php
// include "./../utils/user/getUser.php";
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
        <?php include "../main.css";
        include "../style/meeting.css" ?>
    </style>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Meeting</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap w-100">
            <?php
            include "../components/main/sidebar.php";
            ?>

            <script>
                var profileLink = document.querySelector('#sidebar-menu li:nth-child(4)');
                profileLink.classList.add('isActive');
            </script>

            <div class="col-auto col-10 p-0">
                <div class="page-title">
                    <h2>Profile</h2>
                </div>

                <div class="page-content">
                    <!--  -->
                    <div class="create-btn">
                        <!-- Button trigger modal -->
                        <?php
                        if (isset($_SESSION) && $_SESSION['user_role'] == 'director') {
                            echo '
                            <button type="button" class="btn btn-primary custom-create-btn" data-bs-toggle="modal" data-bs-target="#employeeCreateModal">
                            Add employee
                            </button>
                            ';
                        }
                        ?>

                        <div class="modal fade modal-custom" id="employeeCreateModal" tabindex="-1" aria-labelledby="employeeCreateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="employeeCreateModalLabel">Employee Information Registration</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body modal-body-custom">
                                        <div class="form-inner">
                                            <?php
                                            if (isset($_SESSION['status'])) {
                                            ?>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <?php echo $_SESSION['status']; ?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php
                                            }

                                            if (isset($_SESSION['error'])) {
                                            ?>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <?php echo $_SESSION['error']; ?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <form action="../utils/employee/addEmployee.php" method="POST">
                                                <label for="">Full name</label><br>
                                                <input class="form-control" type="text" name="fullname" placeholder="Enter full name"><br>
                                                <label for="">Gender</label><br>
                                                <select class="form-select" aria-label="Default select example" name="gender" required>
                                                    <option selected disabled>---- Choose gender ---- </option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select><br>
                                                <label for="">Phone number</label><br>
                                                <input class="form-control" type="text" name="phone" placeholder="Enter phone no."><br>
                                                <label for="">Username</label><br>
                                                <input class="form-control" type="text" name="username" placeholder="Enter username"><br>
                                                <label for="">Password</label><br>
                                                <input class="form-control" type="text" name="password" placeholder="Enter password"><br>
                                                <label for="">Role</label><br>
                                                <select class="form-select" aria-label="Default select example" name="role" required>
                                                    <option selected disabled>---- Choose role ---- </option>
                                                    <option value="manager">Manager</option>
                                                    <option value="employee">Employee</option>
                                                </select><br>
                                                <br>
                                                <label for="">Department</label><br>
                                                <select class="form-select" aria-label="Default select example" name="dep" required>
                                                    <option selected disabled>---- Choose department ---- </option>
                                                    <option value="dev">Developer</option>
                                                    <option value="hr">Human Resources</option>
                                                </select>
                                                <br>
                                                <input type="submit" name="submit" value="Add"><br>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="employeeListTable" class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Dept.</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider custom-tbody">
                                <?php
                                include "./../utils/dbConnect.php";


                                $query = " SELECT * FROM user ORDER BY dep";
                                if (isset($_SESSION) && $_SESSION['user_dep'] != '') {
                                    $query = " SELECT * FROM user WHERE dep='{$_SESSION['user_dep']}' ORDER BY dep";
                                }
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <th scope='row'>" . $row["id"] . "</th>
                                    <td>" . $row["fullname"] . "</td>
                                    <td>" . $row["gender"] . "</td>
                                    <td>" . $row["role"] . "</td>
                                    <td>" . $row["dep"] . "</td>
                                    <td>
                                        <button type='button' class='btn btn-primary view-btn' data-bs-toggle='modal' data-bs-target='#exampleModal{$row["id"]}'>
                                            View
                                        </button>
                                        <div class='modal fade custom-modal-tbody' id='exampleModal{$row["id"]}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Employee Details</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body custom-modal-body'>
                                                        <h4>Full name: <span>" . $row["fullname"] . "<span/></h4>
                                                        <h4>Gender: <span>" . $row["gender"] . "<span/></h4>
                                                        <h4>Role: <span>" . $row["role"] . "<span/></h4>
                                                        <h4>Department: <span>" . $row["dep"] . "<span/></h4>
                                                        <h4>Phone: <span>" . $row["phone"] . "<span/></h4>
                                                        
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!--  -->
                </div>
            </div>

        </div>
    </div>
</body>