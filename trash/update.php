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
$lname=$row['lname'];
$nationalid=$row['nationalid'];
$phone=$row['phone'];
$password=$row['password'];
$image=$row['image'];


if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $nationalid=$_POST['nationalid'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $image=$_FILES['file'];
    $temp_file = explode('.',$image['name']);
    $image_path = basename($image['name']);
    $imageType = strtoupper(pathinfo($image_path,PATHINFO_EXTENSION));

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
                $query = mysqli_query($connection,"update `user` set id='$id',fname='$fname',
    lname='$lname',nationalid='$nationalid',phone='$phone',password='$password',image='{$image_destination}'
    where id=$id");
                if($query){
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Crud Operations</title>
  </head>
  <body>
  <div class="container my-5">
  <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <?php if(isset($_POST['submit'])){echo("<div>$msg</div>");} ?>
        <label>Fisrt Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" name="fname" autocomplete="off" value=<?php echo $fname; ?>>
        </div>
      
        <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" placeholder="Enter your password" name="lname" autocomplete="off" value=<?php echo $lname; ?>>
        </div>

        <div class="form-group">
        <label>National</label>
        <input type="text" class="form-control" placeholder="Enter your mobile email" name="nationalid" autocomplete="off" value=<?php echo $nationalid; ?>>
        </div>

        <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" placeholder="Enter your mobile" name="phone" autocomplete="off" value=<?php echo $phone; ?>>
        </div>

          <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" placeholder="Enter your county" name="password" autocomplete="off" value=<?php echo $password; ?>>
        </div>

         

        <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" placeholder="" name="file" autocomplete="off">
        </div>





  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>

  </div>

  </body>
</html>
