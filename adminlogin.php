<?php
 
session_start();

if(isset($_POST['submit'])){
    
$checking =false;
$username = $_POST["username"] ;
$password= $_POST["password"] ;

 
define("SERVER","localhost");
define("USER","rootmaseno");
define("PASSW","maseno123");
define("DB","IEBC");

    $connection = mysqli_connect(SERVER,USER,PASSW,DB);

    if($connection){

        
        $query= mysqli_query($connection,"SELECT * FROM admindetails WHERE username ='$username' AND password ='$password'") or die(mysqli_error($connection));

        if(mysqli_num_rows($query)===0){
            
            $_SESSION['userNotExist']="User Doesn't Exist❌";
            
        }else{

            while($results = mysqli_fetch_assoc($query)){
        
                session_start();

                $_SESSION['isvalid'] = true;

                $_SESSION['username'] =$username;
                $_SESSION['email'] =$results['fname'];
                $_SESSION['sitename'] =$results['sitename'];
 
                $_SESSION['password'] =$results['password'];
              
                
             $_SESSION['successSignin']=$results['username'] ."!!";

             $_SESSION['successSign']="Happy To server You Again!!😊";


 

              
                    header('Location: admin.php');
               
                


            }
        }

      
    
    }else{
        echo "Database Connection error".mysqli_error($con);
    }
}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>

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
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
    .jab {

        color: green;
        font-family: serif;
        font-style: italic;


        font-size: 19px;
        text-align: center;


    }
    </style>

    <script>
    const mttime = setTimeout(Mygreeting, 250);

    function Mygreeting() {

        <?php if(isset($_SESSION['success'])){
                                              ?>
        document.getElementById("demo").innerHTML = "<?php echo($_SESSION['success']); ?>";
        <?php unset($_SESSION['success']); } ?>


        const mttime = setTimeout(Mygreeting, 4000);

        function Mygreeting() {
            document.getElementById("demo").innerHTML = "";

        }
    }
    </script>
     <script>
    const time = setTimeout(Mygreet, 500);

    function Mygreet() {

        <?php if(isset($_SESSION['logout'])){
                                              ?>
        document.getElementById("logoutcheck").innerHTML = "<?php echo($_SESSION['logout']); ?>";
        <?php unset($_SESSION['logout']); } ?>


        const time = setTimeout(Mygreet, 4000);

        function Mygreet() {
            document.getElementById("logoutcheck").innerHTML = "";

        }
    }
    </script>
     <script>
    const timeuser= setTimeout(exist, 500);

    function exist() {

        <?php if(isset($_SESSION['userNotExist'])){
                                              ?>
        document.getElementById("userfail").innerHTML = "<?php echo($_SESSION['userNotExist']); ?>";
        <?php unset($_SESSION['userNotExist']); } ?>


        const time = setTimeout(exist, 4000);

        function exist() {
            document.getElementById("userfail").innerHTML = "";

        }
    }
    </script>
</head>

<body themebg-pattern="theme1">
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

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form class="md-float-material form-material" enctype="multipart/form-data"
                        action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Admin Sigup</h3>
                                        <div class="jab">
                                            <span class="jab" id="demo"></span>
                                            <span class="jab" id="logoutcheck"></span>
                                             
                                             <span class="jab" id="userfail"></span>


                                        </div>





                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            <a href="#" class="text-right f-w-600"> Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                                            name="submit" value="submit">
                                    </div>
                                </div>
                                <hr/>
                                <hr />
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">You Don't Have Account?</p>
                                        <p class="text-inverse text-left"><a href="voterSignup.php"><b>Sign Up Page</b></a></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>