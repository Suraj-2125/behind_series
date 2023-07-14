
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
	$sql = "SELECT * FROM users where U_NAME='".$_GET['U_NAME']."'";
$result = mysqli_query($conn,$sql);

?>
<body>

<h2>Browse Users</h2>
<hr>
<table border="1">
<tr>
<td>User ID</td>
<td>Name</td>
<td>Email</td>
<td>Password</td>
<td>MOB</td>
<td>DOB</td>
<td>Update</td>
<td>Delete</td>
<td colspan="2">operations</td>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
echo "<tbody>";
             echo "<tr>";
                echo "<td>" . $row['U_ID'] . "</td>";
                echo "<td>" . $row['U_NAME'] . "</td>";
                echo "<td>" . $row['U_EMAIL'] . "</td>";
                echo "<td>" . $row['U_PASSWORD'] . "</td>";
                echo "<td>" . $row['U_MOB'] . "</td>";
                echo "<td>" . $row['U_DOB'] . "</td>";
                echo "<td><a href='del_user.php?id=".$row['U_ID']."'>Delete</a></td>";
                echo "<td><a href='u_user.php?id=".$row['U_ID']."'>Edit</a></td>";
           
            echo "</tr>";
            echo "</tbody>";
}
?>