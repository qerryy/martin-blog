<?php 
    if (isset($_SESSION['user_role']) != 1 || empty($_SESSION)) {
        header('Location: ' . BASEURL . '/blog');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?=BASEURL;?>/css/bootstrap.min.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">

            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <a href="#" class="d-flex align-items-center pb-3 pt-2 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 fw-bold d-none d-sm-inline text-info">Dashboard</span>
                    </a>

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="<?= BASEURL; ?>/blog/table" class="nav-link px-0 align-middle text-light">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Artikel</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/user/table" class="nav-link px-0 align-middle text-light">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Users</span>
                            </a>
                        </li>
                    </ul>

                    <hr>

                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-sm-inline mx-1"><?= $_SESSION['nama'] ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="<?=BASEURL;?>/blog">Homepage</a></li>
                            <li><a class="dropdown-item" href="<?=BASEURL;?>/user/setting">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?=BASEURL;?>/auth/logout">Sign out</a></li>
                        </ul>
                    </div>

                </div>
            </div>