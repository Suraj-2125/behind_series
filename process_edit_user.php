<?php
if (empty($_POST)) {
header("location:index.html");
exit();
}
$error = array();
if (empty($_POST['txtfname'])) {
$error[] = "first name is empty";
}
if (empty($_POST['txtlname'])) {
$error[] = "last name is empty";
}
if (empty($_POST['txtemail'])) {
$error[] = "Email is empty";
}
if(!empty($error)){
echo "Error messages"."<hr>";
foreach ($error as $e) {
echo $e."<br>";
}
exit();
}
//database connectivity
require_once('DB_Connection.php');
$sql = "UPDATE users SET firstname='".$_POST['txtfname']."', lastname='".$_POST['txtlname']."',email='".$_POST['txtemail']."' WHERE uid 
=".$_POST['id'];

if(mysqli_query($conn,$sql)){
echo "updated table successfully";
}else{
echo "error in updating table".mysqli_connect_error($conn);
}
header("location:selectAll.php");
mysqli_close($conn);
?>