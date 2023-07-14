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

$sql = "INSERT INTO `series` (`S_ID`, `SERIES_NAME`, `S_DESCRIPTION`, `P_ID`, `Genere`, `type`) VALUES ('".$_POST['S_ID']."', '".$_POST['SERIES_NAME']."', '".$_POST['S_DESCRIPTION']."', '".$_POST['P_ID']."', '".$_POST['Genere']."','".$_POST['type']."')";
$result = mysqli_query($conn,$sql);
    
echo $sql;
if ($result) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header("location:HomePage.html");
?>
