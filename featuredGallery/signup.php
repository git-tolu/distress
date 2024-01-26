<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$dbs = new Dbc();
$errorMessage = '';
$user_role = '';
$page = '';

if (isset($_POST['regrealuser'])) {
    $fullname = $dbs->test_input($_POST['fullname']);
    $user_email = $dbs->test_input($_POST['user_email']);
    $user_role = $dbs->test_input($_POST['user_role']);
    // $user_role = 'Agent';
    $username = $user_role . '_' . rand(999, 10000);
    $userPassword = $dbs->test_input($_POST['user_password']);
    $conPass = $dbs->test_input($_POST['conPass']);
    $userType = $dbs->test_input($_POST['userType']);
    $callNumber = $dbs->test_input($_POST['callNumber']);
    $whatsappNumber = $dbs->test_input($_POST['whatsappNumber']);
    $userid = 'real' . '_' . rand(9999, 100000);
    if (strlen($userPassword) > 8) {
        if ($userPassword == $conPass) {
            $hpass = password_hash($userPassword, PASSWORD_DEFAULT);
            $verifyCode = rand(999, 100000);
            $accountstatus = 'pending';
            $checkuser = $dbs->user_exitsEmail($user_email);
            if ($checkuser) {
                $errorMessage = '<p class="text-danger">Error:User is already Exit</p>';
            } else {
                $_SESSION['fullname'] = $fullname;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_role'] = $user_role;
                $_SESSION['username'] = $username;
                $_SESSION['hpass'] = $hpass;
                $_SESSION['userid'] = $userid;
                $_SESSION['accountstatus'] = $accountstatus;
                $_SESSION['userType'] = $userType  ;
                $_SESSION['callNumber'] = $callNumber  ;
                $_SESSION['whatsappNumber'] = $whatsappNumber  ;

                // $regUser = $dbs->regLandUsers($userid, $username,  $fullname,  $user_email, $user_role, $hpass, $accountstatus);

                // $_SESSION['user_role'] = $user_role;
                // $_SESSION['useremail'] = $user_email;

                // if($regUser){
                $status = 'not verify';
                $sendVerify = $dbs->sendVerifyCode($fullname, $user_email, $verifyCode, $status);
                if ($sendVerify) {
                    include_once('controller/sendcode.php');
                }
                // }
            }
        } else {
            $errorMessage = '<p class="text-danger">Error: Password do not Match</p>';
        }
    } else {
        $errorMessage = '<p class="text-danger">Error: Password must be 8 characters Long</p>';
    }



}
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

    <title>Distress Property Market - Signup</title>

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


        <!-- switcher menu -->

        <!-- end switcher menu -->


        <!-- main header -->
        <?php include('include/header2.php') ?>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php include('include/mobilemenu.php') ?>

        <!-- End Mobile Menu -->

        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/bgall.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Sign Up</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Sign Up</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- ragister-section -->
        <section class="ragister-section centred sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                        <!-- <div class="sec-title">
                            <h5>Sign up</h5>
                            <h2>Distress Property Market</h2>
                        </div> -->
                        <div class="tabs-box">
                            <!-- <div class="tab-btn-box">
                                <ul class="tab-btns tab-buttons centred clearfix">
                                    <li class="tab-btn active-btn" data-tab="#tab-1">Agent</li>
                                    <li class="tab-btn" data-tab="#tab-2">Subscriber</li>
                                </ul>
                            </div> -->
                            <div class="tabs-content">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">
                                        <h4>Sign up</h4>
                                        <?= $errorMessage ?>
                                        <form action="" method="post" class="default-form">
                                            <div class="form-group">
                                                <label>Full name</label>
                                                <input type="text" name="fullname" required="">
                                                <input type="text" hidden value="Agent" name="user_role" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="email" name="user_email" required="">
                                            </div>
                                            <div class="form-group">
                                              <label for="" class="form-label">Select Appropritately</label>
                                                <select class="form-control" name="userType" id="">
                                                    <option selected>Select Appropritately</option>
                                                    <option value="Property Owner">Property Owner</option>
                                                    <option value="Agent">Agent</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="callNumber" class="form-label">Call Number</label>
                                              <input type="text" name="callNumber" id="callNumber" class="form-control" placeholder="Call Number" >
                                            </div>
                                            <div class="form-group">
                                              <label for="whatsappNumber" class="form-label">Whatsapp Number</label>
                                              <input type="text" name="whatsappNumber" id="whatsappNumber" class="form-control" placeholder="Whatsapp Number" >
                                            </div>

                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="user_password" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="conPass" required="">
                                            </div>
                                            <div class="form-group message-btn">
                                                <button type="submit" name="regrealuser" class="theme-btn btn-one">Sign
                                                    up</button>
                                            </div>
                                        </form>
                                        <div class="othre-text">
                                            <p>Already have an account? <a href="signin">Sign in</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="tab-2">
                                    <div class="inner-box">
                                        <h4>Sign up</h4>
                                        <form action="" method="post" class="default-form">
                                            <?= $errorMessage ?>
                                            <div class="form-group">
                                                <label>Full name</label>
                                                <input type="text" name="fullname" required="">
                                                <input type="text" hidden value="Subcriber" name="user_role"
                                                    required="">

                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="email" name="user_email" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="user_password" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="conPass" required="">
                                            </div>
                                            <div class="form-group message-btn">
                                                <button type="submit" name="regrealuser" class="theme-btn btn-one">Sign
                                                    up</button>
                                            </div>
                                        </form>
                                        <div class="othre-text">
                                            <p>Already have an account? <a href="signin">Sign in</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ragister-section end -->


        <!-- subscribe-section -->
        <!-- <section class="subscribe-section bg-color-3">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                        <div class="text">
                            <span>Subscribe</span>
                            <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                        <div class="form-inner">
                            <form action="contact.html" method="post" class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Enter your email" required="">
                                    <button type="submit">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- subscribe-section end -->


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

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="assets/js/gmaps.js"></script>
    <script src="assets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>