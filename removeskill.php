

<!-- <!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<h1>bleh bleh bleh</h1>
</body>
</html> -->

<?php
$db = mysqli_connect("localhost:8889", "root", "123", "temp") or die("could not connect to server");


$sid = $_POST['sid'];
$sql ="DELETE FROM tagslist WHERE id='$sid'";


$result = $db->query($sql);
header("Location: temp1dash.php");

?>
<!-- 
<div><?= $sid ?>
       <br>
   </div> -->


