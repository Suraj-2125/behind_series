<?php
$link = mysqli_connect("localhost", "root", "", "behind_series");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM provider";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,500,300,700,400'><link rel='stylesheet' href='showstyle.css'>";
echo "<div class='aa_htmlTable'>";
echo "<h2 class='aa_h2'>PROVIDER DATA</h2>";
        echo "<table>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>P_ID</th>";
                echo "<th>P_NAME</th>";
                echo "<th>P_INFO</th>";
                echo "<th>DELETE</th>";
                echo "<th>EDIT</th>";

            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tbody>";
             echo "<tr>";
                echo "<td>" . $row['P_ID'] . "</td>";
                echo "<td>" . $row['P_NAME'] . "</td>";
                echo "<td>" . $row['P_INFO'] . "</td>";
                echo "<td><a href='del_pdata.php?id=".$row['P_ID']."'>Delete</a></td>";
                echo "<td><a href='u_user.php?id=".$row['P_ID']."'>Edit</a></td>";
           
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
