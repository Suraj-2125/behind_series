<?php  
	$id = $_GET["id"];
	$con = mysqli_connect("localhost","root","","behind_series");
	$sql = "DELETE FROM provider WHERE P_ID=$id";
	//echo $sql;
	mysqli_query($con,$sql);
header("location:provider_data.php");
?>