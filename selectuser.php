<?php
$link = mysqli_connect("localhost", "root", "", "behind_series");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM user";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
echo "<title>User Data</title>";
        echo "
  <link rel='stylesheet' href='tblstyle.css'>";
echo "<section>";
  echo "<h1 align='Center' style=font-family: Montserrat;'>USER DETAILS</h1>";
    echo "<table cellpadding='0' cellspacing='0' border='0'>";
     echo " <thead>";
        echo "<tr>";
                echo "<th>U_ID</th>";
                echo "<th>U_NAME</th>";
                echo "<th>U_EMAIL</th>";
                echo "<th>U_PASSWORD</th>";
                echo "<th>U_MOB</th>";
                echo "<th>U_DOB</th>";
                echo "<th>DELETE</th>";
                echo "<th>Edit</th>";

            echo "</tr>";
  echo "</div>";
       
        while($row = mysqli_fetch_array($result)){
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
        echo "</table>";
        echo "</div>";
echo "</section>";

echo "<div class='made-with-love'>";
  echo "<a target='_blank' href='select.php'>SHOW ADMIN DATA</a>";
echo "</div>";


    echo "<script src='./a_script.js'></script>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
