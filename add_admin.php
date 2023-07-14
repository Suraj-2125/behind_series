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
 
$sql = "INSERT INTO `admin`(`A_ID`, `A_NAME`, `EMAIL`, `PASSWORD`) VALUES ('".$_POST['A_ID']."', '".$_POST['A_NAME']."', '".$_POST['EMAIL']."','".($_POST['PASSWORD'])."')";
$result = mysqli_query($conn,$sql);
    
if ($result) {
echo $sql;
echo 'Data Added Sucessfully';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header("location:LoginUser.html");
?>

