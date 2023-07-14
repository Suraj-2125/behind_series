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

$sql = "INSERT INTO `provider` (`P_ID`, `P_NAME`, `P_INFO`) VALUES('".$_POST['P_ID']."', '".$_POST['P_NAME']."', '".$_POST['P_INFO']."')";
$result = mysqli_query($conn,$sql);
    
//echo $sql;
if ($result) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header("location:HomePage.html");
?>
