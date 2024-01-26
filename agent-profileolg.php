<?php
include('controller/session.php');
$page = 'agent-profile';

$reload = '';

// $reload = '';
$errorMessage = '';
if (isset($_POST['changepassword'])) {
    $table = 'real_users';
    $colume = 'user_password';
    $current_password = $dbusers->test_input($_POST['current_password']);
    $new_password = $dbusers->test_input($_POST['new_password']);
    $confirm_new_password = $dbusers->test_input($_POST['confirm_new_password']);
    if ($new_password === $confirm_new_password) {

        if (password_verify($user_password, $current_password)) {
            $hpass = password_hash($new_password, PASSWORD_DEFAULT);
            $updatePic = $dbusers->UpdateData($table, $colume, $hpass, $user_id);
            if ($updatePic) {

            }
        } else {
            $errorMessage = "<p class='text-danger'>Error: *Your Current Is Not Current </p>";
        }
    } else {
        $errorMessage = "<p class='text-danger'>Error: *Password Do Not Match </p>";
    }
}

if (isset($_FILES['profilepic'])) {
    $table = 'real_users';
    $colume = 'profilepic';
    $folder = 'img/';

    if (isset($_FILES['profilepic']) && ($_FILES['profilepic'] != '')) {
        $newimg = $folder . time() . '_' . $_FILES['profilepic']['name'];
        move_uploaded_file($_FILES['profilepic']['tmp_name'], $newimg);
    } else {
        // $newimg = $oldimg;
    }
    $updatePic = $dbusers->UpdateData($table, $colume, $newimg, $user_id);
    if ($updatePic) {

    }
}

if (isset($_POST['saveProfile'])) {

    $fullname = $dbusers->test_input($_POST['fullname']);
    $usertitle = $dbusers->test_input($_POST['usertitle']);
    $user_email = $dbusers->test_input($_POST['user_email']);
    $userphone = $dbusers->test_input($_POST['userphone']);
    $aboutuser = $dbusers->test_input($_POST['aboutuser']);

    $updateData = $dbusers->UpdateAgentProfile($fullname, $user_email, $usertitle, $userphone, $aboutuser, $user_id);
    if ($updateData) {

    }
}
$display = 'display-none';

$errorMessage = '';
$alertColor = 'danger';
$propertytitle = '';
$propertyprice = '';
$area_location = 'Country';
$address = '';
$city = 'City';
$state = 'State';
$longtitude = '';
$langtitude = '';
$detailedinfo = '';
$propertyCategory = '';
$bedrooms = '';
$bathroom = '';
$toilets = '';
$propsize = '';
$parkingspace = '';
$landsize = '';

$id = '';
$formType = '';
if (isset($_GET['edit'])) {
    # code...
    $id = $_GET['edit'];
    $info = $dbusers->SelectAllApropertiesNoSessWhereNoCat($id);
    $propertytitle = $info['propertytitle'];
    $propertyprice = $info['propertyprice'];
    $area_location = $info['area_location'];
    $address = $info['address'];
    $city = $info['city'];
    $state = $info['state'];
    $longtitude = $info['longtitude'];
    $langtitude = $info['langtitude'];
    $detailedinfo = $info['detailedinfo'];
    $propertyCategory = $info['propertyCategory'];
    $bedrooms = $info['bedrooms'];
    $bathroom = $info['bathroom'];
    $toilets = $info['toilets'];
    $propsize = $info['propsize'];
    $parkingspace = $info['parkingspace'];
    $landsize = $info['landsize'];
}

