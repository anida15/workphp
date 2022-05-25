<?php
define("SERVER","localhost");
define("USER","rootmaseno");
define("PASSW","maseno123");
define("DB","IEBC");

$connection = mysqli_connect(SERVER,USER,PASSW,DB);
 
 
$query = mysqli_query($connection,"SELECT * FROM user");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        img{
            width: 100px;
        }
        table,tr,th,td{
            border: 1px solid black;
            border-spacing: 0px;
            border-width: 1px;
        }
    </style>
</head>
<body>
<h1 class="text-center my-3">Data from database</h1>
<div class="container mt-5 d-flex justify-content-center"> 
    <table class="table table-bordered w-100">
  <thead>
    <tr>
      <th scope="col">serial number</th>
      <th scope="col">Fist Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">National ID</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
      <th scope="col">Image</th>
      <th scope="col">Operations</th>

     
    </tr>
    <?php 
        while($voter = mysqli_fetch_assoc($query)){
     ?>
      <tr>
        <td><?php echo($voter['id']); ?></td>
        <td><?php echo($voter['fname']); ?></td>
        <td><?php echo($voter['lname']); ?></td>
        <td><?php echo($voter['nationalid']); ?></td>
        <td><?php echo($voter['phone']); ?></td>
        <td><?php echo($voter['password']); ?></td>
        <td><?php echo("<img src=\"{$voter['image']}\" />"); ?></td>
        <td>
          <button class="btn btn-primary"><a href="update.php?updateid=<?php echo($voter['id']); ?>" class="text-light">Update</a></button>
          <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo($voter['id']); ?>" class="text-light">Delete</a></button>
       
      </td>
      </tr>
    <?php
        } 
    ?>
  </thead>
  <tbody>
   
  

  </tbody>
</table>

</div>
    
</body>
</html>