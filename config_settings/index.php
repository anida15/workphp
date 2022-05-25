 <?php
session_start();
$apachevar=apache_get_version();
$phpvar=phpversion();
$mysqlivar="";
$uploadsvar="";
$phpvarok="";


$required_extensions = [
                'mysqli',
                'pcre',
                'tokenizer',
                'ctype',
                'session',
                'json',
                'xml',
                'dom',
                'phar',
                'openssl',
                'gd',
                'mbstring',
                'curl',
                'zlib',
                'fileinfo',
            ];

if (!empty($_GET) && array_key_exists('phpinfo', $_GET)) {
    phpinfo();
    die();
}
 foreach ($required_extensions as $required_extension) {
                if (extension_loaded($required_extension)) {
					
					if (in_array("mysqli", $required_extensions))
						  {
						  $mysqlivar=" Mysqli library loaded";
						  }
                    
                } else {
                  
                }
            }
 

if(ini_get('file_uploads') == 1)
{
  $uploadsvar="HTTP Upload Enabled";
}
else
{
  $uploadsvar='HTTP Upload Disabled';
}


if(isset($_POST['submit'])){

    $sitename  = $_POST["sitename"];
    $email  = $_POST["email"];
    $username  = $_POST["username"];
    $password = $_POST["password"];
    
   
    $server = $_POST["server"] ;
    $userdb= $_POST["userdb"] ;
    $dbpassword= $_POST["dbpassword"] ;
    $dbname= $_POST["dbname"] ;
    $filename = "../config/db_config.php";
    $filename2 = "../config/site_config.php";


    $file = fopen( $filename, "w+" );
    $file2 = fopen( $filename2, "w+" );



    require_once "../config/db_config.php"; 


    if($connection){
         
                
                    $query = mysqli_query($connection,"INSERT INTO admindetails( sitename,email,username,password) 
                    VALUES('{$sitename}' ,'{$email}', '{$username}','{$password}')");
                       
                    if($query){
                        session_start();
                        
    if( $file == false )
    {
    echo ( "Error in opening new file" );
    exit();
    }
    fwrite($file,"<?php \n".'$connection'."= mysqli_connect("."'$server'".","."'$userdb'".","."'$dbpassword'".","."'$dbname'"."); \n?>"
 );




 fclose( $file );



 if( $file2 == false )
 {
 echo ( "Error in opening new file" );
 exit();
 }
 fwrite($file2,"<?php \n".'$sitename'."="."'$sitename'" ."; \n?>");




 fclose( $file2 );



 }



//  $_SESSION['success'] = "Succesfully Created An Admin Account";
 header('location: ../adminfolders.php');

 }
 else{
 echo "No Database connection";
 }
 }


 ?>


 <html lang="en">

 <head>
     <title>Admin Installation</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="font-awesome/font-awesome.css">
     <link rel="stylesheet" href="style.css">
     <script src="js/bootstrap.bundle.min.js"></script>
     <script src="jquery.js"></script>
     <script src="script.js"></script>
     <style>
     .pack {
         color: green;
     }

     .textp {
         color: black;
         font-size: medium;

     }
     .pad{
         margin: 30px;
     }
     </style>
      <style>
    .jab {

        color: red;
        font-family: serif;
        font-style: italic;


        font-size: 19px;
        text-align: center;


    }
    </style>

    <script>
    const mttimee = setTimeout(Mygreetingss, 250);

    function Mygreetingss() {

        <?php if(isset($_SESSION['success'])){
                                              ?>
        document.getElementById("demo").innerHTML = "<?php echo($_SESSION['success']); ?>";
        <?php unset($_SESSION['success']); } ?>


        const mttime = setTimeout(Mygreetingss, 4000);

        function Mygreetingss() {
            document.getElementById("demo").innerHTML = "";

        }ss
    }
    </script>


 </head>

 <body>
     <!-- MultiStep Form -->
     <div class="container-fluid" id="grad1">
         <div class="row justify-content-center mt-0">
             <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                 <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                     <h2><strong>Admin Installation Account</strong></h2>
                     <p>Fill all form field to go to next step</p>
                     <div class="row">
                         <div class="col-md-12 mx-0">
                         <span class="jab" id="demo"></span>
                             <form id="msform" enctype="multipart/form-data"
                                 action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                 <!-- progressbar -->
                                 <ul id="progressbar">
                                     <li class="active" id="account"><strong>Server Information</li>
                                     <li id="personal"><strong>SupperAdmin Details</strong></li>
                                     <li id="payment"><strong>Database Information</strong></li>
                                     <li id="confirm"><strong>Finish</strong></li>
                                 </ul>
                                 <!-- fieldsets -->
                                 <fieldset>
                                     <div class="form-card">
                                         <h2 class="fs-title">Server Information</h2>

                                         <div class="pad">
                                         <?php if($phpvar>=5.4){?>
                                         <span
                                             class="textp"><?php echo "Php Version". $phpvar."&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; "; ?></span>
                                         <span class="pack"><?php echo "version OK"; }?></span>
                                         </div>
                                         <div class="pad">
                                         <?php if(apache_get_version()){?>
                                         <span class="textp"><?php echo  "Apache 2.4.51"." &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;"; ?></span>
                                         <span class="pack"><?php echo "version OK"; }?></span>
                                         </div>
                                         <div class="pad">
                                             <?php if( $mysqlivar){?>
                                             <span class="textp"><?php echo "mysqli library  "." &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;"; ?></span>
                                             <span class="pack"><?php echo "extensions OK"; }?></span>
                                         </div>
                                         <div class="pad">
                                             <?php if( ini_get('file_uploads') == 1){?>
                                             <span class="textp"><?php echo "File Upload"."&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;"; ?></span>
                                             <span class="pack"><?php echo "File upload OK"; }?></span>
                                         </div>
                                     </div>
                                     <input type="button" name="next" class="next action-button" value="Next Step" />
                                 </fieldset>
                                 <fieldset>
                                     <div class="form-card">
                                         <h2 class="fs-title">SupperAdmin Details</h2>
                                         <input type="text" name="sitename" placeholder="Site Name" required />
                                         <input type="text" name="email" placeholder="Email Address" required />
                                         <input type="text" name="username" placeholder="Admin Username" required />
                                         <input type="password" name="password" placeholder="Login Password" required />
                                     </div>
                                     <input type="button" name="previous" class="previous action-button-previous"
                                         value="Previous" />
                                     <input type="button" name="next" class="next action-button" value="Next Step" />
                                 </fieldset>
                                 <fieldset>
                                     <div class="form-card">
                                         <h2 class="fs-title">Database Information</h2>
                                         <input type="text" name="server" placeholder="Server Name" required />
                                         <input type="text" name="userdb" placeholder="Database User" required />
                                         <input type="text" name="dbpassword" placeholder="Database Password"
                                             required />
                                         <input type="text" name="dbname" placeholder="Data Name" required />

                                     </div>
                                     <input type="button" name="previous" class="previous action-button-previous"
                                         value="Previous" />
                                     <input type="button" name="confirm" class="next action-button" value="confirm" />
                                 </fieldset>
                                 <fieldset>
                                     <div class="form-card">
                                         <h2 class="fs-title text-center">Success !</h2>
                                         <br><br>
                                         <div class="row justify-content-center">
                                             <div class="col-3">

                                             </div>
                                         </div>
                                         <br><br>
                                         <div class="row justify-content-center">
                                             <div class="col-7 text-center">
                                                 <input type="submit" name="submit" class="" value="submit" />
                                                 <h5>Click Submit to Completed Installation</h5>
                                             </div>
                                         </div>
                                     </div>
                                 </fieldset>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </body>

 </html>