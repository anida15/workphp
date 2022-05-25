<?php

$firstname = $email = $lastname = $middlename = $nationalId = $telphoneNo = $county = $constituency = $pollingCenter = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST["fname"];
  $middlename = $_POST["mname"];
  $lastname =  $_POST["lname"];
  $nationalId = $_POST["nationa_id"];
  $telphoneNo = $_POST["telphoneNo"];
  $email =  $_POST["email"];
  $county = $_POST["county"];
  $constituency = $_POST["constituency"];
   


echo " ". $firstname ."  ".$middlename."  ".$lastname."  ".$nationalId."  ".$telphoneNo."  ".$email."  ".$county."  ".$constituency;
 




  //$servername = "localhost";
  //$username = "anida";
  //$password = "Kitale15";
  //$dbname = "kenya";



  // Create connection
  //$conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  ///if ($conn->connect_error) {
   // die("Connection failed: " . $conn->connect_error);
  //}

  // prepare and bind
  ///$stmt = $conn->prepare("INSERT INTO citizens (FirstName, MiddleName,LastName ,NationalId, TelphoneNo,Email,County,Constituency, PollingCenter) VALUES (?, ?, ?,?,?,?,?,?,?)");
  //$stmt->bind_param("sssssssss", $firstname, $middlename, $lastname, $nationalId, $telphoneNo, $email, $county, $constituency, $pollingCenter);

  //$stmt->execute();

 
  //$stmt->close();
  //$conn->close();
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>VOTER REGISTRATION</title>
   
</head>

<body>

  <form name="myForm" action="phpfile.php  " onsubmit="validateForm()" method="post">

    <div class="forms text-white">
      <h1  class="text-white">VOTER REGISTRATION</h1>
      


      <div class="tabinputs">
        <label class="lable">First Name</label><br>
        <input class="input" type="text" name="fname" required><span>*</span>
      </div>

      <div class="tabinputs">
        <label class="lable">Middle Name</label> <br>
        <input class="input" type="text" name="mname">
      </div>

      <div class="tabinputs">
        <label class="lable">Last Name</label> <br>
        <input class="input" type="text" name="lname" required><span>*</span>
      </div>

      <div class="tabinputs">
        <label class="lable">National ID</label> <br>
        <input class="input" type="text" name="nationa_id" required><span>*</span>
      </div>

      <div class="tabinputs">
        <label class="lable">Telephone No.</label> <br>
        <input class="input" value="+254" type="phone" name="telphoneNo" required><span>*</span>
      </div>

      <div class="tabinputs">
        <label class="lable">Email</label> <br>
        <input class="input" type="email" name="email">
      </div>

      <div class="tabinputs">
        <label class="lable">County </label> <br>
        <select class="inputs" name="county" id="">
          <option value="Nairobi">Nairobi</option>
          <option value="Kisume">Kisumu</option>
          <option value="Meru">Meru</option>
          <option value="Nakuru">Nakuru</option>
          <option value="Eldorect">Eldorect</option>
        </select><span>*</span>
      </div>

      <div class="tabinputs">
        <label class="lable">Constituency</label> <br>
        <select class="inputs" name="constituency" id="">
          <option value="Kibera">Nandi</option>
          <option value="Ndeka">Ndeka</option>
          <option value="Chika">Chika</option>
          <option value="Mondile">Mondile</option>
        </select><span>*</span>
      </div>

      

      <div class="tabsubmits">
        <input class="submits" type="submit" value="Submit">
      </div>

    </div>

  </form>






  <script src="javascri.js"></script>
</body>

</html>