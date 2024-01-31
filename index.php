<?php
session_start();
include('controller/dbc.php');
$dbs = new Dbc();
$user_role = '';

// include('controller/session.php');
$page = 'index';
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

    <title>Distress Property Market : Home</title>

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
    <!-- <link href="assets/css/nice-select.css" rel="stylesheet"> -->
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <style>
        .category-block-one .inner-box .more-btn .theme-btn.btn-one:hover {
            background-color: white !important;
            border: 2px solid white !important;
            color: #D9A464 !important;
            box-shadow: 0 10px 30px 0px rgb(0 0 0 / 10%);

        }
    </style>

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">

        <!-- main header -->
        <?php include('include/header.php') ?>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php include('include/mobilemenu.php') ?>
        <!-- End Mobile Menu -->


        <!-- banner-section -->
        <section class="banner-style-two centred">
            <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid1.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid2.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid3.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid4.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid5.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid6.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid7.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/slid8.jpeg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <p> Africa’s Biggest Distress Property Market Place
                            <p>
                            <h2>BUY. SELL. INVEST.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="search-field-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="search-field">
                        <div class="tabs-box">

                            <!-- <div class="tabs-content info-group">
                                <div class="tab active-tab" id="tab-1"> -->
                            <div class="inner-box">
                                <div class="top-search">
                                    <form action="property-gridAll.php" method="get"
                                        class="search-form  justify-content-center align-items-center text-center d-flex">
                                        <div class="row clearfix" style="width: 800px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                                <div class="form-group">

                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="search"
                                                            placeholder="Search by Property, Address, City or State..."
                                                            required="">
                                                    </div>
                                                </div>
                                                <button type="submit" class="search-btn p-2"><i
                                                        class="fas fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- </div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- <section class="banner-section" style="background-image: url(assets/images/bannerhome.jpg);">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="content-box centred">
                        <p> Africa’s Biggest Distress Property Market Place <p>
                        <h2>BUY. SELL. INVEST.</h2>
                    </div>
                    <div class="search-field">
                        <div class="tabs-box">
                           
                            <div class="tabs-content info-group">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="property-gridAll" method="get" class="search-form">
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                        <div class="form-group">
                                                           
                                                            <div class="field-input">
                                                                <i class="fas fa-search"></i>
                                                                <input type="search" name="search"
                                                                    placeholder="Search by Property, Address, City or State..."
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="search-btn">
                                                    <button type="submit"><i class="fas fa-search"></i>Search</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- banner-section end -->


        <!-- category-section -->
        <section class="category-section centred">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">

                    <div class="row clearfix m-3">
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-1"></i></div>
                                    <h5><a href="property-gridAll.php">Buy</a></h5>
                                    <p class="text-center">
                                        Looking for Property to
                                        buy at the best possible
                                        prices?
                                        With us you have the
                                        advantage to acquire
                                        property in prime
                                        locations with prices that
                                        are below actual market
                                        value.
                                    </p>
                                    <div class="more-btn"><a href="property-gridAll.php" class="theme-btn btn-one hov">Get
                                            Started</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-26"></i></div>
                                    <h5><a href="property-gridAll.php">Sell</a></h5>
                                    <p class="text-center pb-4">In need of a lump sum
                                        of cash and need to
                                        liquidate an asset real
                                        quick?
                                        We offer financial relief
                                        and can get your
                                        Distress property off
                                        the market in record
                                        time.</p>
                                    <div class="more-btn"><a href="signup.php" class="theme-btn btn-one hov">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h5><a href="property-details.php">Invest</a></h5>
                                    <p class="text-center">Looking for viable
                                        hands to multiply
                                        your money with
                                        excellent and
                                        consistent return on
                                        investment?
                                        We have the best
                                        investment packages
                                        with nearly 0% risk.</p>
                                    <div class="more-btn"><a href="dci.php" class="theme-btn btn-one hov">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a></div> -->
                </div>
            </div>
        </section>
        <!-- category-section end -->


        <!-- feature-section -->
        <section class="feature-section sec-pad bg-color-1">
            <div class="auto-container">
                <div class="sec-title centred">

                    <h2>Featured Distress Property</h2>
                    <p>We offer financial services via a financial relief strategy through the liquidation of Distress
                        Property.</p>
                </div>
                <div class="row clearfix">
                    <?php
                    $propertyCategory = 'Distress Properties';
                    $fetch = $dbs->SelectAllApropertiesNoSessLimit($propertyCategory);
                    if ($fetch):
                        foreach ($fetch as $info):
                            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block ">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <?php 
                                                        $galleryimage = $info['galleryimage'];
                                                        $fetchgallery =  $dbs->SelectFromImgLim($galleryimage);
                                                        foreach ($fetchgallery as $fetchgalleryInfo ){
                                                    ?>
                                    <!-- <figure class="image-box"><img
                                            src="./galleryImage/<?= $fetchgalleryInfo['imagename']  ?>" alt=""
                                            style="width: 100% !important; height: 400px !important; background-size: cover;">
                                    </figure> -->
                                    <?php }  ?>
                                    <figure class="image-box"><img
                                            src="./featuredGallery/<?= $info['featuredimage'] ?>" alt=""
                                            style="width: 100% !important; height: 400px !important; background-size: cover;">
                                    </figure>
                                    <!-- <figure class="image"><img src="featuredGallery/<?= $info['featuredimage'] ?>"
                                                            alt="">
                                                    </figure> -->
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">
                                        Featured
                                        <?php $info['propertyCategory'] ?>
                                    </span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            <figure class="author-thumb"><img src="assets/images/footer-logo.png"
                                                    style="object-fit:cover; background-position: center; width: 60px; height: 40px; border-radius: 50%;"
                                                    alt="">
                                            </figure>
                                            <h6 class="text-uppercase">
                                                <?= $info['propertytitle'] ?>
                                            </h6>
                                        </div>
                                        <div class="buy-btn pull-right d-flex jusify-content-between">
                                        <span class="mr-2 rounded text-white p-2" style="font-size: 10px; background-color: #004030;" >Cryptocurrency accepted</span>
                                                        <a style="font-size: 10px;" href="property-details.php?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                            <?= $info['symbol'] . $info['propertyprice'] ?>
                                                        </a>
                                                    </div>
                                    </div>

                                    <div class="title-text">
                                        <h6><a
                                                href="property-details.php?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                <?= $info['city'] ?>,
                                                <?= $info['state'] ?>
                                                <?= $info['area_location'] ?>
                                            </a></h6>
                                    </div>
                                    <div class="title-text">
                                        <h4><a class="text-capitalize" style="color:#2F7366 !important;"
                                                href="property-details.php?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                <?= $info['typeproperty'] ?>
                                            </a></h4>
                                    </div>

                                    <p>
                                        <?= substr($info['detailedinfo'], 0, 77) . ' ...' ?>
                                    <p>
                                    <ul class="more-details clearfix">
                                        <?php if($info['propertyCategory'] !== 'Land'):  ?>
                                        <?php if($info['propertyCategory'] !== 'Autos/Machinery'):  ?>

                                        <li><i class="icon-14"></i>
                                            <?= $info['bedrooms'] ?> Beds
                                        </li>
                                        <li><i class="icon-15"></i>
                                            <?= $info['bathroom'] ?> Baths
                                        </li>
                                        <li><i class="icon-15"></i>
                                            <?= $info['toilets'] ?> Toilets
                                        </li>

                                        <?php else:  ?>
                                        <?php endif;  ?>
                                        <?php else:  ?>
                                        <p><i class="icon-16"></i>
                                            <?= $info['landsize']  ?> landsize(sqrt)
                                        </p>
                                        <?php endif;  ?>
                                    </ul>
                                    <div class="btn-box d-flex justify-content-center align-items-center text-center"><a
                                            href="property-details.php?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                            class="theme-btn btn-one">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    else:
                        ?>
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 feature-block d-flex justify-content-center align-items-center text-center">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="lower-content d-flex justify-content-center align-items-center ">
                                    <div class="btn-box mt-5"><a href="javascript:void()" class="theme-btn btn-two">No
                                            Property Found</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="more-btn centred"><a href="property-grid.php?propertyCategory=Distress Properties"
                        class="theme-btn btn-one">View All
                        Listing</a></div>
            </div>
        </section>
        <!-- feature-section end -->

        <!-- Lannd feature-section -->
        <section class="feature-section sec-pad bg-color-1" style="background-color: white;">
            <div class="auto-container">
                <!-- <div class="sec-title centred">
                    
                    <h2>Featured Land Property</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                        dolore magna aliqua enim.</p>
                </div> -->
                <div class="row clearfix">
                    <!-- <video src="https://www.youtube.com/watch?v=mCSImAzDMXg&feature=youtu.be" controls loop style="width: 100%; height: 100%;" class=""></video> -->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/mCSImAzDMXg"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen style="width: 100%; height: 100%;"> </iframe>
                </div>
            </div>
        </section>


        <!-- testimonial-section end -->
        <section class="testimonial-section bg-color-1 centred">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Testimonials</h5>
                    <h2>What They Say About Us</h2>
                </div>
                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <figure class="thumb-box"><img src="assets/images/Austin Abighosa_.png" alt="">
                            </figure>
                            <div class="text">
                                <p>
                                    Whenever I hear the Distress Property Market is unveiling a new product offering, I
                                    get excited. That's particularly because in 2021 they sold my Lekki home via their
                                    distress express service. I am thrilled to be part of this exciting new opportunity
                                    to make more money as an investor with low to zero risk involved and guaranteed high
                                    returns on investment. I will recommend you join the train while offer lasts.
                                    .</p>
                            </div>
                            <div class="author-info">
                                <h4>Austin Abighosa</h4>
                                <span class="designation">Lagos, Nigeria</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <figure class="thumb-box"><img src="assets/images/Benjamin_.png" alt="">
                            </figure>
                            <div class="text">
                                <p>My first encounter with the Distress Property Market Ltd was sometime in February;
                                    they helped my sister who was in financial distress at the time sell off her $8
                                    million home in Banana Island in 3 weeks. I am currently on the waitlist for their
                                    'Distress Invest' product because I trust the brand, and witnessed how effective
                                    their solutions are.</p>
                            </div>
                            <div class="author-info">
                                <h4>Olabisi Adebanjo</h4>
                                <span class="designation">Southern California, USA</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- testimonial-section end -->




        <!-- main-footer -->
        <?php include('include/footer.php') ?>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade  " id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
            <div class="modal-content pt-3" style="background-color: #D9A464;">
                <!-- <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Don't leave without an exclusive offer from us </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div> -->
                <form class=""
                    action="https://distresspropertymarket.us14.list-manage.com/subscribe/post?u=3617399b9ffe7259a94198d02&amp;id=caa3512409&amp;f_id=00b976e0f0"
                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
                    <div class="modal-body p-2">
                        <h5 class="modal-title text-center text-white p-2" id="modalTitleId">Get first hand access and
                            updates on available distress deals </h5>
                        <div class="col-md-12 my-2">
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Name"
                                name="FNAME" required>
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Email"
                                name="EMAIL" required>
                        </div>
                        <div class="col-md-12 my-2">
                            <button type="submit" style="background-color: #004030; width: 100%;"
                                class="btn text-white">Subscribe Now</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
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
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/nav-tool.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <!-- Optional: Place to the bottom of scripts -->
    <script>
        $("#modalId").modal('show')
    </script>
</body>

</html>