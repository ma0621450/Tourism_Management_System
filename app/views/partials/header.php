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
    <title>VMS</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">VMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if ($role == 3 || !$isLoggedIn) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Vacation_Management/">Home</a>
                        </li>
                    <?php } ?>

                    <?php if ($isLoggedIn) { ?>
                        <?php if ($role == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">All Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">All Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">All Users</a>
                            </li>
                        <?php } ?>

                        <?php if ($role == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="Agency_Packages">My Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">My Bookings</a>
                            </li>
                        <?php } ?>

                        <?php if ($role == 3) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">Bookings</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="register">Register</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>