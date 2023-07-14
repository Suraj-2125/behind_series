<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "behind_series";

 // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


 
$sql = "INSERT INTO `user`(`U_ID`, `U_NAME`, `U_EMAIL`, `U_PASSWORD`, `U_MOB`, `U_DOB`) VALUES ('".$_POST['U_ID']."', '".$_POST['U_NAME']."', '".$_POST['U_EMAIL']."','".($_POST['U_PASSWORD'])."', '".$_POST['U_MOB']."', '".$_POST['U_DOB']."')";
$result = mysqli_query($conn,$sql);
    
//echo $sql;
if ($result) {
echo $sql;
echo 'Data Added Sucessfully';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header("location:LoginUser.html");
?>

