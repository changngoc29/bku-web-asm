<div class="col-auto col-md-2 px-md-2 px-0 bg-secondary">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="http://localhost/web-assignment/pages/home.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-md-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="http://localhost/web-assignment/pages/home.php" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i></i>
                    <span class="ms-1 d-none d-md-inline">Home</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/web-assignment/pages/task.php" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i>
                    <span class="ms-1 d-none d-md-inline">Task</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/web-assignment/pages/employee.php" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i>
                    <span class="ms-1 d-none d-md-inline">Employees</span>
                </a>
            </li>
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-grid"></i>
                    <span class="ms-1 d-none d-md-inline">Products</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link px-0">
                            <span class="d-none d-md-inline">Product</span> 1</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0">
                            <span class="d-none d-md-inline">Product</span> 2</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0">
                            <span class="d-none d-md-inline">Product</span> 3</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0">
                            <span class="d-none d-md-inline">Product</span> 4</a>
                    </li>
                </ul>
            </li>

        </ul>
        <hr />
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../img/avatar.webp" width="30" height="30" class="rounded-circle" />
                <span class="d-none d-md-inline mx-1" style="padding: 10px">Name</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="http://localhost/web-assignment/utils/auth/logoutHandling.php">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>