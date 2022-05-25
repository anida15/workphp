<?php 
 define("SERVER","localhost");
 define("USER","rootmaseno");
 define("PASSW","maseno123");
 define("DB","IEBC");
 
    $connection = mysqli_connect(SERVER,USER,PASSW,DB);
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from`user` where id=$id";
    $result=mysqli_query($connection,$sql);
    if($result){
        session_start();
        $_SESSION['deletedupdate']="Voter deleted Successfully!🚮";
        header('location:admin.php');
    }else{
        die(mysqli_error($con));
    }
}


?>

