<?php
 
if(isset($_POST['submit'])){
$msg = "";

$checking =false;

$proceed = true;
function secure_randon($length){
    $random_string='';
    for($i=0; $i<$length;$i++){
        $number =random_int(0,30);
        $charater=base_convert($number,10,36);
        $random_string .=$charater;
    }
    return $random_string;
}

 $authencode= strtoupper(secure_randon(5));

   $fname =$_POST["fname"];
   $mname =$_POST["mname"];
   $lname = $_POST["lname"] ;
   $nationalid = $_POST["nationalid"] ;
   $phone = $_POST["phone"] ;
   $email= $_POST['email'];
   $ward = $_POST['ward'];
   $constituency = $_POST['constituency'];
   $county = $_POST['county'];
   $polling = $_POST['polling'];
   $hospital = $_POST['hospital'];

   $password= $_POST["password"] ;
   $cpassword= $_POST["cpassword"] ;
   $image=$_FILES['file'];

   $temp_file = explode('.',$image['name']);
   $image_path = basename($image['name']);
   $imageType = strtoupper(pathinfo($image_path,PATHINFO_EXTENSION));
   if($password !=$cpassword){
    session_start();
    $_SESSION['msg'] = "Password Does Not Match";

  

  
}else{

    require_once "config/db_config.php"; 

   if($connection){
       if(getimagesize($image['tmp_name'])!== false){
           if($image['size']>10000000){ 
               $proceed = false;
               $msg = "The file is too large";
           }
           if($proceed && $imageType!=="JPG" && $imageType!=="JPEG" && $imageType!=="PNG" && $imageType!=="GIF" && $imageType!=="ICO" ){
                   $proceed=false;
                   $msg = "Wrong file extension";
           }
           if($proceed){
         
               $image_destination = "image/".$image_path;
               if(move_uploaded_file($image['tmp_name'],'image/'.$image_path)){

                   $query = mysqli_query($connection,"INSERT INTO user( fname,mname,lname,nationalid,phone,email,image,county,constituency,ward,hospital,polling,password,authencode) 
                   VALUES('{$fname}' ,'{$mname}', '{$lname}','{$nationalid}','{$phone}','{$email}','{$image_destination}','{$county}','{$constituency}','{$ward}','{$hospital}','{$polling}','{$password}','{$authencode}')");
                      
                   if($query){
                   
                    $filename = "voters/details.txt";
                    $file = fopen( $filename, "a+" );
                    if( $file == false )
                    {
                    echo ( "Error in opening new file" );
                    exit();
                    }
                    fwrite( $file, "\nFirst Name: ".$fname ."\nMiddle Name: ".$mname."\nLast Name: ".$lname."\nNational ID: ".$nationalid."\nPhone: ".$phone."\nEmail: ".$email."\nImage: ".$image_destination."\nCounty: ".$county."\nConstituency: ".$constituency."\nWard: ".$ward."\nHospital: ".$hospital."\nPolling: ".$polling."\nPassword: ".$password."\n");
                     fclose( $file );
$dest = $email;
$subjetc = "Group A Success ";
$body = "Congratulation You Have Successfully Created an account \n \n
            Verification code:
     

          $authencode\n\n


        Click to login http://localhost/kenya/authenlogin.php

";
$headers = "From: mwathi702@gmail.com";

if (mail($dest, $subjetc, $body, $headers)) {
    session_start();
 
    $_SESSION['success'] = "Activation Code Has Been Send to your mailbox ".$email;
     
    
    header('location: authenlogin.php');
   

} else {
  
$_SESSION['success'] = "Mail Not send ";

}
 


}
else{
$msg = "An error occured";
}
}
else{
$msg = "Image could not be uploaded";
}
}

}
}else{
echo "Database Connection error".mysqli_error($con);
}

}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Voter Registration</title>

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
    <section class="col-md-8 mx-auto">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" enctype="multipart/form-data"
                        action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">

                                        <h3 class="text-center txt-primary">Voters Registration</h3>



                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="fname" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">First Name</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="mname" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Middle name</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="lname" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="nationalid" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">National ID</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="phone" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="email" name="email" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <span>Upload Photo</span>

                                            <input type="file" name="file" class="" required>
                                            <span class="form-bar"></span>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="county" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">County</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="constituency" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Constituency</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group form-primary">
                                            <input type="text" name="ward" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Ward</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group form-primary">
                                            <input type="text" name="hospital" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Hospital</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="polling" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Polling Station</label>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password</label>
                                            <?php if(isset($_SESSION['msg'])){
                                              ?>
                                            <p class="text-danger"><?php echo($_SESSION['msg']); ?></p>

                                            <?php unset($_SESSION['msg']); } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="cpassword" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept <a href="#">Terms &amp;
                                                        Conditions.</a></span>
                                            </label>
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
                                <hr />
                                <hr />
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">You Have Account?</p>
                                        <p class="text-inverse text-left"><a href="voterlogin.php"><b>Sign In
                                                    Page</b></a></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>
       
    </section>

    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    
    <script src="assets/pages/waves/js/waves.min.js"></script>
    
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>