<?php
session_start();
include ('Class/handel.php');
$handel = new handel();
$page = "Home";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $handel->h_getWord('projectName', 'e'); echo ' | ' . $page;?></title>
    <link rel="icon" href="./assist/img/logo.png" type="image/png">

    <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="vendors/flat-icon/font/flaticon.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
           -moz-appearance: textfield;
        }
        .goB{
            background-color:#ea0763;
            transition: all .5s;
        }
        .goB:hover{
            background-color: #89083c;
        }

    </style>
</head>

<body>

    <!--================ Header Menu Area start =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <a class="navbar-brand logo_h" href="index.php"><img src="img/logo/logoall.png" height="50" width="70" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="mobile.php">Answer</a></li>
                            <?php if(isset($_SESSION['startUser'])){?>
                                <li class="nav-item"><a class="nav-link" href="DashboardQ.php">Dashboard</a>
                                <li class="nav-item"><a class="nav-link" href="createGroup.php">Cerate Group</a>
                            <?php }else{echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a>';} ?>
                        </ul>

                        <ul class="nav-right text-center text-lg-right py-4 py-lg-0">
                            <li>
                                <?php
                                if (!isset($_SESSION['startUser'])) {
                                    echo '<a class="button button-header" href="register.php" style="padding: 5px 20px; color: white;">Sign Up</a>';
                                }else{
                                    echo $handel->h_myName($_SESSION['startUser']) . " !";
                                }
                                ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <!--================Hero Banner Area Start =================-->
    <section class="hero-banner">
        <div class="container text-center">
            <span class="hero-banner-icon"><img src="img/logo/iconW.png" alt="" height="100" width="70"></span>
            <h1> Voote Project <br> 2020 </h1>
            <form class="form-inline" style="justify-content: center;" method="get" action="mobile.php">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only"></label>
                    <input type="number" name="GroupId" maxlength="9" minlength="9" class="form-control" id="inputPassword2" placeholder="Enter Group ID:" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2 goB">Go</button>
            </form>
        </div>
    </section>

    <!--================ Join section Start =================-->
    <section class="section-margin">
        <div class="container">
            <div class="section-intro text-center pb-98px">

                <h2 class="primary-text">Why use Voote</h2>
                <img src="img/home/section-style.png" alt="">
            </div>


            <div class="d-lg-flex justify-content-between">
                <div class="card-feature mb-5 mb-lg-4">
                    <div class="feature-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3>Easy to organize </br>
                        Easy to vote. </h3>
                    <p> With Voote, creating a vote is intuitive, easy and fast. No coding knowledge is required. Voting can be conducted on the go on a smartphone or tablet </p>
                </div>

                <div class="card-feature mb-5 mb-lg-4">
                    <div class="feature-icon">
                        <i class="fas fa-stream"></i>
                    </div>
                    <h3> Real-Time computing . </h3>
                    <p>His likeness beast moved domini moved above meat all fly blessed greater creepeth you itself living room </p>
                </div>

                <div class="card-feature mb-5 mb-lg-4">
                    <div class="feature-icon">
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <h3>Immutable and anonymous</h3>
                    <p>Voote is based on blockchain technology, which makes voting 100% secure and immutable, always secured and secrecy.</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">

        </div>
    </section>

    <!--================ Join section End =================-->


    <!--================ Team section Start =================-->
    <section class="speaker-bg section-padding">
        <div class="container">
            <div class="section-intro section-intro-white text-center pb-98px">

                <h2 class="primary-text">Out Team</h2>
                <img src="img/home/section-style.png" alt="">
            </div>

            <div class="row" style="justify-content: center;">
                <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0">
                    <div class="card-speaker">
                        <img class="card-img rounded-0" src="img/home/sp3.jpg" alt="">
                        <div class="speaker-footer">
                            <h4>Gerges Romany</h4>
                            <p>Web Developer</p>
                        </div>
                        <div class="speaker-overlay">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    <!--================ Speaker section End =================-->

    <section class="section-padding--small sponsor-bg">
        <div class="container">
            <div class="section-intro text-center pb-80px">
                <h2 class="primary-text"> About </h2>
                <img src="img/home/section-style.png" alt="">

                <p>
                    Online voting systems are software platforms used to securely conduct votes and elections. As a digital platform, they eliminate the need to cast your votes using paper or having to gather in person. They also protect the integrity of your vote by preventing
                    voters from being able to vote multiple times. These services help organizations save time, stick to best practices, and meet internal requirements and/or external regulations.
                </p>
            </div>
        </div>
    </section>


    <!--================ Sponsor section Start =================-->



    <!-- ================ start footer Area ================= -->

    <footer class="footer-area">
        <div class="container">
        <div class="row">
                <div class="col-lg-4  col-md-4 col-sm-6">
                    <div class="single-footer-widget">
                        <h6> Contact Info </h6>
                        <p>
                            <a href = "tel:+201221102489">
                                Phone: +201221102489
                            </a> <br>

                            <a href = "mailto: Gerges.Romany@yahoo.com">
                                E-mail: Gerges.Romany@yahoo.com
                            </a> <br>

                            <a href = "https://github.com/GergesGandy" target="_blank">
                                GitHub: /GergesGandy
                            </a> <br>

                            <a href = "https://www.linkedin.com/in/GergesGandy" target="_blank">
                                Linkedin: /GergesGandy
                            </a> <br>

                            <a href = "https://www.facebook.com/GergesGandy98/" target="_blank">
                                Facebook: /GergesGandy98
                            </a> <br>

                        </p>
                    </div>
                </div>

                <div class="col-lg-4  col-md-4 col-sm-6">
                    <div class="single-footer-widget">

                    </div>
                </div>

            <div class="col-lg-4  col-md-4 col-sm-6">
                    <div class="single-footer-widget">

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <strong>Copyright &copy; 2019-2020 <a href="https://github.com/GergesGandy" target="_blank">Gerges Romany</a>.</strong>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->




    <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