if (isset($_FILES['featuredimage'])) {
    $propertyid = 'props' . rand(1000, 10000);
    // $user_id = 'user_id' . rand(1000, 10000);
    $propertytitle = $dbusers->test_input($_POST['propertytitle']);
    $propertyprice = $dbusers->test_input($_POST['propertyprice']);
    $area_location = $dbusers->test_input($_POST['area_location']);
    $address = $dbusers->test_input($_POST['address']);
    $city = $dbusers->test_input($_POST['city']);
    $state = $dbusers->test_input($_POST['state']);
    $longtitude = $dbusers->test_input($_POST['longtitude']);
    $langtitude = $dbusers->test_input($_POST['langtitude']);
    $detailedinfo = $dbusers->test_input($_POST['detailedinfo']);
    $propertyCategory = $dbusers->test_input($_POST['propertyCategory']);
    $formType = $dbusers->test_input($_POST['formType']);
    $bedrooms = $dbusers->test_input($_POST['bedrooms']);
    $bathroom = $dbusers->test_input($_POST['bathroom']);
    $toilets = $dbusers->test_input($_POST['toilets']);
    $propsize = $dbusers->test_input($_POST['propsize']);
    $parkingspace = $dbusers->test_input($_POST['parkingspace']);
    $landsize = $dbusers->test_input($_POST['landsize']);
    $featuredimage = $_FILES['featuredimage']['name'];
    $galleryimage = $_FILES['galleryimage']['name'];
    $galleryimageid = 'img' . rand(1000, 10000);
    $status = 'pending';
    $id = $dbusers->test_input($_POST['id']);


    if (!empty($propertyCategory && $propertyid && $propertytitle && $propertyprice && $area_location && $address && $city && $state && $longtitude && $langtitude && $detailedinfo && $status)) {
        if ($formType == 'edit') {
            $sql = $dbusers->EditProps($user_id, $propertyid, $propertytitle, $propertyprice, $area_location, $address, $city, $state, $longtitude, $langtitude, $detailedinfo, $featuredimage, $galleryimageid, $status, $propertyCategory, $id, $bedrooms, $bathroom, $toilets, $propsize, $parkingspace, $landsize);
        } else {
            $sql = $dbusers->UploadProps($user_id, $propertyid, $propertytitle, $propertyprice, $area_location, $address, $city, $state, $longtitude, $langtitude, $detailedinfo, $featuredimage, $galleryimageid, $status, $propertyCategory, $bedrooms, $bathroom, $toilets, $propsize, $parkingspace, $landsize);
        }

        if ($sql) {
            $totalFiles = count($_FILES["galleryimage"]["name"]);
            if ($totalFiles > 6) {
                $display = '';

                $errorMessage = "cannot upload more than 6 files.<br>";
            } else {

                $targetDirectory = "featuredGallery/";
                $targetFile = $targetDirectory . basename($_FILES["featuredimage"]["name"]);
                if (move_uploaded_file($_FILES["featuredimage"]["tmp_name"], $targetFile)) {
                    $display = '';

                    $errorMessage = "File uploaded successfully.";
                } else {
                    $display = '';

                    $errorMessage = "File upload failed.";
                }

                $targetDirectory = 'galleryImage/';

                // Iterate through the uploaded files
                for ($i = 0; $i < count($_FILES['galleryimage']['name']); $i++) {
                    $filename = $_FILES['galleryimage']['name'][$i];
                    $tempFilePath = $_FILES['galleryimage']['tmp_name'][$i];
                    $targetFilePath = $targetDirectory . $filename;

                    // Move the temporary file to the target directory
                    $sql = $dbusers->multiImage($galleryimageid, $filename);
                    if (move_uploaded_file($tempFilePath, $targetFilePath) && $sql) {
                        $display = '';
                        $alertColor = 'success';
                        if ($formType == 'edit') {
                            $errorMessage = "Edited successfully.<br>";
                            header("location: agent-profile");
                        } else {

                            $errorMessage = "Uploaded successfully.<br>";
                        }
                        // $errorMessage = "File $filename uploaded successfully.<br>";
                    } else {
                        $display = '';

                        $errorMessage = "Error uploading file $filename.<br>";
                    }
                }
            }

        } else {
            $display = '';

            $errorMessage = "Error Submit Form.<br>";
        }


    } else {
        $display = '';

        $errorMessage = 'Form Not Completely Filled';
    }



}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Distress Property Market - Agent Profiles</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

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
    <link rel="stylesheet" href="./assets/dropify-master/dropify-master/dist/css/dropify.min.css">

    <style>
        .active {
            background-color: #2C7365 !important;
        }
    </style>

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <!-- preloader end -->


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
                    <h1>My Account</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->



        <!-- agent-details -->
        <!-- <section class="agent-details">
            <div class="auto-container">
                <div class="agency-details-content">
                    <div class="agents-block-one">
                        <div class="inner-box mr-0">
                            <figure class="image-box"> <?php if (!$profilepic): ?>
                                    <img src="assets/images/resource/agency-details-1.jpg" alt="avatar" class="rounded">
                                <?php else: ?>
                                    <img src="<?= $profilepic ?>" alt="avatar" class="rounded">
                                <?php endif; ?>
                            </figure>
                            <div class="content-box">
                                <div class="upper clearfix">
                                    <div class="title-inner pull-left">
                                        <h4 class="text-white">Realhome Estate</h4>
                                        <span class="designation text-white">Modern House Real Estate Agent</span>
                                    </div>
                                    <ul class="social-list pull-right clearfix">
                                        <li><a href="agency-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="agency-details.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="agency-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <div class="text ">
                                    <p class=""> <?= $aboutuser ?> </p>
                                </div>
                                <ul class="info clearfix mr-0">
                                    <li><i class="fab fa fa-envelope "></i><a href="mailto:info@realhome.com" class="text-white"><?= $user_email ?></a></li>
                                    <li><i class="fab fa fa-phone"></i><a href="tel:03030571965" class="text-white"><?= $userphone ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- agent-details end -->

        <section class="mt-5">
            <div class="auto-container mb-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card p-5 shadow border-radius-4">
                            <div class="user-profile">
                                <div class="header clearflix">
                                    <div class="card text-white" style="width: 300px;">
                                        <?php if (!$profilepic): ?>
                                            <img src="assets/images/clients/clients-2.png" class="card-img-top" alt="...">
                                        <?php else: ?>
                                            <img src="<?= $profilepic ?>" class="card-img-top" alt="...">
                                        <?php endif; ?>

                                    </div>

                                </div>
                                <div class="detail clearfix mt-3">
                                    <div class="list-group">
                                        <a href="agent-profile" class="list-group-item list-group-item-action active">
                                            <i class="fa fa-person"></i>Profile
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action" id="show1">
                                            <i class="flaticon-house"></i>My Properties
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action" id="show2">
                                            <i class="flaticon-add"></i>Submit New Property
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#changeprofilepic"
                                            class="list-group-item list-group-item-action">
                                            <i class="flaticon-locked-padlock"></i>Change Profile Pic
                                        </a>
                                        <a href="change-password.html" data-toggle="modal" data-target="#changepassword"
                                            class="list-group-item list-group-item-action">
                                            <i class="flaticon-locked-padlock"></i>Change Password
                                        </a>
                                        <a href="logout" class="list-group-item list-group-item-action">
                                            <i class="flaticon-logout"></i>Log Out
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12  ">
                        <div class="card p-5 shadow radius-5" id="tab1">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Full name</label>
                                            <input type="text" name="fullname" value="<?= $fullname ?>"
                                                class="form-control" placeholder="Fullname">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Your Title</label>
                                            <input type="text" name="usertitle" value="<?= $usertitle ?>"
                                                class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" name="userphone" value="<?= $userphone ?>"
                                                class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email </label>
                                            <input type="text" name="user_email" value="<?= $user_email ?>"
                                                class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Your Bio</label>
                                            <textarea name="aboutuser" class="form-control" id="" cols="30"
                                                rows="10"> <?= $aboutuser ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="theme-btn btn-one" name="saveProfile" type="submit">Save
                                            Change</button>
                                    </div>



                                </div>
                            </form>
                        </div>
                        <div class="card p-5 shadow radius-5" id="tab2">
                            <div class="alert alert-<?php echo $alertColor;
                            echo $display; ?> " role="alert">
                                <?= $errorMessage ?>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="general-information">
                                    <h4><i class="icon-42"></i>General Information:</h4>
                                    <div class="inner-box default-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property Title</label>
                                                    <?php if (isset($_GET['edit']) && !empty($_GET['edit'])) {
                                                        $formType = 'edit';
                                                        $id = $_GET['edit'];
                                                    } ?>
                                                    <input type="hidden" name="formType" value="<?= $formType ?>">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <input type="text" name="propertytitle"
                                                        value="<?= $propertytitle ?>" placeholder="Property Title">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <label>Property Category</label>
                                                <div class="field-input">
                                                    <select class="form-control" name="propertyCategory" id="trigShow">
                                                        <option value="<?= $propertyCategory ?>">
                                                            <?= $propertyCategory ?>
                                                        </option>
                                                        <option value="Distress Properties">Distress Properties
                                                        </option>
                                                        <!-- <option value="Non Distress Properties">Non-Distress
                                                            Properties
                                                        </option> -->
                                                        <option value="Autos/Machinery">Autos&Machinery</option>
                                                        <option value="Land">Landed Properties</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Property Price</label>
                                                    <input type="number" name="propertyprice"
                                                        value="<?= $propertyprice ?>" placeholder="Property Price">

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Detailed Information</label>
                                                    <div class="field-input">
                                                        <textarea placeholder="Detailed Info"
                                                            name="detailedinfo"><?= $detailedinfo ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Address</label>
                                                    <input type="text" name="address" placeholder="Address"
                                                        value="<?= $address ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Longitude</label>
                                                    <input type="text" name="longtitude" placeholder="-205.421560"
                                                        value="<?= $longtitude ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Latitude</label>
                                                    <input type="text" name="langtitude" placeholder="32.963381"
                                                        value="<?= $langtitude ?>">
                                                </div>
                                            </div>




                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>City</label>
                                                    <div class="select-box">


                                                        <?php
                                                        // Abia State
                                                        $city_names = array(
                                                            "Aba",
                                                            "Amaigbo",
                                                            "Arochukwu",
                                                            "Bende",
                                                            "Ohafia-Ifigh",
                                                            "Umuahia",
                                                            "Ganye",
                                                            "Gombi",
                                                            "Holma",
                                                            "Jimeta",
                                                            "Madagali",
                                                            "Mayo-Belwa",
                                                            "Mubi",
                                                            "Ngurore",
                                                            "Numan",
                                                            "Toungo",
                                                            "Yola",
                                                            "Eket",
                                                            "Esuk Oron",
                                                            "Ikot Ekpene",
                                                            "Itu",
                                                            "Uyo",
                                                            "Agulu",
                                                            "Atani",
                                                            "Awka",
                                                            "Enugu-Ukwu",
                                                            "Igbo-Ukwu",
                                                            "Ihiala",
                                                            "Nkpor",
                                                            "Nnewi",
                                                            "Onitsha",
                                                            "Ozubulu",
                                                            "Uga",
                                                            "Uruobo-Okija",
                                                            "Azare",
                                                            "Bauchi",
                                                            "Boi",
                                                            "Bununu",
                                                            "Darazo",
                                                            "Dass",
                                                            "Dindima",
                                                            "Disina",
                                                            "Gabarin",
                                                            "Gwaram",
                                                            "Kari",
                                                            "Lame",
                                                            "Lere",
                                                            "Madara",
                                                            "Misau",
                                                            "Sade",
                                                            "Yamrat",
                                                            "Yanda Bayo",
                                                            "Yuli",
                                                            "Zadawa",
                                                            "Zalanga",
                                                            "Amassoma",
                                                            "Twon-Brass",
                                                            "Yenagoa",
                                                            "Aliade",
                                                            "Boju",
                                                            "Igbor",
                                                            "Makurdi",
                                                            "Ochobo",
                                                            "Otukpa",
                                                            "Takum",
                                                            "Ugbokpo",
                                                            "Yandev",
                                                            "Zaki Biam",
                                                            "Bama",
                                                            "Benisheikh",
                                                            "Biu",
                                                            "Bornu Yassu",
                                                            "Damasak",
                                                            "Damboa",
                                                            "Dikwa",
                                                            "Gamboru",
                                                            "Gwoza",
                                                            "Kukawa",
                                                            "Magumeri",
                                                            "Maiduguri",
                                                            "Marte",
                                                            "Miringa",
                                                            "Monguno",
                                                            "Ngala",
                                                            "Shaffa",
                                                            "Shani",
                                                            "Tokombere",
                                                            "Uba",
                                                            "Wuyo",
                                                            "Yajiwa",
                                                            "Akankpa",
                                                            "Calabar",
                                                            "Gakem",
                                                            "Ikang",
                                                            "Ugep",
                                                            "Abraka",
                                                            "Agbor",
                                                            "Asaba",
                                                            "Bomadi",
                                                            "Burutu",
                                                            "Kwale",
                                                            "Obiaruku",
                                                            "Ogwashi-Uku",
                                                            "Orerokpe",
                                                            "Patani",
                                                            "Sapele",
                                                            "Ughelli",
                                                            "Umunede",
                                                            "Warri",
                                                            "Abakaliki",
                                                            "Afikpo",
                                                            "Effium",
                                                            "Ezza-Ohu",
                                                            "Isieke",
                                                            "Agenebode",
                                                            "Auchi",
                                                            "Benin City",
                                                            "Ekpoma",
                                                            "Igarra",
                                                            "Illushi",
                                                            "Siluko",
                                                            "Ubiaja",
                                                            "Uromi",
                                                            "Ado-Ekiti",
                                                            "Aramoko-Ekiti",
                                                            "Efon-Alaaye",
                                                            "Emure-Ekiti",
                                                            "Ifaki",
                                                            "Igbara-Odo",
                                                            "Igede-Ekiti",
                                                            "Ijero-Ekiti",
                                                            "Ikere-Ekiti",
                                                            "Ipoti",
                                                            "Ise-Ekiti",
                                                            "Oke Ila",
                                                            "Omuo-Ekiti",
                                                            "Adani",
                                                            "Ake-Eze",
                                                            "Aku",
                                                            "Amagunze",
                                                            "Awgu",
                                                            "Eha Amufu",
                                                            "Enugu",
                                                            "Enugu-Ezike",
                                                            "Ete",
                                                            "Ikem",
                                                            "Mberubu",
                                                            "Nsukka",
                                                            "Obolo-Eke (1)",
                                                            "Opi",
                                                            "Udi",
                                                            "Abuja",
                                                            "Kuje",
                                                            "Kwali",
                                                            "Madala",
                                                            "Akko",
                                                            "Bara",
                                                            "Billiri",
                                                            "Dadiya",
                                                            "Deba",
                                                            "Dukku",
                                                            "Garko",
                                                            "Gombe",
                                                            "Hinna",
                                                            "Kafarati",
                                                            "Kaltungo",
                                                            "Kumo",
                                                            "Nafada",
                                                            "Pindiga",
                                                            "Iho",
                                                            "Oguta",
                                                            "Okigwe",
                                                            "Orlu",
                                                            "Orodo",
                                                            "Owerri",
                                                            "Babura",
                                                            "Birnin Kudu",
                                                            "Birniwa",
                                                            "Dutse",
                                                            "Gagarawa",
                                                            "Gumel",
                                                            "Gwaram",
                                                            "Hadejia",
                                                            "Kafin Hausa",
                                                            "Kazaure",
                                                            "Kiyawa",
                                                            "Mallammaduri",
                                                            "Ringim",
                                                            "Samamiya",
                                                            "Anchau",
                                                            "Burumburum",
                                                            "Dutsen Wai",
                                                            "Hunkuyi",
                                                            "Kachia",
                                                            "Kaduna",
                                                            "Kafanchan",
                                                            "Kagoro",
                                                            "Kajuru",
                                                            "Kujama",
                                                            "Lere",
                                                            "Mando",
                                                            "Saminaka",
                                                            "Soba",
                                                            "Sofo-Birnin-Gwari",
                                                            "Zaria",
                                                            "Dan Gora",
                                                            "Gaya",
                                                            "Kano",
                                                            "Danja",
                                                            "Dankama",
                                                            "Daura",
                                                            "Dutsin-Ma",
                                                            "Funtua",
                                                            "Gora",
                                                            "Jibia",
                                                            "Jikamshi",
                                                            "Kankara",
                                                            "Katsina",
                                                            "Mashi",
                                                            "Ruma",
                                                            "Runka",
                                                            "Wagini",
                                                            "Argungu",
                                                            "Bagudo",
                                                            "Bena",
                                                            "Bin Yauri",
                                                            "Birnin Kebbi",
                                                            "Dabai",
                                                            "Dakingari",
                                                            "Gulma",
                                                            "Gwandu",
                                                            "Jega",
                                                            "Kamba",
                                                            "Kangiwa",
                                                            "Kende",
                                                            "Mahuta",
                                                            "Maiyama",
                                                            "Shanga",
                                                            "Wasagu",
                                                            "Zuru",
                                                            "Abocho",
                                                            "Adoru",
                                                            "Ankpa",
                                                            "Bugana",
                                                            "Dekina",
                                                            "Egbe",
                                                            "Icheu",
                                                            "Idah",
                                                            "Isanlu-Itedoijowa",
                                                            "Kabba",
                                                            "Koton-Karfe",
                                                            "Lokoja",
                                                            "Ogaminana",
                                                            "Ogurugu",
                                                            "Okene",
                                                            "Ajasse Ipo",
                                                            "Bode Saadu",
                                                            "Gwasero",
                                                            "Ilorin",
                                                            "Jebba",
                                                            "Kaiama",
                                                            "Lafiagi",
                                                            "Offa",
                                                            "Okuta",
                                                            "Omu-Aran",
                                                            "Patigi",
                                                            "Suya",
                                                            "Yashikera",
                                                            "Apapa",
                                                            "Badagry",
                                                            "Ebute Ikorodu",
                                                            "Ejirin",
                                                            "Epe",
                                                            "Ikeja",
                                                            "Lagos",
                                                            "Makoko",
                                                            "Buga",
                                                            "Doma",
                                                            "Keffi",
                                                            "Lafia",
                                                            "Nasarawa",
                                                            "Wamba",
                                                            "Auna",
                                                            "Babana",
                                                            "Badeggi",
                                                            "Baro",
                                                            "Bokani",
                                                            "Duku",
                                                            "Ibeto",
                                                            "Konkwesso",
                                                            "Kontagora",
                                                            "Kusheriki",
                                                            "Kuta",
                                                            "Lapai",
                                                            "Minna",
                                                            "New Shagunnu",
                                                            "Suleja",
                                                            "Tegina",
                                                            "Ukata",
                                                            "Wawa",
                                                            "Zungeru",
                                                            "Abeokuta",
                                                            "Ado Odo",
                                                            "Idi Iroko",
                                                            "Ifo",
                                                            "Ijebu-Ife",
                                                            "Ijebu-Igbo",
                                                            "Ijebu-Ode",
                                                            "Ilaro",
                                                            "Imeko",
                                                            "Iperu",
                                                            "Isara",
                                                            "Owode",
                                                            "Agbabu",
                                                            "Akure",
                                                            "Idanre",
                                                            "Ifon",
                                                            "Ilare",
                                                            "Ode",
                                                            "Ondo",
                                                            "Ore",
                                                            "Owo",
                                                            "Apomu",
                                                            "Ejigbo",
                                                            "Gbongan",
                                                            "Ijebu-Jesa",
                                                            "Ikire",
                                                            "Ikirun",
                                                            "Ila Orangun",
                                                            "Ile-Ife",
                                                            "Ilesa",
                                                            "Ilobu",
                                                            "Inisa",
                                                            "Iwo",
                                                            "Modakeke",
                                                            "Oke Mesi",
                                                            "Olupona",
                                                            "Osogbo",
                                                            "Otan Ayegbaju",
                                                            "Oyan",
                                                            "Ago Are",
                                                            "Alapa",
                                                            "Fiditi",
                                                            "Ibadan",
                                                            "Igbeti",
                                                            "Igbo-Ora",
                                                            "Igboho",
                                                            "Kisi",
                                                            "Lalupon",
                                                            "Ogbomoso",
                                                            "Okeho",
                                                            "Orita Eruwa",
                                                            "Oyo",
                                                            "Saki",
                                                            "Amper",
                                                            "Bukuru",
                                                            "Dengi",
                                                            "Jos",
                                                            "Kwolla",
                                                            "Langtang",
                                                            "Pankshin",
                                                            "Panyam",
                                                            "Vom",
                                                            "Yelwa",
                                                            "Binji",
                                                            "Dange",
                                                            "Gandi",
                                                            "Goronyo",
                                                            "Gwadabawa",
                                                            "Illela",
                                                            "Rabah",
                                                            "Sokoto",
                                                            "Tambuwal",
                                                            "Wurno",
                                                            "Baissa",
                                                            "Beli",
                                                            "Gassol",
                                                            "Gembu",
                                                            "Ibi",
                                                            "Jalingo",
                                                            "Lau",
                                                            "Mutum Biyu",
                                                            "Riti",
                                                            "Wukari",
                                                            "Damaturu",
                                                            "Dankalwa",
                                                            "Dapchi",
                                                            "Daura",
                                                            "Fika",
                                                            "Gashua",
                                                            "Geidam",
                                                            "Goniri",
                                                            "Gorgoram",
                                                            "Gujba",
                                                            "Gwio Kura",
                                                            "Kumagunnam",
                                                            "Lajere",
                                                            "Machina",
                                                            "Nguru",
                                                            "Potiskum",
                                                            "Anka",
                                                            "Dan Sadau",
                                                            "Gummi",
                                                            "Gusau",
                                                            "Kaura Namoda",
                                                            "Kwatarkwashi",
                                                            "Maru",
                                                            "Moriki",
                                                            "Sauri",
                                                            "Tsafe"
                                                        );
                                                        ?>


                                                        <select class="form-control" name="city">
                                                            <option value="<?= $city ?>" selected>
                                                                <?= $city ?>
                                                            </option>
                                                            <?php
                                                            foreach ($city_names as $select) {
                                                                echo ' <option value="' . $select . '">' . $select . '</option>';
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>State</label>
                                                    <div class="select-box">
                                                        <select class="form-control" name="state">
                                                            <!-- <option data-display="State">State</option> -->
                                                            <option value="<?= $state ?>" selected>
                                                                <?= $state ?>
                                                            </option>
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
                                            <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                <div class="field-input">
                                                    <label>Country</label>
                                                    <div class="select-box">
                                                        <select class="form-control form-control" name="area_location">
                                                            <option value="<?= $area_location ?>" selected>
                                                                <?= $area_location ?>
                                                            </option>

                                                            <!-- <option data-display="Country">Country</option> -->
                                                            <!-- Country names and Country Name -->
                                                            <option value="Nigeria">Nigeria</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column show1">
                                                <div class="field-input">
                                                    <label>Land Size</label>
                                                    <input type="number" name="landsize" placeholder="landsize"
                                                        value="<?= $landsize ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column show">
                                                <div class="field-input">
                                                    <label>Bedrooms</label>
                                                    <input type="number" name="bedrooms" placeholder="bedrooms"
                                                        value="<?= $bedrooms ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column show">
                                                <div class="field-input">
                                                    <label>Bathroom</label>
                                                    <input type="number" name="bathroom" placeholder="bathroom"
                                                        value="<?= $bathroom ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 column show">
                                                <div class="field-input">
                                                    <label>Toilets</label>
                                                    <input type="number" name="toilets" placeholder="toilets"
                                                        value="<?= $toilets ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 column show">
                                                <div class="field-input">
                                                    <label>Property Size</label>
                                                    <input type="number" name="propsize" placeholder="propsize"
                                                        value="<?= $propsize ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column show">
                                                <div class="field-input">
                                                    <label>Parking Space</label>
                                                    <input type="number" name="parkingspace" placeholder="parkingspace"
                                                        value="<?= $parkingspace ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="gallery-box">
                                                    <h4><i class="icon-16"></i>Featured Images:</h4>
                                                    <div class="upload-inner centred">
                                                        <input type="file" class="dropify" name="featuredimage"
                                                            required>
                                                    </div>
                                                    <h4><i class="icon-16"></i>Gallery Image:</h4>
                                                    <div class="upload-inner centred">

                                                        <input type="file" class="dropify" data-max-file="6"
                                                            name="galleryimage[]" multiple required>
                                                    </div>
                                                    <!-- <a href="profile.html" class="theme-btn btn-one">Add Images</a> -->
                                                </div>
                                            </div>

                                            <button class="theme-btn btn-one m-3" name="uploadProps">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card p-5 shadow radius-5" id="tab3">
                            <div class="row ">
                                <?php

                                if (!isset($_SESSION['useremail'])) {
                                    $fetch = $dbusers->SelectAllApropertiesNoSessNoLimit($propertyCategory);

                                } else {

                                    $fetch = $dbusers->SelectAllApropertiesNoCat($user_id);

                                }


                                if ($fetch):
                                    foreach ($fetch as $inf):
                                        ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                            <div class="feature-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img
                                                                src="featuredGallery/<?= $inf['featuredimage'] ?>" alt="">
                                                        </figure>
                                                        <!-- <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">
                                                                <?= $inf['propertyCategory'] ?>
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
                                                                    <?= $inf['propertytitle'] ?>
                                                                </h6>
                                                            </div>
                                                            <div class="buy-btn pull-right"><a
                                                                    href="property-details?propertyCategory=<?= $inf['propertyCategory'] ?>&id=<?= $inf['id'] ?>">
                                                                    <?= '₦' . number_format($inf['propertyprice'], 2) ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="title-text">
                                                                <h6><a href="property-details?propertyCategory=<?= $inf['propertyCategory'] ?>&id=<?= $inf['id'] ?>">
                                                                        <?= $inf['propertytitle'] ?>
                                                                    </a></h6>
                                                            </div> -->
                                                        <div class="title-text">
                                                            <h6><a
                                                                    href="property-details?propertyCategory=<?= $inf['propertyCategory'] ?>&id=<?= $inf['id'] ?>">
                                                                    <?= $inf['city'] ?>,
                                                                    <?= $inf['state'] ?>
                                                                    <?= $inf['area_location'] ?>
                                                                </a></h6>
                                                        </div>
                                                        <div class="price-box clearfix">
                                                            <div class="price-info pull-left">
                                                                <!-- <h6>
                                                                        Longtitude:
                                                                        <?= $inf['longtitude'] ?>
                                                                    </h6>
                                                                    <h6>
                                                                        Langtitude:
                                                                        <?= $inf['langtitude'] ?>
                                                                    </h6> -->
                                                            </div>
                                                            <!-- <ul class="other-option pull-right clearfix">
                                                                    <li><a href="property-details?id=<?= $inf['id'] ?>"><i
                                                                                class="icon-12"></i></a></li>
                                                                    <li><a href="property-details?id=<?= $inf['id'] ?>"><i
                                                                                class="icon-13"></i></a></li>
                                                                </ul> -->
                                                        </div>
                                                        <p>
                                                            <?= substr($inf['detailedinfo'], 0, 77) . ' ...' ?>
                                                        <p>
                                                            <!-- <ul class="more-details clearfix">
                                                                <li>
                                                                    City:
                                                                    <?= $inf['city'] ?>
                                                                </li>
                                                                <li>
                                                                    State:
                                                                    <?= $inf['state'] ?>
                                                                </li>
                                                                <li>
                                                                    Country:
                                                                    <?= $inf['area_location'] ?>
                                                                </li>
                                                            </ul> -->
                                                        <div
                                                            class="btn-box d-flex justify-content-center align-items-center text-center">
                                                            <a href="property-details?propertyCategory=<?= $inf['propertyCategory'] ?>&id=<?= $inf['id'] ?>"
                                                                class="theme-btn btn-two ">See Details</a>
                                                            <a href="agent-profile?edit=<?= $inf['id'] ?>"
                                                                class="theme-btn btn-two ">Edit Post</a>
                                                            <!-- <a href="agent-profile?del=<?= $inf['id'] ?>"
                                                                class="theme-btn btn-two ">Delete</a> -->
                                                        </div>
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

                </div>
            </div>


        </section>

    </div>


    <!-- subscribe-section -->
    <!-- subscribe-section end -->


    <!-- main-footer -->
    <?php include('include/footer.php'); ?>
    <!-- main-footer end -->



    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>

    <div class="modal property-modal fade p-5" id="changepassword" tabindex="-1" role="dialog"
        aria-labelledby="bioChangeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form action="" method="post">
                        <?= $errorMessage; ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>current password </label>
                                    <input type="password" class="form-control" name="current_password" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>New password </label>
                                    <input type="password" class="form-control" name="new_password" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Confirm password </label>
                                    <input type="password" class="form-control" name="confirm_new_password" required="">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-5">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="changepassword" class="theme-btn btn-one">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal property-modal fade p-5" id="changeprofilepic" tabindex="-1" role="dialog"
        aria-labelledby="bioChangeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="profilepic" required="">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-5">
                                <div class="d-flex justify-content-center">
                                    <button name="changPic" class="theme-btn btn-one">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <script src="assets/sweetalert/sweet.js"></script>
    <script src="./assets/dropify-master/dropify-master/dist/js/dropify.min.js"></script>
    <script src="./assets/dropify-master/dropify-master/dist/js/customDropify.js"></script>
    <script>
        $("#tab2").hide()
        $("#tab3").hide()
        $("#show1").click(function (e) {
            e.preventDefault();
            $("#tab3").show()
            $("#tab1").hide()
            $("#tab2").hide()
        });
        <?php
        if (isset($_GET['edit']) && !empty($_GET['edit'])):
            ?>
            $("#tab2").show()
            $("#tab1").hide()
            $("#tab3").hide()
            <?php
        endif;
        ?>


        $("#show2").click(function (e) {
            e.preventDefault();
            $("#tab2").show()
            $("#tab1").hide()
            $("#tab3").hide()

        });
        $(".show").hide()
        $(".show1").hide()

        $('#trigShow').change(function (e) {
            e.preventDefault();
            trigVal = $(this).val()
            if (trigVal == 'Land') {
                $(".show1").show()
                $(".show").hide()
            } else if (trigVal == 'Autos/Machinery') {
                $(".show").hide()
                $(".show1").hide()

            } else {
                $(".show1").hide()
                $(".show").show()
            }
        });
    </script>
    <?= $reload ?>
</body><!-- End of .page_wrapper -->

</html>