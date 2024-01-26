<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$dbs = new Dbc();
$page = 'DCi';
$user_role = '';

if (isset($_SESSION['useremail'])) {

    $user_email = $_SESSION['useremail'];
    $UsersData = $dbs->currentUser($user_email);
    foreach ($UsersData as $values) {
        $user_role = $values['user_role'];
        // $hashpass = $values['hashpass'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Distress Property Market - DCI</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">




        <!-- end switcher menu -->


        <!-- main header -->
        <?php include('include/header2.php') ?>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php include('include/mobilemenu.php') ?>
        <!-- End Mobile Menu -->


        <!--Page Title-->
        <!-- <section class="page-title centred" style="background-image: url(assets/images/bgall.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Distress Capital Investment</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Distress Capital Investment</li>
                    </ul>
                </div>
            </div>
        </section> -->
        <section class=" "
            style="background-image: url(assets/images/invest1.jpeg); padding: 0px;    height: 100%; background-repeat: no-repeat; ">
            <img src="assets/images/invest1.jpeg" style="padding: 0px;    height: 100%; background-repeat: no-repeat; "
                alt="">
        </section>
        <!--End Page Title-->


        <!-- about-section -->
        <section class="about-section about-page pb-0">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row  clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="assets/images/dci.jpg" alt=""></figure>
                                    <div class="text wow fadeInLeft animated" data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <h2 style="color:white !important; ">10</h2>
                                        <h4>Years of <br />Experience</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">

                                    <div class="text">
                                        <p>Making money in the 21st century and sustaining it is fast becoming a chaotic
                                            habitat. Don’t you agree? The need to diversify income sources and make more
                                            has never been more paramount.
                                            But of course It will be even more chaotic to take on multiple jobs to keep
                                            afloat. That’s why an investment solution that enables your money do the
                                            work for you and earn you more money would always be the best innovation
                                            mankind has seen yet in the money market. But even with this solution, risk
                                            tolerance and the magnitude of actual risk will always be a topic of
                                            interest capable of hindering adequate action.
                                        </p>
                                        <p>As a new investor, there are lots of different ways to think about risk.
                                            First, it's essential to understand your risk tolerance. Taking on more risk
                                            than you're comfortable with might create unnecessary stress in your life.
                                            And not taking enough risk could leave you frustrated that you're far away
                                            from reaching your investing and financial goals.
                                            It would interest you to know that we have carefully analyzed the question
                                            of risk and have designed The Distress Capital Investment as a Real Estate
                                            Trust Investment solution guaranteeing nearly 0% risk.
                                        </p>
                                        <p>It is known fact that the average investor struggles to make money because
                                            investing is a highly competitive profession. Unlike jobs, Investors are
                                            competing with other investors from all over the world; particularly with
                                            investment schemes like bonds, stocks, private equity and trading platforms
                                            like forex. For these types of schemes, to win ultimately means someone
                                            somewhere has to lose. Average investors are in direct competition with
                                            professional fund managers and legendary investors alike. But what if we can
                                            get a level playing field for all investor’s with the same probability index
                                            to make money regardless of caliber and experience. The only advantage here
                                            would be investment capital. </p>
                                        <p>This is the Investment solution we bring to the table by trading and flipping
                                            Distress Properties.</p>

                                    </div>
                                    <!-- <ul class="list clearfix">
                                        <li>consectetur elit sed do eius</li>
                                        <li>consectetur elit sed</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn btn-one">Contact With Me</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section -->
        <section class="contact-section bg-color-2">
            <div class="auto-container">

                <img src="assets/images/investnew.jpg" alt=""></figure>

            </div>
        </section>

        <!-- contact-section -->
        <section class="contact-section">
            <div class="auto-container">

                <img src="assets/images/investnew2.jpg" class="py-2"  alt="">
                <img src="assets/images/invest3.jpeg"  class="py-2" alt="">
                <img src="assets/images/invest2.jpeg" class="py-2"  alt="">

            </div>
        </section>


        <!-- main-footer -->
        <?php include('include/footer.php') ?>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>