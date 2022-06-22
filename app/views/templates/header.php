<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blogging</title>

    <!-- Font Kaushan -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?=BASEURL;?>/css/bootstrap.min.css">

    <style>
        .font-kaushan{
            font-family: 'Kaushan Script', monospace;
        }
    </style>

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fs-4 font-kaushan" href="<?= BASEURL; ?>/blog">Blogging</a>

                <button 
                    class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNavAltMarkup" 
                    aria-controls="navbarNavAltMarkup" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-outline-secondary d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="d-none d-sm-inline mx-1"><?= $_SESSION['nama'] ?></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                        <?php if ($_SESSION['user_role'] == 0) : ?>
                                            <li><a class="dropdown-item" href="<?=BASEURL;?>/user/setting">Settings</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                        <?php else : ?>
                                            <li><a class="dropdown-item" href="<?=BASEURL;?>/blog/table">Dashboard</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                        <?php endif; ?>
                                        <li><a class="dropdown-item" href="<?=BASEURL;?>/auth/logout">Sign out</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="nav-item me-3">
                                <a class="nav-link btn btn-outline-secondary btn-sm text-uppercase" href="<?=BASEURL?>/auth">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-success btn-sm text-uppercase" href="<?=BASEURL?>/auth/register">Register</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>