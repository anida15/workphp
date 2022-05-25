<?php
if(isset($_POST['submit'])){
$msg = "";
$proceed = true;
   $fname =$_POST["fname"];
   $lname = $_POST["lname"] ;
   $nationalid = $_POST["nationalid"] ;
   $phone = $_POST["phone"] ;
   $password= $_POST["password"] ;
   $cpassword= $_POST["cpassword"] ;
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
               $image_destination = "image/".$image_path;
               if(move_uploaded_file($image['tmp_name'],'image/'.$image_path)){
                   $query = mysqli_query($connection,"INSERT INTO user( fname,lname,nationalid,phone,image,password) VALUES('{$fname}' ,'{$lname}', '{$nationalid}','{$phone}','{$image_destination}','{$password}')");
                      
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
   }else{
       echo "Database Connection error".mysqli_error($con);
   }
  }
?>
 <!DOCTYPE html>
 <html>

 <head>
   <title>VOTER REGISTRATION</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="styl.css">
   <script src="js/jquery.min.js"></script>

   <script>
    
      /* function processData(){
           var fname =document.getElementById("fname").value;
           var lname = document.getElementById("lname").value;
           var nationaid = document.getElementById("nationalid").value;
           var phone = document.getElementById("phone").value;

           var password = document.getElementById("password").value;

           var cpassword = document.getElementById("cpassword").value;
           var file = document.getElementById("file").files; 

           if(fname == ""){
               alert ("Fname can not be empty");
           }
           if(lname == ""){
            alert (" last name can not be empty");
        }
        if(nationaid == ""){
          alert ("National ID can not be empty");
      }
      if(phone == ""){
        alert ("Phone can not be empty");
    }   if(file == ""){
        alert ("Phote can not be empty");
    }  
    
        

           if(password ==""){
               alert ("password is required");
           }
           if(cpassword ==""){
               alert ("Confirm password is required");
           }
           if(password!="" && fname!="" && cpassword!="" && phone  !="" && lname !="" && nationaid !=""){
              if(password!=cpassword){
                  alert("Password Doesn't Match")
   
              }else{
                  alert("Submited");
                  window.open("processdata.php?fname="+fname+ "& lname="+lname+ "& nationalname="+nationaid+ "& phone="+phone+ "& password="+password + "& file="+file);
              }
           }
       }*/
       </script>


 </head>

 <body>


   <section class="content">
     <div class="container-fluid">
       <div class="card card-default">
         <div class="card-header bg-primary">
           <h3 class="card-title">VOTERS REGISTRATION FORM </h3>
    
         </div>
         <div class="card-body">
           <div class="row">

             <!-- left column -->
             <div class="col-md-6">
               <!-- general form elements -->

               <form role="form" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                 <div class="form-group row mb-3">
                   <label class="col-sm-5 col-form-label">First Name</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" name="fname" placeholder="First Names">
                   </div>
                 </div>

                 <div class="form-group row mb-3">
                   <label class="col-sm-5 col-form-label">Last Name</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" name="lname" placeholder="Last Name">
                   </div>
                 </div>
                 <div class="form-group row mb-3">
                   <label for="inputPassword3" class="col-sm-5 col-form-label">National ID</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" name="nationalid" placeholder="National ID">
                   </div>
                 </div>
                 
                 <div class="form-group row mb-3">
                   <label for="inputPassword3" class="col-sm-5 col-form-label">Phone number</label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" name="phone" placeholder="Phone  Number">
                   </div>
                 </div>
                 <div class="form-group row mb-3">
                  <label for="inputPassword3" class="col-sm-5 col-form-label">Upload Photo</label>
                  <div class="col-sm-7">
                    <input type="file" class="form-control" name="file" placeholder="File Upload">
                  </div>
                </div>
                 <div class="form-group row mb-3">
                   <label for="inputPassword3" class="col-sm-5 col-form-label">Password</label>
                   <div class="col-sm-7">
                     <input type="password" class="form-control" name="password" placeholder="Password">
                   </div>
                 </div>
                 <div class="form-group row mb-3">
                   <label for="inputPassword3" class="col-sm-5 col-form-label">Confirm Password</label>
                   <div class="col-sm-7">
                     <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                   </div>
                 </div>

                 <input type="submit" name="submit" value="submit"> 






               </form>

             </div>
           </div>

         </div>
       </div>
     </div>

   </section>


   <hr>
   <footer>
     <strong>Copyright &copy; 2014-2019 <a href="#">Tanzanian Goverment</a>.</strong> All rights
     reserved.
   </footer>






 </body>

 </html>