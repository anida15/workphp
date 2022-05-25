<?php
 $msg = "";
 $proceed = true;
    $fname =$_GET["fname"];
    $lname = $_GET["lname"] ;
    $nationalid = $_GET["nationalid"] ;
    $phone = $_GET["phone"] ;
    $password= $_GET["password"] ;
    $image=$_FILES['file'];
    $temp_file = explode('.',$image['name']);
    $image_path = basename($image['name']);
    $imageType = strtoupper(pathinfo($image_path,PATHINFO_EXTENSION));


define("SERVER","localhost");
define("USER","rootmaseno");
define("PASSW","maseno123");
define("DB","IEBC");

    $connection = mysqli_connect(SERVER,USER,PASSW,DB);

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
                $image_destination = "images/".$image_path;
                if(move_uploaded_file($image['tmp_name'],'images/'.$image_path)){
                    $query = mysqli_query($connection,"INSERT INTO user( fname,lname,nationalid,phone,password,image) VALUES('{$name}' ,'{$lname}', '{$nationalid}','{$phone}','{$mobile}', '{$image}','{$password}')");
                       
                    if($query){
                        $msg = "Inserted succesfully";
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

       



         if($rst){
             echo "Data Inserted Successufully";
         }else{
             mysqli_close($connection);
         }

        
    
    }else{
        echo "Database Connection error".mysqli_error($con);
    }


 ?>