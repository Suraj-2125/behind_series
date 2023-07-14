<?php
session_start();
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
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['U_NAME'])) 
    {
        $username = $_REQUEST['U_NAME'];    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = $_REQUEST['U_PASSWORD'];
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `user` WHERE U_NAME='".$_POST['U_NAME']."'AND U_PASSWORD='".$_POST['U_PASSWORD']."'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['U_NAME'] = $username;
            // Redirect to user dashboard page
            //header("Location: User_home.php");
        }
    }
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Loginstyle.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form name = "f1" onsubmit = "return validation()" method="post">
        <h3>Login Here</h3>
        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="username" name="U_NAME">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="U_PASSWORD">
    
        <button type="submit">Log In</button>
        <div class="credit" align="center">
            <a  href="Register.html">Register Yourself</a>
            <br>
            <a  href="admin_login.php">Admin Panel</a>
        </div>
        
    </form>
    <script>  
            function validation()  
            {  
                var id=document.f1.U_NAME.value;  
                var ps=document.f1.U_PASSWORD.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("Please Enter User Name and Password");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("Please Enter User Name it is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Please Enter Password field it is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>
</body>
</html>
