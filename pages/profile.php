<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
        <?php include "../main.css";
        include "../style/profile.css" ?>
    </style>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap w-100">
            <?php
            include "../components/main/sidebar.php";
            ?>

            <div class="col-auto col-10 p-0">
                <div class="page-title">
                    <h2>Profile</h2>
                </div>

                <div class="page-content">
                    <!--  -->
                    <div class="row justify-content-center">
                        <div id="profile-pic" class="col-4 col-auto">
                            <img src="../img/avatar-icon.png" alt="">
                        </div>
                        <div id="profile-info" class="col-8 col-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">Johnatan Smith</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">example@example.com</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">(097) 234-5678</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Department</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">Finance</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <!-- Button trigger modal -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#changePassword">
                                    Change password
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="changePassword" tabindex="-1"
                                    aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="changePasswordModalLabel">Change password
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="oldPw" class="form-label">Enter old
                                                            password: </label>
                                                        <input type="password" class="form-control" id="oldPw">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="newPw" class="form-label">Enter new
                                                            password:</label>
                                                        <input type="password" class="form-control" id="newPw">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                        </div>
                    </div>

                </div>
            </div>
</body>