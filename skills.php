<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "tutorial"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


$id = $_POST['id'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($con,"SELECT * FROM posts WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM posts WHERE id=".$id;
    mysqli_query($con,$query);
    echo 1;
    exit;
  }
}

echo 0;
exit;