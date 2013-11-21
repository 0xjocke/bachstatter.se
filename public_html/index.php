<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Frontend Utvecklare som jobbar med HTML5, CSS3, Sass och jQuery och PHP efter dina önskemål">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Frontend Developer</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
            if (!window.jQuery) {
                document.write('<script src="js/jquery.js"><\/script>');
            }
        </script>
    </head>
    <body>
        <!-- Arrows-->
        <div class="arrowcon">
            <div id="up" class="up key"></div>
            <div id="down" class="down key"></div>
        </div>
        <!-- Contact -->
        <div class="contactpic"></div>
        <?php require '../contact.php'; ?>

    <!-- Nav -->
        <nav class="menu">
                <ul class="navigation">
                    <li id="homelink" class="thispage">
                        <a href="#">
                            <span>Home</span>
                        </a>
                    </li>
                    <li id="aboutlink">
                        <a href="#">
                            <span>About</span>
                        </a>
                    </li>
                    <li id="portfoliolink">
                        <a href="#">
                            <span>Portfolio</span>
                        </a>
                    </li>
                    <li id="contactlink">
                        <a>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>
    <!-- Home Section -->
            <section id="home">
                <header class="intro">
                    <h1>Joachim Bachstätter</h1>
                     <h2>- Frontend Developer</h2>

                    <div class="white">
                            <img src="images/logos.png">
                    </div>
                </header>
            </section>
    <!-- About Section -->
<?php require '../about.php'; ?>
    <!-- Portfolio Section -->
<?php require '../portfolio.php'; ?>

<!-- Script -->
        <script src="js/script.js"></script>
    </body>
</html>