<?php
 
 
 if($_SERVER["REQUEST_METHOD"] == "POST"){

 
$server = $_POST["server"] ;
$user= $_POST["user"] ;
$pass= $_POST["pass"] ;
$db= $_POST["db"] ;
$filename = "config/db_config.php";
$file = fopen( $filename, "w+" );
if( $file == false )
{
echo ( "Error in opening new file" );
exit();
}
fwrite($file,"<?php \n".'$connection'."= mysqli_connect(".$server.",".$user.",".$pass.",".$db."); ?>" );
session_start();

$_SESSION['configdone']="Configurations is Set!";

fclose( $file );


}
 
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Configuration</title>

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
    const timeuser= setTimeout(exist, 500);

    function exist() {

        <?php if(isset($_SESSION['configdone'])){
                                              ?>
        document.getElementById("cont").innerHTML = "<?php echo($_SESSION['configdone']); ?>";
        <?php unset($_SESSION['configdone']); } ?>


        const time = setTimeout(exist, 3000);

        function exist() {
            document.getElementById("cont").innerHTML = "";

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
                                        <h3 class="text-center">Config Form</h3>
                                        <div class="jab">
                                            
                                             <span class="jab" id="cont"></span>


                                        </div>
                                        




                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="server" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">SERVER</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="user" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">USER</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="pass" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">PASSWORD</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="db" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">DATABASE</label>
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
                                        <p class="text-inverse text-left m-b-0">Admin</p>
                                        <p class="text-inverse text-left"><a href="#"><b>ADMIN</b></a></p>
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