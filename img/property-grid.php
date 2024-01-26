<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$user_role = '';

$dbs = new Dbc();
$page = 'property-grid';
if (!$_GET['propertyCategory']) {
    header("location: index");
}
$propertyCategory = $_GET['propertyCategory'];
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

    <title>Distress Property Market - Properties</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

  <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCP4-o7KxqBfbWE5VX5Qw5a_M8P-mGUU&callback=initMap&sensor=false"></script>
 
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


 
 <section class="location-section">
            <div class="map-column">
          
            
                                 <div id="googleMap" style="width: 100%; height: 600px;"></div>

    <script type="text/javascript">
    var locationArray = [
    <?php
    include("include/opendb.php");
    if (isset($_POST['searchBtn'])) {

        $state = $_POST['state'];
        $column_num = 1;
        $sql2 = "SELECT * FROM properties WHERE state='$state'";
    } else {

        $column_num = 1;
        $sql2 = "SELECT * FROM properties WHERE state='Lagos'";
    }
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($info2 = mysqli_fetch_array($result2)) {
            $latitude = $info2['langtitude'];
            $longitude = $info2['longtitude'];
            $city = $info2['city'];

            // echo"[$city, $latitude, $longitude, $column_num],";
    
            echo "['$city', $latitude, $longitude, $column_num],";
            $column_num = $column_num + 1;
        }
    }
    ?>        
        
      
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 8,
      center: new google.maps.LatLng(6.524379, 3.379206),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locationArray.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locationArray[i][1], locationArray[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locationArray[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    </script>
                                
                           
        </div>
        </section>
        
         <!-- search-field-section -->
        <section class="search-field-section style-two">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="search-field">
                        <div class="tabs-box">
                            <div class="tabs-content info-group">
                               
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="" method="post" class="search-form">
                                                <div class="row clearfix">
                                                    <div class="col-lg-5 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                           
                                                            <div class="field-input">
                                                                
                                                               <select class="form-control" name="propertyCategory" required>
                                                                    <option data-display="Property Type">Property Type</option>
                                                                    <option value="Land">Landed Properties</option>
                                                        <option value="Autos/Machinery">Autos/Machinery</option>
                                                        <li><a href="property-grid?propertyCategory=Distress
                                                            Properties"
                                                class="text-capitalize ">Distress
                                                            Properties</a></li>
                                                        <option value="Non Distress
                                                            Properties">Non-Distress Properties
                                                        </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="col-lg-5 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            
                                                            <div class="select-box">
                                                                <select class="form-control" name="state" required>
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
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="col-lg-2 col-md-6 col-sm-12 column">
                                                     
<input type="hidden" value="Nigeria" name="area_location">
                                               


                                                     
                                            <button type="Submit" name="searchBtn" class="theme-btn btn-one">Search</button>
                                       
                                                     </div>
                                                </div>
                                         
                                            </form>
                                        </div>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- search-field-section end -->
        
       


        <!-- property-page-section -->
        <section class="property-page-section property-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            
                            
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
                                                $totalItemsResult = $totalItemsQuery; // result of executing the query
                                        
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
                                                $fetch = $dbs->SelectAllApropertiesNoSessNoLimitPag($propertyCategory, $itemsPerPage, $startIndex);
                                                // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                        
                                                // Execute the query and fetch the items
                                                // Replace this with your own code to execute the query and fetch the items
                                                // $items = []; // array to store the fetched items
                                        
                                                // Query to get the total number of items
                                                // Replace this with your own query to get the total number of items
                                                // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                                $totalItemsQuery = $dbs->SelectAllApropertiesNoSessNoLimitPagCount($propertyCategory);
                                                $totalItemsResult = $totalItemsQuery; // result of executing the query
                                        
                                                // Get the total number of items
                                                $totalItems = $totalItemsResult['id'];

                                                // Calculate the total number of pages
                                                $totalPages = ceil($totalItems / $itemsPerPage);

                                            }
                                        } else {
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
                                                $totalItemsResult = $totalItemsQuery; // result of executing the query
                                        
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
                                                $fetch = $dbs->SelectAllApropertiesNoSessNoLimitPag($propertyCategory, $itemsPerPage, $startIndex);
                                                // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                        
                                                // Execute the query and fetch the items
                                                // Replace this with your own code to execute the query and fetch the items
                                                // $items = []; // array to store the fetched items
                                        
                                                // Query to get the total number of items
                                                // Replace this with your own query to get the total number of items
                                                // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                                $totalItemsQuery = $dbs->SelectAllApropertiesNoSessNoLimitPagCount($propertyCategory);
                                                $totalItemsResult = $totalItemsQuery; // result of executing the query
                                        
                                                // Get the total number of items
                                                $totalItems = $totalItemsResult['id'];

                                                // Calculate the total number of pages
                                                $totalPages = ceil($totalItems / $itemsPerPage);




                                            }
                                        }


                                        if ($fetch):
                                            foreach ($fetch as $info):
                                                ?>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 feature-block">
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
                                                                                      <?= $info['city'] ?>,   <?= $info['state'] ?>         <?= $info['area_location'] ?>
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
                                        <li><a href="?propertyCategory=<?= $propertyCategory ?>&page=<?php echo $i; ?>" <?php if ($i == $page)
                                                  echo 'class="current"'; ?>><?php echo $i; ?></a></li>
                                    <?php endfor; ?>
                                    
                                    <?php if ($i <= $totalPages): ?>
                                            <!-- <li><a href="?propertyCategory=<?= $propertyCategory ?>&page=<?php echo $i; ?>"><i class="fas fa-angle-right"></i></a></li> -->
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
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/jquery.paroller.min.js"></script>
    <script src="assets/js/nav-tool.js"></script>

    
    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>