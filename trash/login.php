<!DOCTYPE html>
<html>

<head>

    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
      //   function loadWin() {
        //     var win = window.open("");
        // }
         function processData(){
             
             var nationaid = document.getElementById("nationalid").value;
             
  
             var password = document.getElementById("password").value;
   
  
             
     
     
             
            
          if(nationaid == ""){
            alert ("National ID can not be empty");
        }
          if(password ==""){
                 alert ("password is required");
             }
             
             if(password!=""  && nationaid !=""){
             
                    alert("Submited");
                    window.open("authentication.php?nationalid="+nationaid+ "& password="+password);
                
             }
         }
         </script>
</head>

<body>
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header bg-primary">
                <h3 class="card-title ">Voters Signin <small> Page</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="authentication.php" method="post" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label  >Nationa ID</label>
                    <input type="text" class="form-control w-30" name="nationalid" placeholder="National ID">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
    
                 
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary w-20">Submit</button>
                </div>
              </form>
            </div>
         
            </div>
          
          <div class="col-md-6">

          </div>
        
        </div>
      
      </div> 
    </section>
   
  
 
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="#">Kenya Property</a>.</strong> All rights
    reserved.
  </footer>


    



</body>

</html>