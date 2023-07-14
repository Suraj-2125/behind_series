<?php 

if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	$con = mysqli_connect("localhost","root","","behind_series");
	$sql = "SELECT * FROM user WHERE U_ID =$id";
	$rs = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($rs,MYSQLI_BOTH);
}
	

if(isset($_POST["id"]))
{
	$id = $_POST["id"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$mail = $_POST["mail"];

	$con = mysqli_connect("localhost","root","","behind_series");
	
	$sql = "UPDATE `user` SET `U_NAME` = '".$_POST['username']."', `U_EMAIL` = '".$_POST['mail']."', `U_PASSWORD` = '".$_POST['password']."', `U_MOB` = '".$_POST['mob']."', `U_DOB` = '".$_POST['dob']."' WHERE `user`.`U_ID` = $id";
	//echo "$sql";

	mysqli_query($con,$sql);
	header("location:selectuser.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>

 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,500,300,700,400'><link rel='stylesheet' href='showstyle.css'>
<div class='aa_htmlTable'>
<h2 class='aa_h2'>UPDATE DATA</h2>
<center>
	<form method="post">
	<table>
		<input type="hidden" name="id" value="<?php echo$_GET['id'] ?>"/>
		<tr><td>UserName</td><td><input type="text" name="username" value="<?php echo $row['U_NAME'];?>"></td></tr>
		<tr><td>Mail</td><td><input type="text" name="mail" value="<?php echo $row['U_EMAIL'];?>"></td></tr>
		<tr><td>Password</td><td><input type="Password" name="password" value="<?php echo $row['U_PASSWORD'];?>"></td></tr>
		<tr><td>Mobile</td><td><input type="number" name="mob" value="<?php echo $row['U_MOB'];?>"></td></tr>
		<tr><td>Date</td><td><input type="date" name="dob" value="<?php echo $row['U_DOB'];?>"></td></tr>
		<tr><th colspan="2" rowspan="2"><input type="submit" name="t6" value="Update"></th></tr>
	</table>
</form>
</center>
</body>
</html>
