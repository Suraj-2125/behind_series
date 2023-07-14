<?php
if(isset($_POST["id"]))
{
$A_ID = $_POST["id"];
$A_NAME = $_POST["username"];
$EMAIL = $_POST["mail"];
$PASSWORD = $_POST["password"];

echo "<br>ID : ".$id;
echo "<br>Name : ".$username;
echo "<br>Password : ".$password;
echo "<br>Mail : ".$mail;

$con = mysqli_connect("localhost","root","","btw_db");
$sql = "INSERT INTO `admin` (`A_ID`, `A_NAME`, `EMAIL`, `PASSWORD`) VALUES('$id', '$name', '$mail', '$password')";
mysqli_query ($con,$sql);
echo "Record Added Successfully..";
}
?>
<br><br><br><br>
<center>
	<form method="post" action="addadmin.php">
	<table border="5" width="5" bgcolor="Gray">
		<tr><th colspan="2">Admin Table</th></tr>
		<tr><td>ID</td><td><input type="number" name="id"></td></tr>
		<tr><td>UserName</td><td><input type="text" name="name"></td></tr>
		<tr><td>Mail</td><td><input type="email" name="mail"></td></tr>
		<tr><td>Password</td><td><input type="Password" name="password"></td></tr>
		<tr><th colspan="2" rowspan="2"><input type="submit" name="t6" value="Add"></th></tr>
	</table>
</form>

</center>
<br><br><br><br>
