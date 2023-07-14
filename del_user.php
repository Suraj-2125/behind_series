<?php  
	$id = $_GET["id"];
	$con = mysqli_connect("localhost","root","","behind_series");
	$sql = "DELETE FROM user WHERE U_ID=$id";
	//echo $sql;
	mysqli_query($con,$sql);
header("location:selectuser.php");
?>