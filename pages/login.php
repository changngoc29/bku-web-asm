<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style/login.css" />
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Welcome</title>
</head>

<body>
    <div class="container row m-auto">
        <div class="col-10 col-md-6 text-center">
            <img src="../img/HCMUT_official_logo.png" alt="HCMUT logo" class="mx-auto d-block">
        </div>

        <div class="col-10 col-md-6">
            <div class="container">
                <h2 class="w-100 d-block text-center text-uppercase mb-5"> Internal Enterprise Web-based Application </h2>
                <h4 class="text-center d-block">LOG IN</h4>
                <form method="POST" action="../utils/auth/loginHandling.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username: </label></label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <a href="#" class="text-decoration-none color-secondary font-italic">Forgot Password ?</a>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary submit">Log in</button>
                </form>
            </div>
        </div>
    </div>
</body>