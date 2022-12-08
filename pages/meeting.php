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
                        if (isset($_SESSION) && $_SESSION['user_role'] != 'employee') {
                            echo '
                            <button type="button" class="btn btn-primary custom-create-btn" data-bs-toggle="modal" data-bs-target="#meetingCreateModal">
                            Add meeting
                            </button>
                            ';
                        }
                        ?>

                        <div class="modal fade modal-custom" id="meetingCreateModal" tabindex="-1" aria-labelledby="meetingCreateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="meetingCreateModalLabel">Meeting Registration</h1>
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
                                            <form action="../utils/meeting/addMeeting.php" method="POST">
                                                <label for="">Name</label><br>
                                                <input class="form-control" type="text" name="name" placeholder="Enter meeting name"><br>
                                                <label for="">Time</label><br>
                                                <input class="form-control" type="time" name="time" placeholder="Enter meeting time"><br>
                                                <label for="">Date</label><br>
                                                <input class="form-control" type="date" name="date"><br>
                                                <label for="">Room</label><br>
                                                <input class="form-control" type="text" name="room" placeholder="Enter meeting room"><br>

                                                <input class="btn btn-primary" type="submit" name="submit" value="Add"><br>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Host</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Deparment</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider custom-tbody">
                                <?php
                                include "./../utils/dbConnect.php";


                                $query = " SELECT * FROM meeting ORDER BY date";
                                if (isset($_SESSION) && $_SESSION['user_dep'] == 'manager') {
                                    $query = " SELECT * FROM meeting WHERE dep='{$_SESSION['user_dep']}' OR dep=''";
                                } else if (isset($_SESSION) && $_SESSION['user_dep'] == 'employee') {
                                    $query = " SELECT * FROM meeting WHERE dep='{$_SESSION['user_dep']}'";
                                }
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <th scope='row'>" . $row["id"] . "</th>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["host"] . "</td>
                                    <td>" . $row["time"] . "</td>
                                    <td>" . $row["date"] . "</td>
                                    <td>" . $row["room"] . "</td>
                                    <td>" . $row["dep"] . "</td>
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