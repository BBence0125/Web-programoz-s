<?php
    require_once('functions.php');
    require_once('config.php');
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburger Menü</title>
    <style>
        /* Stílusok a hamburger menühöz */
        .navbar {
            background-color: #f8f9fa;
        }
        .navbar-toggler {
            border: none;
            outline: none;
            padding: 10px 15px;
            cursor: pointer;
            background-color: transparent;
        }
        .navbar-toggler:focus {
            outline: none;
        }
        .navbar-toggler span {
            display: block;
            width: 24px;
            height: 2px;
            background-color: #333;
            margin-bottom: 5px;
        }
        .navbar-collapse {
            display: none;
        }
        .navbar-nav {
            margin-left: auto;
        }
        .navbar-nav a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
        }
        .navbar-nav a:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" id="navbar-toggler" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <?php foreach ($menu as $key => $item) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo $item; ?>"><?php echo $key; ?></a>
                    </li>
                <?php } ?>
            </ul>
            <?php if (is_logged_in()) { ?>
                <a class="btn btn-primary" href="kilepes.php">Kijelentkezés</a>
            <?php } else { ?>
                <a class="btn btn-primary btn-login" href="./bejelentkezes/bejelentkezes.php">Bejelentkezés</a>
            <?php } ?>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var navbarToggler = document.getElementById('navbar-toggler');
        var navbarCollapse = document.getElementById('navbarSupportedContent');

        navbarToggler.addEventListener('click', function () {
            if (navbarCollapse.style.display === 'block') {
                navbarCollapse.style.display = 'none';
            } else {
                navbarCollapse.style.display = 'block';
            }
        });
    });
</script>

</body>
</html>
