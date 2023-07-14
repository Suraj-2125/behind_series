<?php
if(!isset($_GET['uid']) || !ctype_digit($_GET['uid'])){
header("location:HomePage.html");
exit();
}
require_once('DB_Connection.php');
$sql = "SELECT * FROM users WHERE uid =".$_GET['uid'];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<title>Register</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'><link rel="stylesheet" href="./regstyle.css">

</head>
<body>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Udoate Here</h3>
                        <p>Fill in the data below.</p>
                        <form method="post" class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="U_NAME" value="<?php echo$_GET['U_NAME'];?>">
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="U_EMAIL" value="<?php echo$_GET['U_EMAIL'];?>">

                            </div>
                           <div class="col-md-12">
                              <input class="form-control" type="password" name="U_PASSWORD" value="<?php echo$_GET['U_PASSWORD'];?>">
                           </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="U_MOB" value="<?php echo$_GET['U_MOB'];?>">
<br>
                            </div>
                           <div class="col-md-12">
                              <input class="form-control" type="date" name="U_DOB" placeholder="Birthdate" value="<?php echo$_GET['U_DOB'];?>">
                           </div>
                
                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- partial -->
  <script  src="./regscript.js"></script>

</body>
</html>

<label>Upload:</label>
<input type="submit" name="submit" value="save 
&rarr;">
