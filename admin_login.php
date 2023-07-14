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
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['A_NAME'])) 
    {
        $username = $_REQUEST['A_NAME'];    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = $_REQUEST['PASSWORD'];
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE A_NAME='".$_POST['A_NAME']."'AND PASSWORD='".$_POST['PASSWORD']."'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['A_NAME'] = $username;
            // Redirect to user dashboard page
            header("Location: selectuser.php");
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
        <label for="username">Admin Name</label>
        <input type="text" placeholder="Name" id="username" name="A_NAME">
        <label for="password">Admin Password</label>
        <input type="password" placeholder="Password" id="password" name="PASSWORD">
    
        <button type="submit">Log In</button>
        
    </form>
    <script>  
            function validation()  
            {  
                var id=document.f1.A_NAME.value;  
                var ps=document.f1.PASSWORD.value;  
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
