<?php
 
session_start();
if(isset($_POST['submit'])){
    
 
$email = $_POST["email"] ;
$subject = $_POST["subject"] ;

$message= $_POST["message"] ;
 
$dest = $email;
$subjetc = $subject;
$body = $message;
$headers = "From: mwathi702@gmail.com";

if (mail($dest, $subjetc, $body, $headers)) {
    session_start();
 
    $_SESSION['success'] = "Activation Code Has Been Send to your mailbox ".$email;
     
    
    header('location: authenlogin.php');
   

} else {
  
$_SESSION['success'] = "Mail Not send ";

}

 

      
    
   
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Send Mail</title>

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
                                        <h3 class="text-center">Send Mail</h3>
                                        <div class="jab">
                                            
                                            <span class="jab" id="logoutcheck"></span>
                                             
                                             <span class="jab" id="userfail"></span>


                                        </div>





                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Enter Email To Send</label>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" name="subject" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Subject</label>
                                </div>
                                <div class="form-group form-primary">
                                <label class="">Message</label>
                                    <span class="form-bar"></span>
                                    <textarea name="message" id="" cols="55" rows="20"></textarea>
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