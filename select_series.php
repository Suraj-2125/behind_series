<?php
$link = mysqli_connect("localhost", "root", "", "behind_series");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM series";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
echo "<title>Admin Data</title>";
  echo "<link rel='stylesheet' type='text/css' href='a_style.css'>";
echo "<section>";
  echo "<!--for demo wrap-->";
  echo "<h1>ADMIN DETAILS</h1>";
  echo "<div class='tbl-header'>";
    echo "<table cellpadding='0' cellspacing='0' border='0'>";
     echo " <thead>";
        echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>SERIES_NAME</th>";
                echo "<th>S_DESCRIPTION</th>";
                echo "<th>P_ID</th>";
                echo "<th>Genere</th>";
                echo "<th>type</th>";

            echo "</tr>";
      echo "</thead>";
    echo "</table>";
  echo "</div>";
  echo "<div class='tbl-content'>";
    echo "<table cellpadding='0' cellspacing='0' border='0'>";
      echo "<tbody>";
       
                
        while($row = mysqli_fetch_array($result)){
            echo "<tbody>";
                echo "<tr>";
                echo "<td>" . $row['S_ID'] . "</td>";
                echo "<td>" . $row['SERIES_NAME'] . "</td>";
                echo "<td>" . $row['S_DESCRIPTION'] . "</td>";
                echo "<td>" . $row['P_ID'] . "</td>";
                echo "<td>" . $row['Genere'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td><a href='del_Admin.php?id=".$row['S_ID']."'>Delete</a></td>";
                echo "<td><a href='del_Admin.php?id=".$row['S_ID']."'>Edit</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
        echo "</div>";
echo "</section>";

echo "<div class='made-with-love'>";
  echo "<a target='_blank' href='selectuser.php'>SHOW USER DATA</a>";
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
 
// Close connection
mysqli_close($link);
?>