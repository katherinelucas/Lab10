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
// $content = $_POST["content"];
// $result = mysqli_query($mysqli,"SELECT post_id FROM Posts WHERE content='$content'");

// echo '<table border=\"1\">';
// while($row = mysqli_fetch_array($result))
// {
//     echo "<tr>";
//     echo "<td>".$row['post_id']."</td>";
//     echo "</tr>";
// }
// echo '</table>';

// if(isset($_POST['submit']))
// {
  // $checkbox = $_POST['checkbox'];
  // echo '<table border=\"1\">';
  // for($i=0;$i<count($checkbox);$i++)
  // {
  //   $del_id=$_POST['checkbox'][$i];
    // echo "<tr>";
    // echo "$del_id";
    // echo "</tr>";
  //   $sql = "DELETE FROM Posts WHERE post_id=".$del_id;
  //   $result = mysqli_query($mysqli, $sql);
  // }
  // if(isset($_POST['checkbox']))
  // {
  //   foreach($_POST['checkbox'] as $selected)
  //   {
  //     echo "$selected ";
  //     $sql = "DELETE FROM Posts WHERE post_id= $selected";
  //     $result = mysqli_query($mysqli, $sql);
  //   }
  // }
// }
// echo '</table>';
// $checkbox = $_POST['checkbox'];
// echo '<table border=\"1\">';
// foreach ($checkbox as $id => $val)
// {
//   echo "<tr>";
//   echo "<td>".$id."</td>";
//   echo "</tr>";
// }
// echo '</table>';

echo "Post id's to be deleted:";
$checkbox = $_POST['checkbox'];
echo '<table border=\"1\">';
if(isset($_POST['checkbox']))
{
  foreach ($_POST['checkbox'] as $id)
  {
    echo "<tr>";
    echo "<td>".(int)$id."</td>";
    echo "</tr>";
  }
}
echo '</table>';

if(isset($_POST['checkbox']))
{
  foreach ($_POST['checkbox'] as $delid)
  {
    $delid = (int)$delid;
    $query= "DELETE FROM Posts WHERE post_id = $delid";
    $result= mysqli_query($mysqli, $query);
  }
}

// $cheks = implode("','", $_POST['checkbox']);
// $result = mysqli_query($mysqli,"SELECT post_id FROM Posts WHERE post_id in ('$cheks')");
// echo '<table border=\"1\">';
// while($row = mysqli_fetch_array($result))
// {
//     echo "<tr>";
//     echo "<td>".$row['post_id']."</td>";
//     echo "</tr>";
// }
// echo '</table>';
//
// $sql = "DELETE FROM Posts WHERE post_id in ('$cheks')";
// $result = mysqli_query($mysqli, $sql);

// $result->free();
$mysqli->close();
?>
