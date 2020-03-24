<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="lightbox2-2.11.1/src/css/lightbox.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<!--Header start-->
<header class="header">
    <div class="wrapper">
        <div class="header_wrapper">
            <div class="header_logo">
                <div class="header_link">
                    <a href="/" class="header_logo-link">
                        <img src="/img/logo.png" alt="logo_cite" class="header_logo-pic">
                    </a>
                </div>
            </div>

            <nav class="header_nav">
                <ul class="header_list">
                    <?php
                    if (isset($_SESSION['logged_id'])) {
                        $userObj = new User();
                        $logged_user = $userObj->get_user($_SESSION['logged_id']); ?>
                        <li class="header_item">
                            <p class="header_p">Привет, <?php echo $logged_user->login_user; ?></php></p>
                        </li>
                        <li class="header_item">
                            <a href="/methods/get/logout.php" class="header_link">Выйти</a>
                        </li>
                        <li class="header_item">
                            <a href="/methods/get/private_office.php" class="header_link">Профиль</a>
                        </li>
                    <?php } else { ?>
                        <li class="header_item">
                            <a href="#!" id="login_active" class="header_link">Вход</a>
                        </li>
                        <li class="header_item">
                            <a href="#!" id="signup_active" class="header_link">Регистрация</a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="header_nav_close">
                    <span class="header_nav_close_line"></span>
                    <span class="header_nav_close_line"></span>
                </div>
            </nav>

            <div class="header_burger burger">
                <span class="burger_line burger_line_first"></span>
                <span class="burger_line burger_line_second"></span>
                <span class="burger_line burger_line_third"></span>
            </div>

        </div>
    </div>
</header>
<!--Header end-->

<div class="bg-img-left">
    <img src="/img/bg-left.png" alt="" class="bg-img-icone">
</div>

<div class="bg-img">
    <img src="/img/bg.png" alt="" class="bg-img-icone">
</div>


