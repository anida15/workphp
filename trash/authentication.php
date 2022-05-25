<?php


 
   
    $nationalid = $_POST["nationalid"] ;
   
    $password= $_POST["password"] ;

     


    
    echo $nationalid;
    echo "<br>";
   echo $password;
    echo "<br>";



define("SERVER","localhost");
define("USER","rootmaseno");
define("PASSW","maseno123");
define("DB","IEBC");

    $connection = mysqli_connect(SERVER,USER,PASSW,DB);

    if($connection){

        
        $query= mysqli_query($connection,"SELECT * FROM user WHERE nationalid ='$nationalid' AND password ='$password'") or die(mysqli_error($connection));

        if(mysqli_num_rows($query)===0){
            echo "User Doesn't Exist";
        }else{

            while($results = mysqli_fetch_assoc($query)){
        
                session_start();

                $_SESSION['nationalid'] =$nationalid;
                $_SESSION['fname'] =$results['fname'];

                $_SESSION['lname'] =$results['lname'];

             $_SESSION['phone'] =$results['phone'];
             $_SESSION['image'] =$results['image'];


                
             

                

                if($nationalid==="admin123"){
                    header('Location: admin.php');
                }else{
                   
                    header('Location: user.php');
                }
                


            }
        }


 
        
    
    }else{
        echo "Database Connection error".mysqli_error($con);
    }

    ?>