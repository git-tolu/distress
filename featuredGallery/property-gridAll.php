<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$user_role = '';

$dbs = new Dbc();
$page = 'property-grid';

$propertyCategory = "All Properties";
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

    <title>Distress Property Market : Properties</title>

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
                    <h1>Properties</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Properties</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- property-page-section -->
        <section class="property-page-section property-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="filter-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Property</h5>
                                </div>
                                <div class="widget-content">
                                    <form action="" method="POST">
                                        <div class="select-box">
                                            <select class="form-control" name="propertyCategory">
                                                <option data-display="Property Type">Property Type</option>
                                                <option value="Land">Landed Properties</option>
                                                        <option value="Autos/Machinery">Autos&Machinery</option>
                                                        <option value="Distress Properties">Distress
                                                            Properties
                                                        </option>
                                                        <option value="Non Distress
                                                            Properties">Non-Distress Properties
                                                        </option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="form-control" name="state">
                                                <option data-display="Select State">Select State</option>
                                                <option>ABUJA FCT</option>
                                                <option>ABIA</option>
                                                <option>ADAMAWA</option>
                                                <option>AKWA IBOM</option>
                                                <option>ANAMBRA</option>
                                                <option>BAUCHI</option>
                                                <option>BAYELSA</option>
                                                <option>BENUE</option>
                                                <option>BORNO</option>
                                                <option>CROSS RIVER</option>
                                                <option>DELTA</option>
                                                <option>EBONYI</option>
                                                <option>EDO</option>
                                                <option>EKITI</option>
                                                <option>ENUGU</option>
                                                <option>GOMBE</option>
                                                <option>IMO</option>
                                                <option>JIGAWA</option>
                                                <option>KADUNA</option>
                                                <option>KANO</option>
                                                <option>KATSINA</option>
                                                <option>KEBBI</option>
                                                <option>KOGI</option>
                                                <option>KWARA</option>
                                                <option>LAGOS</option>
                                                <option>NASSARAWA</option>
                                                <option>NIGER</option>
                                                <option>OGUN</option>
                                                <option>ONDO</option>
                                                <option>OSUN</option>
                                                <option>OYO</option>
                                                <option>PLATEAU</option>
                                                <option>RIVERS</option>
                                                <option>SOKOTO</option>
                                                <option>TARABA</option>
                                                <option>YOBE</option>
                                                <option>ZAMFARA</option>
                                            </select>
                                        </div>
                                     
                                        <div class="filter-btn">
                                            <button type="submit" name="searchBtn" class="theme-btn btn-one"><i
                                                    class="fas fa-filter"></i>&nbsp;Filter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <!-- <div class="item-shorting clearfix">
                                <div class="left-column pull-left">
                                    <h5>Search Reasults: <span>Showing 1-5 of 20 Listings</span></h5>
                                </div>
                                <div class="right-column pull-right clearfix">
                                    <div class="short-box clearfix">
                                        <div class="select-box">
                                            <select class="form-control">
                                                <option data-display="Sort by: Newest">Sort by: Newest</option>
                                                <option value="1">New Arrival</option>
                                                <option value="2">Top Rated</option>
                                                <option value="3">Offer Place</option>
                                                <option value="4">Most Place</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="short-menu clearfix">
                                        <button class="list-view"><i class="icon-35"></i></button>
                                        <button class="grid-view on"><i class="icon-36"></i></button>
                                    </div>
                                </div>
                            </div> -->
                            <div class="wrapper grid">
                                <div class="deals-grid-content grid-item">
                                    <div class="row clearfix">
                                        <?php
                                       
                                        if (!isset($_SESSION['useremail'])) {
                                            if (isset($_POST['searchBtn'])) {
                                                $propertyCategory = $_POST['propertyCategory'];
                                                $state = $_POST['state'];
                                                // echo $state;
                                                // $area_location = $_POST['area_location'];
                                                // $city = $_POST['city'];
                                                // $fetch = $dbs->SelectAllApropertiesWhere($user_id, $propertyCategory, $area_location, $city, $state);
                                                    $fetch = $dbs->SelectAllApropertiesWhereNoSess($propertyCategory, $state);
                                                   // Number of items per page
                                                   $itemsPerPage = 9;
                                                
                                                   // Current page number
                                                   $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                   
                                                   // Calculate the starting index of the items to display
                                                   $startIndex = ($page - 1) * $itemsPerPage;
                                                   
                                                   // Query to fetch the items from the database
                                                   // Replace this with your own query to fetch the items
                                                //    $fetch = $dbs->SelectAllApropertiesNoSessNoLimitPag($propertyCategory, $itemsPerPage, $startIndex);
                                                   // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                                   
                                                   // Execute the query and fetch the items
                                                   // Replace this with your own code to execute the query and fetch the items
                                                   // $items = []; // array to store the fetched items
                                                   
                                                   // Query to get the total number of items
                                                   // Replace this with your own query to get the total number of items
                                                   // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                                   $totalItemsQuery = $dbs->SelectAllApropertiesNoSessNoLimitPagCount($propertyCategory);
                                                   $totalItemsResult =   $totalItemsQuery; // result of executing the query
                                                   
                                                   // Get the total number of items
                                                   $totalItems = $totalItemsResult['id'];
                                                   
                                                   // Calculate the total number of pages
                                                   $totalPages = ceil($totalItems / $itemsPerPage);
                                            } else {
                                                // Number of items per page
                                                $itemsPerPage = 9;
                                                
                                                // Current page number
                                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                
                                                // Calculate the starting index of the items to display
                                                $startIndex = ($page - 1) * $itemsPerPage;
                                                
                                                // Query to fetch the items from the database
                                                // Replace this with your own query to fetch the items
                                                $fetch = $dbs->SelectAllpropertiesNoLimit($startIndex, $itemsPerPage);
                                                // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                                
                                                // Execute the query and fetch the items
                                                // Replace this with your own code to execute the query and fetch the items
                                                // $items = []; // array to store the fetched items
                                                
                                                // Query to get the total number of items
                                                // Replace this with your own query to get the total number of items
                                                // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                                $totalItemsQuery = $dbs->SelectAllApropertiesNoSessNoLimitPagCountAll();
                                                $totalItemsResult =   $totalItemsQuery; // result of executing the query
                                                
                                                // Get the total number of items
                                                $totalItems = $totalItemsResult['id'];
                                                
                                                // Calculate the total number of pages
                                                $totalPages = ceil($totalItems / $itemsPerPage);
                                                
                                            }
                                            
                                            
                                        } else {
                                            if (isset($_POST['searchBtn'])) {
                                                $propertyCategory = $_POST['propertyCategory'];
                                                // $area_location = $_POST['area_location'];
                                                // $city = $_POST['city'];
                                                $state = $_POST['state'];
                                                // $fetch = $dbs->SelectAllApropertiesWhere($user_id, $propertyCategory, $area_location, $city, $state);
                                                $fetch = $dbs->SelectAllApropertiesWhereNoSess($propertyCategory, $state);
                                            } else {
                                                if (isset($_GET['search'])) {
                                                    # code...
                                                    $search = $_GET['search'];
                                                    $fetch = $dbs->SelectAllApropertiesSearch($search);
                                                } else {
                                                       // Number of items per page
                                                $itemsPerPage = 9;
                                                
                                                // Current page number
                                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                
                                                // Calculate the starting index of the items to display
                                                $startIndex = ($page - 1) * $itemsPerPage;
                                                
                                                // Query to fetch the items from the database
                                                // Replace this with your own query to fetch the items
                                                $fetch = $dbs->SelectAllpropertiesNoLimit($startIndex, $itemsPerPage);
                                                // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                                
                                                // Execute the query and fetch the items
                                                // Replace this with your own code to execute the query and fetch the items
                                                // $items = []; // array to store the fetched items
                                                
                                                // Query to get the total number of items
                                                // Replace this with your own query to get the total number of items
                                                // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                                $totalItemsQuery = $dbs->SelectAllApropertiesNoSessNoLimitPagCountAll();
                                                $totalItemsResult =   $totalItemsQuery; // result of executing the query
                                                
                                                // Get the total number of items
                                                $totalItems = $totalItemsResult['id'];
                                                
                                                // Calculate the total number of pages
                                                $totalPages = ceil($totalItems / $itemsPerPage);
                                            
                                                    // $fetch = $dbs->SelectAllpropertiesNoLimit();

                                                }                                                
                                            }
                                        }


                                        if ($fetch):
                                            foreach ($fetch as $info):
                                                ?>
                                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                    <div class="feature-block-one">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img
                                                                        src="featuredGallery/<?= $info['featuredimage'] ?>"
                                                                        alt="">
                                                                </figure>
                                                                <!-- <div class="batch"><i class="icon-11"></i></div>
                                                                <span class="category">
                                                                    <?= $info['propertyCategory'] ?>
                                                                </span> -->
                                                            </div>
                                                            <div class="lower-content">
                                                                <div class="author-info clearfix">
                                                                    <div class="author pull-left">
                                                                        <figure class="author-thumb"><img
                                                                                src="assets/images/footer-logo.png"
                                                                                style="object-fit:cover; background-position: center; width: 60px; height: 40px; border-radius: 50%;"
                                                                                alt="">
                                                                        </figure>
                                                                        <h6 class="text-uppercase">
                                                                            <?= $info['propertytitle'] ?>
                                                                        </h6>
                                                                    </div>
                                                                    <div class="buy-btn pull-right"><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                            <?= '₦' . number_format($info['propertyprice'], 2) ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="title-text">
                                                                    <h6><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                            <?= $info['propertytitle'] ?>
                                                                        </a></h6>
                                                                </div> -->
                                                                <div class="title-text">
                                                                    <h6><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                              <?= $info['city'] ?>,   <?= $info['state'] ?> <?= $info['area_location'] ?>
                                                                        </a></h6>
                                                                </div>
                                                                <div class="price-box clearfix">
                                                                    <div class="price-info pull-left">
                                                                        <!-- <h6>
                                                                            Longtitude:
                                                                            <?= $info['longtitude'] ?>
                                                                        </h6>
                                                                        <h6>
                                                                            Langtitude:
                                                                            <?= $info['langtitude'] ?>
                                                                        </h6> -->
                                                                    </div>
                                                                    <!-- <ul class="other-option pull-right clearfix">
                                                                        <li><a href="property-details?id=<?= $info['id'] ?>"><i
                                                                                    class="icon-12"></i></a></li>
                                                                        <li><a href="property-details?id=<?= $info['id'] ?>"><i
                                                                                    class="icon-13"></i></a></li>
                                                                    </ul> -->
                                                                </div>
                                                                <p>
                                                                    <?= substr($info['detailedinfo'], 0, 77) . ' ...' ?>
                                                                <p>
                                                                <ul class="more-details clearfix">
                                                                    <?php if($info['propertyCategory'] !== 'landsize'):  ?>
                                                                        <li><i class="icon-14"></i><?= $info['bedrooms']  ?> Beds</li>
                                                                        <li><i class="icon-15"></i><?= $info['bathroom']  ?> Baths</li>
                                                                        <li><i class="icon-15"></i><?= $info['toilets']  ?> Toilets</li>
                                                                    <?php else:  ?> 
                                                                        <li><i class="icon-16"></i><?= $info['landsize']  ?> landsize(sq rt)</li>
                                                                    <?php endif;  ?> 
                                                                    <!-- <li><i class="icon-16"></i>600 Prop Size(Sq Ft)</li>
                                                                    <li><i class="icon-16"></i>600 Parking Spaces</li> -->
                                                                </ul>
                                                                <!-- <ul class="more-details clearfix">
                                                                    <li>
                                                                        City:
                                                                        <?= $info['city'] ?>
                                                                    </li>
                                                                    <li>
                                                                        State:
                                                                        <?= $info['state'] ?>
                                                                    </li>
                                                                    <li>
                                                                        Country:
                                                                        <?= $info['area_location'] ?>
                                                                    </li>
                                                                </ul> -->
                                                                <div class="btn-box d-flex justify-content-center align-items-center text-center"><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                                        class="theme-btn btn-two ">See Details</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            endforeach;
                                        else:
                                            ?>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div
                                                            class="lower-content d-flex justify-content-center align-items-center ">
                                                            <div class="btn-box mt-5"><a href="javascript:void()"
                                                                    class="theme-btn btn-two">No Property Found</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrapper">
                                <ul class="pagination clearfix">
                          
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li><a href="?propertyCategory=<?= $propertyCategory  ?>&page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="current"'; ?>><?php echo $i; ?></a></li>
                                    <?php endfor; ?>
                                    
                                    <?php if ($i <= $totalPages ): ?>
                                        <!-- <li><a href="?propertyCategory=<?= $propertyCategory  ?>&page=<?php echo $i; ?>"><i class="fas fa-angle-right"></i></a></li> -->
                                <?php endif; ?>
                                    <!-- <li><a href="property-grid.html">2</a></li>
                                    <li><a href="property-grid.html">3</a></li>
                                    <li><a href="property-grid.html"><i class="fas fa-angle-right"></i></a></li> -->
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- property-page-section end -->


        <!-- subscribe-section -->
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
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>