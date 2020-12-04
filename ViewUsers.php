<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "katielucas", "Pairaiy9",
"katielucas");
/* check connection */
if ($mysqli->connect_errno)
{
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$result = mysqli_query($mysqli,"SELECT user_id FROM Users");

echo '<table border=\"1\">';
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>".$row['user_id']."</td>";
    echo "</tr>";
}
echo '</table>';

$query = "SELECT user_id";
if ($result = $mysqli->query($query))
{
 /* fetch associative array */
 while ($row = $result->fetch_assoc())
 {
   printf ("%s (%s)\n", $row["user_id"]);
 }
 /* free result set */
 $result->free();
}
/* close connection */
$mysqli->close();
?>
