<?php
$isLoggedIn = isset($_SESSION['user']['email']);
$role = isset($_SESSION['user']['role_id']) ? $_SESSION['user']['role_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="public/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="public/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="public/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="public/assets/css/style.css" rel="stylesheet">
    <title>VMS</title>
</head>

<body>



    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-success m-0">
                    <i class="fa fa-map-marker-alt me-3"></i>VMS
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto py-0">
                    <?php if ($role == 3 || !$isLoggedIn) { ?>
                        <li class="nav-item">
                            <a class="nav-item nav-link active" aria-current="page" href="/Vacation_Management/">Home</a>
                        </li>
                    <?php } ?>

                    <?php if ($isLoggedIn) { ?>
                        <?php if ($role == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="admin">All Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="add_services">Add Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="add_destinations">All
                                    Destinations</a>
                            </li>
                        <?php } ?>

                        <?php if ($role == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="Agency_Packages">My Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="package_bookings">My Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="a_inquiry">Inquiries</a>
                            </li>
                        <?php } ?>

                        <?php if ($role == 3) { ?>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="bookings">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-item nav-link active" aria-current="page" href="inquiry">Inquiries</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-item nav-link active" aria-current="page" href="logout">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-item nav-link active" aria-current="page" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link active" aria-current="page" href="register">Register</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">
                        Enjoy Your Vacation With Us
                    </h1>
                    <?php if ($_SERVER['REQUEST_URI'] == '/Vacation_Management/'): ?>
                        <p class="fs-4 text-white mb-4 animated slideInDown">
                            Tempor erat elitr rebum at clita diam amet diam et eos erat
                            ipsum lorem sit
                        </p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Eg: Thailand" />
                            <button type="button"
                                class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2"
                                style="margin-top: 7px">
                                Search
                            </button>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    </div>