<?php
 
 define("SERVER","localhost");
 define("USER","rootmaseno");
 define("PASSW","maseno123");
 define("DB","IEBC");
 
$connection = mysqli_connect(SERVER,USER,PASSW,DB);

$id=$_GET['updateid'];
$msg = "";
$proceed = true;
$sql="Select * from `user` where id=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
                                
$fname=$row['fname'];
$mname=$row['mname'];
$email=$row['email'];
$ward=$row['ward'];
$county=$row['county'];
$constituency=$row['constituency'];
$polling=$row['polling'];
$hospital=$row['hospital'];
$lname=$row['lname'];
$nationalid=$row['nationalid'];
$phone=$row['phone'];
$password=$row['password'];
$image=$row['image'];


if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $nationalid=$_POST['nationalid'];
    $mname=$_POST['mname'];
    $constituency=$_POST['constituency'];
    $county=$_POST['county'];
    $ward =$_POST['ward'];
    $hospital=$_POST['hospital'];
    $polling =$_POST['polling'];
    $email=$_POST['email'];

    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $image=$_FILES['file'];
    $temp_file = explode('.',$image['name']);
    $image_path = basename($image['name']);
    $imageType = strtoupper(pathinfo($image_path,PATHINFO_EXTENSION));

    if(getimagesize($image['tmp_name'])!== false){
      echo("yyyyy");
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
                $query = mysqli_query($connection,"update `user` set id='$id',mname='$mname',fname='$fname',
    lname='$lname',nationalid='$nationalid',constituency='$constituency',email='$email',polling='$polling',ward='$ward',hospital='$hospital',county='$county',phone='$phone',password='$password',image='{$image_destination}'
    where id=$id");
                if($query){
                    session_start();
                    $_SESSION['updatesuccess']="Voter Details Updated!! Successfully ";

                    header("Location: admin.php");
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
}

 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>UpdateAdmin</title>
   
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
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
                    <form class="md-float-material form-material"  enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        
                         
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
                              
                                    <input type="text" name="fname" class="form-control"  value=<?php echo $fname; ?>>
                                    <span class="form-bar"></span>
                                    <label class="">First Name</label>
                                   
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="text" name="mname" class="form-control"  value=<?php echo $lname; ?>>
                                    <span class="form-bar"></span>
                                    <label class=" ">Middle name</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="text" name="lname" class="form-control"value=<?php echo $lname; ?> required>
                                    <span class="form-bar"></span>
                                    <label class=" ">last Name</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="text" name="nationalid" class="form-control" value=<?php echo $nationalid; ?> required>
                                    <span class="form-bar"></span>
                                    <label class=" ">National ID</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="text" name="phone" class="form-control" value=<?php echo $phone; ?> required>
                                    <span class="form-bar"></span>
                                    <label class=" ">Phone Number</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" value=<?php echo $email; ?> required>
                                    <span class="form-bar"></span>
                                    <label class=" ">Email Address</label>
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
                                    <input type="text" name="county" value=<?php echo $county; ?>   class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class=" ">County</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="text" name="constituency" class="form-control" value=<?php echo $constituency; ?>  required>
                                    <span class="form-bar"></span>
                                    <label class=" ">Constituency</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                
                                <div class="form-group form-primary">
                                    <input type="text" name="ward" class="form-control" value=<?php echo $ward; ?>  required>
                                    <span class="form-bar"></span>
                                    <label class=" ">Ward</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                
                                <div class="form-group form-primary">
                                    <input type="text" name="hospital" class="form-control" value=<?php echo $hospital; ?>  required>
                                    <span class="form-bar"></span>
                                    <label class=" ">Hospital</label>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="text" name="polling" class="form-control" value=<?php echo $polling; ?>  required>
                                    <span class="form-bar"></span>
                                    <label class=" ">Polling Station</label>
                                </div>
                                </div>
                               
                                
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" value=<?php echo $password; ?>  value=<?php echo $password; ?>>
                                            <span class="form-bar"></span>
                                            <label class=" ">Password</label>
                                        </div>
                                    </div>
                                   
                                </div>
                                
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                         
                                        <input type="submit"class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="submit"> 
                                    </div>
                                </div>
                                <hr/>
                                
                            </div>
                        </div>
                    </form>
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
