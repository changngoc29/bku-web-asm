<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
        <?php
        include "../main.css";
        include "../style/homepage.css";
        ?>
    </style>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap w-100">
            <?php
            include "../components/main/sidebar.php";
            ?>
            <script>
                var homeLink = document.querySelector('#sidebar-menu li:nth-child(1)');
                homeLink.classList.add('isActive');
            </script>

            <div class="col-auto col-10 p-0">
                <div class="page-title">
                    <h2>Home</h2>
                </div>

                <div class="page-content">
                    <!--  -->
                    <div class="row pt-2 justify-content-center">
                        <div id="homeCar" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#homeCar" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#homeCar" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#homeCar" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div id="carItem" class="carousel-item active">
                                    <img src="../img/Carousel0.jpg" class="img-fluid" alt="img0">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p id="quote">The true sign of intelligence is not knowledge, but imagination.</p>
                                        <p id="author">Albert Einstein</p>
                                    </div>
                                </div>
                                <div id="carItem" class="carousel-item">
                                    <img src="../img/Carousel1.jpg" class="img-fluid" alt="img1">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p id="quote">If everyone is moving forward together, then success takes care of itself.</p>
                                        <p id="author">Henry Ford</p>
                                    </div>
                                </div>
                                <div id="carItem" class="carousel-item">
                                    <img src="../img/Carousel2.jpg" class="img-fluid" alt="img2">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p id="quote">A leader is one who knows the way, goes the way, and shows the way.</p>
                                        <p id="author">John C. Maxwell</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#homeCar" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#homeCar" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <div class="row pt-2 d-flex justify-content-center">
                        <div class="home-util col-sm d-flex justify-content-center">
                            <div class="card text-center w-100">
                                <img class="card-img-top" src="../img/Card0.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Latest memos</h5>
                                    <a id="cardBtn" href="#" class="btn" role="button">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="home-util col-sm d-flex justify-content-center">
                            <div class="card text-center w-100">
                                <img class="card-img-top" src="../img/Card1.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Upcoming events</h5>
                                    <a id="cardBtn" href="#" class="btn" role="button">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="home-util col-sm d-flex justify-content-center">
                            <div class="card text-center w-100">
                                <img class="card-img-top" src="../img/Card2.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Contact info</h5>
                                    <a id="cardBtn" href="#" class="btn" role="button">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="home-util col-sm d-flex justify-content-center">
                            <div class="card text-center w-100">
                                <img class="card-img-top" src="../img/Card3.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Company policy</h5>
                                    <a id="cardBtn" href="#" class="btn" role="button">Read more</a>
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