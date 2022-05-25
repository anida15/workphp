<?php
 
 session_start();

 
    if(realpath("config/db_config.php") && realpath("config/site_config.php")){
//         $file = glob("config_settings/*");
// foreach ($file as $file){

//     if(is_file($file)){
//         unlink($file);
//     }

// }

// $path ="config_settings";
// unlink("adminfolders.php");
// rmdir($path);
       
        $_SESSION['success'] = "Succesfully Created An Admin Account";
      
       
        header('location: adminlogin.php');
    }else{
      

define("SERVER","localhost");
define("USER","rootmaseno");
define("PASSW","maseno123");
define("DB","IEBC");

   $connection = mysqli_connect(SERVER,USER,PASSW,DB);
   $query = mysqli_query($connection," DELETE FROM admindetails");
      
   if($query){
    $_SESSION['success'] = "Installation Failed";
    
    unlink("config/db_config.php");
    unlink("config/site_config.php");


    header('location: config_settings/index.php');

   }



       
    }

 

  ?>