<?php
  echo 'hello';
	$db = mysqli_connect("localhost:8889", "root", "123", "temp") or die("could not connect to server");
	$skill = $_POST['skill'];
	// $qry = mysqli_query($db, "SELECT id from person;");
// 	if ($qry !== false) {
// 		$value = mysqli_fetch_field($qry);
// 		alert($value);
//   }
	
	$sql ="INSERT INTO tagslist(name,uid)"."values('$skill',1)" ;
	//$sql="insert into ROOMS(L_EMAIL,LOCATION,RENT,ADDRESS,IMAGE,RENTED_TO)"."values('$primary','$locality','$rent','$address','$image',NULL)";


 	$result = $db->query($sql);
 	header("Location: temp1dash.php");

 ?>