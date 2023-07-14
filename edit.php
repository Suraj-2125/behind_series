<?php
if(!isset($_GET['uid']) || !ctype_digit($_GET['uid'])){
header("location:index.html");
exit();
}
require_once('DB_Connection.php');
$sql = "SELECT * FROM users WHERE uid =".$_GET['uid'];
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
</head>
<body>
<div>
<h2>Edit Users</h2>
<hr>
<table>
<form action="process_edit_user.php" method="POST">
<tr>
<input type="hidden" name="id" value="<?php echo 
$_GET['uid'];?>">
<td>
<label>First Name:</label>
<input type="text" name="txtfname" value="<?php echo 
$row["firstname"];?>">
</td>
<td>
<label>Last Name:</label>
<input type="text" name="txtlname" value="<?php echo 
$row["lastname"];?>">
</td>
<td>
<label>Email:</label>
<input type="text" name="txtemail" value="<?php echo 
$row["email"];?>">
</td>
<td>
<label>Upload:</label>
<input type="submit" name="submit" value="save 
&rarr;">
</td>
</tr>
</form>
</table>
</div>
</body>
</html>
