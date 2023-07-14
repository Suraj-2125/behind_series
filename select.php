<?php
$link = mysqli_connect("localhost", "root", "", "behind_series");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM admin";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
echo "<title>Admin Data</title>";
  echo "
  <link rel='stylesheet' href='tblstyle.css'>";
  echo "<h1 align='Center' style=font-family: Montserrat;'>ADMIN DETAILS</h1>";
    echo "<table cellpadding='0' cellspacing='0' border='0'>";
     echo " <thead>";
        echo "<tr>";
                echo "<th>A_ID</th>";
                echo "<th>A_NAME</th>";
                echo "<th>EMAIL</th>";
                echo "<th>PASSWORD</th>";
                echo "<th>DELETE</th>";
                echo "<th>DELETE</th>";

            echo "</tr>";
      echo "</thead>";
  echo "</div>";
       
                
        while($row = mysqli_fetch_array($result)){
            
                echo "<tr>";
                echo "<td>" . $row['A_ID'] . "</td>";
                echo "<td>" . $row['A_NAME'] . "</td>";
                echo "<td>" . $row['EMAIL'] . "</td>";
                echo "<td>" . $row['PASSWORD'] . "</td>";
                echo "<td><a href='del_Admin.php?id=".$row['A_ID']."'>Delete</a></td>";
                echo "<td><a href='del_Admin.php?id=".$row['A_ID']."'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
                // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>