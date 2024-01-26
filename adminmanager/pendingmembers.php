<?php
include('includes/aunthenticate.php');
$page = "Agents";
$home = "Distress Property Market ";
$apptitle = "Distress Property Market : Admin ";
$todaydate = date("jS F, Y");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
include("includes/pagehead.php");
?>
<!-- This page plugin CSS -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables library -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"> -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php
    include("includes/preloader.php");
    ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        include("includes/topheader.php");
        ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php
        include("includes/leftsidebar.php");
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php
            include("includes/breadcrumb.php");
            ?>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Summery -->
                <!-- ============================================================== -->
                <div class="row">

                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Agents</h4>
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } ?>
                                <div class="">
                                    <div id="errorshow">
                                        <div class="alert " id="error" role="alert">
                                            A simple primary alert—check it out!
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle" id="myDataTable">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0 text-capitalize">full name</th>
                                                    <th class="border-top-0 text-capitalize">user_email</th>
                                                    <th class="border-top-0 text-capitalize">user_role</th>
                                                    <th class="border-top-0 text-capitalize">userphone</th>
                                                    <th class="border-top-0 text-capitalize">aboutuser</th>
                                                    <th class="border-top-0 text-capitalize">usertitle</th>
                                                    <th class="border-top-0 text-capitalize"> Date Registered</th>
                                                    <th class="border-top-0 text-capitalize"> Account Status</th>
                                                    <th class="border-top-0 text-capitalize"> Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['status']) || isset($_GET['agent_id'])) {
                                                    if (isset($_GET['agent_id'])) {
                                                        $agent_id = $_GET['agent_id'];
                                                        $sql8 = "SELECT * FROM real_users WHERE username='$agent_id'  ORDER BY id DESC";
                                                    } else {
                                                        $getsta = $_GET['status'];
                                                        $sql8 = "SELECT * FROM real_users WHERE accountstatus='$getsta'  ORDER BY id DESC";
                                                    }

                                                } else {
                                                    echo "<script>window.location.href = 'dashboard'</script>";
                                                    // header('location:dashboard');
                                                
                                                }
                                                // if (!isset($_GET['status'])) {
                                                //     header("location: dashboard");
                                                // } else {

                                                //     if (isset($_GET['agent_id'])) {
                                                //         $agent_id = $_GET['agent_id'];
                                                //         $sql8 = "SELECT * FROM real_users WHERE username='$agent_id'  ORDER BY id DESC";
                                                //     } else {
                                                //         $getsta = $_GET['status'];
                                                //         $sql8 = "SELECT * FROM real_users WHERE accountstatus='$getsta'  ORDER BY id DESC";
                                                //     }
                                                // }

                                                $result8 = mysqli_query($conn, $sql8);
                                                if (mysqli_num_rows($result8) > 0) {
                                                    $column_num = 1;
                                                    while ($info8 = mysqli_fetch_array($result8)) {
                                                        $user = $info8['user_id'];

                                                        $mid = $info8['user_id'];
                                                        $fullname = $info8['fullname'];
                                                        $agent_id = $info8['username'];
                                                        $user_email = $info8['user_email'];
                                                        $user_role = $info8['user_role'];
                                                        $userphone = $info8['userphone'];
                                                        $aboutuser = $info8['aboutuser'];
                                                        $usertitle = $info8['usertitle'];
                                                        $datereg = $info8['datereg'];
                                                        $accountstatus = $info8['accountstatus'];
                                                        if ($accountstatus == 'pending') {
                                                            $class = 'label-danger';
                                                        } else {
                                                            $class = 'label-success';
                                                        }

                                                        $accountstatus = $info8['accountstatus'];
                                                        if ($accountstatus == 'pending' || $accountstatus == 'Disapproved') {
                                                            $class = 'label-danger';
                                                            $btn = "<button id='$mid' class='btn btn-primary activeBtn'>Approve</button>";
                                                        } else {
                                                            $class = 'label-success';
                                                            $btn = "
                                                            <button id='$mid' class='btn btn-primary deactiveBtn'>Disapprove</button>";
                                                        }



                                                        echo "
                                        <tr>
                                            <td>
                                                <div class='d-flex align-items-center'>
                                                    <div class='m-r-10'><a class='btn btn-circle btn-info text-white'><img src='../assets/images/footer-logo.png' width='70%'></a></div>
                                                    <div class=''>
                                                        <h4 class='m-b-0 font-16'>$fullname</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$user_email</td>
                                            <td>$user_role</td>
                                            <td>$userphone</td>
                                            <td><label class='label label-danger'>$aboutuser</label></td>
                                            <td>$usertitle</td>
                                            <td>
                                            <h5 class='m-b-0'>$datereg</h5>
                                            </td>
                                            <td><label class='label $class'>$accountstatus</label></td>
                                            <td class='btn-group'>
                                            $btn
                                            <a  class='btn btn-success' target='_blank'  href='pendingpost?agent_id=" . $agent_id . "' >View Agent Properties</a>
                                            <a  class='btn btn-primary' target='_blank' href='regdetails?viewagent=" . $agent_id . "'>View Agent Details</a>
                                        </td>
											
                                        </tr>";
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php
            include("includes/footer.php");
            ?> <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php
    include("includes/pagescript.php");
    ?>

    <!--This page plugins -->
    <!-- <script src="assets/extra-libs/DataTables/datatables.min.js"></script> -->
    <!-- start - This is for export functionality only -->
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-advanced.init.js"></script> -->
    
    <script>
        let table = new DataTable('#myDataTable');

        $('#errorshow').hide()
        $('body').on('click', '.activeBtn', function (e) {
            e.preventDefault();
            activeBtn = $(this).attr('id');
            // console.log(activeBtn);
            $.ajax({
                type: "POST",
                url: "includes/action.php",
                data: { activeBtn: activeBtn },
                success: function (response) {
                    console.log(response)
                    if (response == 'success') {
                        $('#errorshow').show()
                        $('#error').html('Activated Succesfully');
                        $('#error').addClass('alert-success');
                    } else {
                        $('#errorshow').show()
                        $('#error').html('Something Went wrong try again later');
                        $('#error').addClass('alert-danger');
                    }

                }
            });
        });
        $('body').on('click', '.deactiveBtn', function (e) {
            e.preventDefault();
            deactiveBtnMem = $(this).attr('id');
            // console.log(deactiveBtnMem);
            $.ajax({
                type: "POST",
                url: "includes/action.php",
                data: {
                    deactiveBtnMem: deactiveBtnMem
                },
                success: function (response) {
                    // console.log(response)
                    if (response == 'success') {
                        $('#errorshow').show()
                        $('#error').html('Deactivated Succesfully');
                        $('#error').addClass('alert-success');
                    } else {
                        $('#errorshow').show()
                        $('#error').html('Something Went wrong try again later');
                        $('#error').addClass('alert-danger');
                    }

                }
            });
        });

    </script>


</body>

</html>