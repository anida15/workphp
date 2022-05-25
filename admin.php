<?php
session_start();
if(!isset($_SESSION['isvalid']) || $_SESSION['isvalid']==false){
    header("Location: voterlogin.php");
}
define("SERVER","localhost");
define("USER","rootmaseno");
define("PASSW","maseno123");
define("DB","IEBC");

$connection = mysqli_connect(SERVER,USER,PASSW,DB);
 
 
$query = mysqli_query($connection,"SELECT * FROM user");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
    img {
        width: 100px;
    }

    table,
    tr,
    th,
    td {
        border: 1px solid black;
        border-spacing: 0px;
        border-width: 1px;
    }
    </style>
     </style>
     <style>
    .jab {

        color: green;
        font-family: serif;
        font-style: italic;


        height: 24px;
        text-align: center;


    }
    .alert{
        position: relative;
        top:40px;
    }
    </style>

</style>


<script>
const mttime = setTimeout(Mygreeting, 500);
const time = new Date().getHours();
let greeting;
if (time < 12) {
    greeting = "Good Morning"

} else if (time < 18) {
    greeting = "Good Afternoon";

} else {
    greeting = "Good Evening";
}

function Mygreeting() {

    <?php if(isset($_SESSION['successSignin'])){
                                          ?>

    document.getElementById("demo").innerHTML = greeting + " <?php echo($_SESSION['successSignin']); ?>";

    <?php unset($_SESSION['successSignin']); } ?>


    const mttime = setTimeout(Mygreeting, 3000);

    function Mygreeting() {
        
        <?php if(isset($_SESSION['successSign'])){
                                          ?>

    document.getElementById("demo").innerHTML = "<?php echo($_SESSION['successSign']); ?>";

    <?php unset($_SESSION['successSign']); } ?>
        
        const mttime = setTimeout(Mygreeting, 4000);

    function Mygreeting() {
        document.getElementById("demo").innerHTML = "";
        
    }
    }
}
</script>

<script>
const mttimee = setTimeout(Mygreetings, 500);
 
function Mygreetings() {

    <?php if(isset($_SESSION['updatesuccess'])){
                                          ?>

    document.getElementById("update").innerHTML ="<?php echo($_SESSION['updatesuccess']); ?>";

    <?php unset($_SESSION['updatesuccess']); } ?>


    const mttimee = setTimeout(Mygreetings, 3000);

    function Mygreetings() {
        
    document.getElementById("update").innerHTML = " ";

     
    }
}
</script>

<style>
    .jab {

        color: green;
        font-family: serif;
        font-style: italic;


         font-size: 20px;
        text-align: center;


    }
    </style>
<script>
const timee = setTimeout(Mygree, 500);
 
function Mygree() {

    <?php if(isset($_SESSION['deletedupdate'])){
                                          ?>

    document.getElementById("updatedeleted").innerHTML ="<?php echo($_SESSION['deletedupdate']); ?>";

    <?php unset($_SESSION['deletedupdate']); } ?>


    const timee = setTimeout(Mygree, 3000);

    function Mygree() {
        
    document.getElementById("updatedeleted").innerHTML = " ";

     
    }
}
</script>

<script>
const timereg= setTimeout(voter, 500);
 
function voter() {

    <?php if(isset($_SESSION['registervoter'])){
                                          ?>

    document.getElementById("registernewvoter").innerHTML ="<?php echo($_SESSION['registervoter']); ?>";

    <?php unset($_SESSION['registervoter']); } ?>


    const timereg = setTimeout(voter, 3000);

    function voter() {
        
    document.getElementById("registernewvoter").innerHTML = " ";

     
    }
}
</script>
 
 
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i
                                                class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i
                                                class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>




                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-red"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                src="assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                src="assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                src="assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    

                                    <span><?php echo($_SESSION['username']);?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="email-inbox.html">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="#">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="logoutadmin.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>






            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img   src="assets/images/kenya1.jpeg"
                                        alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">Account settings<i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a>
                                            <a href="logoutadmin.php"><i
                                                    class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 p-b-0">
                                <form class="form-material">
                                    <div class="form-group form-primary">
                                        <input type="text" name="footer-email" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><i class="fa fa-search m-r-10"></i>Search
                                            Friend</label>
                                    </div>
                                </form>
                            </div>
                            <div class="pcoded-navigation-label">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="admin.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">Pages</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="#" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
                                        <span class="pcoded-mtext">Records</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        
                                        <li class="">
                                            <a href="adimregister.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Voter Registration</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Aspirant List</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Voters Details</h5>
                                            <h4><?php include("config/site_config.php"); echo $sitename; ?></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">

                                   
                                    <div class="text-center">
                                    <span class="jab" id="demo"></span>
                                    <span class="jab" id="update"></span>
                                    <span class="jab" id="updatedeleted"></span>
                                    <span class="jab" id="registernewvoter"></span>

                                    </div>

                                    



                                    <div class="text-center text-primary">
                                    <span class=" mb-3 " ><u>CITIZENS REGISTER FOR VOTING</u> </span>


                                    </div>
                                        <div class="container mt-5 flex justify-content-center">
                                            <table class="table table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">serial number</th>
                                                        <th scope="col">Fist Name</th>
                                                       
                                                        <th scope="col">National ID</th>
                                                        <th scope="col">Phone Number</th>
                                                   
                                                         
                                                        <th scope="col">County</th>
                                                        <th scope="col">Constituency</th>
                                                        <th scope="col">Ward</th>
                                                       
                                                        <th scope="col">Polling</th>
                                                        <th scope="col">Password</th>
                                                        <th scope="col">Voters Profile</th>
                                                        <th scope="col">Operations</th>



                                                    </tr>
                                                    <?php 
                                                   while($voter = mysqli_fetch_assoc($query)){
                                                         ?>
                                                    <tr>
                                                        <td><?php echo($voter['id']); ?></td>
                                                        <td><?php echo($voter['fname']); ?></td>
                                                       
                                                        <td><?php echo($voter['nationalid']); ?></td>
                                                        <td><?php echo($voter['phone']); ?></td>
                                                        
                                                        
                                                         <td><?php echo($voter['county']); ?></td>
                                                        <td><?php echo($voter['constituency']); ?></td>
                                                        <td><?php echo($voter['ward']); ?></td>
                                                        
                                                        <td><?php echo($voter['polling']); ?></td>
                                                        <td><?php echo($voter['password']); ?></td>
                                                        <td><?php echo("<img src=\"{$voter['image']}\" />"); ?></td>
                                                        
                                                        <td >
                                                            <button class="btn btn-primary w-2"><a
                                                                    href="adminupdate.php?updateid=<?php echo($voter['id']); ?>"
                                                                    class="text-light">Update</a></button>  <p>&nbsp; </p>
                                                            <button class="btn btn-danger w-2 "><a
                                                                    href="delete.php?deleteid=<?php echo($voter['id']); ?>"
                                                                    class="text-light">Delete</a></button>

                                                        </td>
                                                    </tr>
                                                    <?php
        } 
    ?>
                                                </thead>
                                                <tbody>



                                                </tbody>
                                            </table>

                                        </div>


                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>