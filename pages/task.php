<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

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

    <style>
        <?php include "../main.css";
        include "../style/task.css" ?>
    </style>
    <title>Task</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap w-100">
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
                    <div class="row justify-content-center">
                        <!-- Table -->
                        <div id="task-list" class="col-10 col-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Task ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Staff ID</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-success">
                                        <th scope="row" class="task-id">1</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Finished</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-success">
                                        <th scope="row">2</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Finished</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-warning">
                                        <th scope="row">3</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Pending</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-success">
                                        <th scope="row">4</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Finished</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-danger">
                                        <th scope="row">5</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Overdue</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-warning">
                                        <th scope="row">6</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Pending</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-danger">
                                        <th scope="row">7</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Overdue</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-warning">
                                        <th scope="row">8</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Pending</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="table-success">
                                        <th scope="row">9</th>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>Finished</td>
                                        <td class="view-task">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                View
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Task title</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Task ID : <span> ... </span></div>
                                                            <div>Description :
                                                                <div>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit. Ab, laborum eos voluptate est quidem ut nam
                                                                    alias possimus dolore ullam deleniti iusto sit error
                                                                    tempora harum esse dolorem sunt explicabo.
                                                                </div>
                                                            </div>
                                                            <div>Attachment(s) : <a href="...">files</a></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination for table-->
                        <div id="pagination-bar" class="col-10 col-auto">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                        <span class="page-link">
                                            2
                                            <span class="sr-only"></span>
                                        </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Task assignment-->
                        <div id="task-button" class="col-10 col-auto">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createTaskModal">
                                    Create task
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="createTaskModal" tabindex="-1"
                                    aria-labelledby="createTaskModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createTaskModalLabel">Create Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Description</label>
                                                        <input type="email" class="form-control"
                                                            id="exampleInputEmail1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Staff
                                                            ID</label>
                                                        <input type="password" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Deadline</label>
                                                        <input type="password" class="form-control"
                                                            id="exampleInputPassword1">
                                                    </div>
                                                    <label class="form-label" for="customFile">Upload related
                                                        documents</label>
                                                    <input type="file" class="form-control" id="customFile" />
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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