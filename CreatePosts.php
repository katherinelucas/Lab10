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
  $username = $_POST["username"];
  $content = $_POST["content"];
  $num = rand();

  if($content=="")
  {
    echo"Your content is blank, will not be recorded.</br>";
  }
  else
  {
    $query = "SELECT user_id FROM Users WHERE user_id='$username'";
    $result = mysqli_query($mysqli,$query);

    if($result->num_rows != 0)
    {
      // $sql = "INSERT INTO Posts (post_id, content, author_id) VALUES ('$num', '$content', '$username')";
      $sql = "INSERT INTO Posts (content, author_id) VALUES ('$content', '$username')";
      $result = mysqli_query($mysqli,$sql);
      echo "Saved</br>";
    }
    else
    {
      echo "Invalid username, does not already exists</br>";
    }
  }
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
