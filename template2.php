

<head>
   <title>Template 1</title>
   <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
  // Create database connection
  $db = mysqli_connect("localhost:8889","root","123","temp") or die("could not connect to server");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $finame=$_POST['firstname'];
    $laname=$_POST['lastname'];
    $image_text = $_POST['image_text'];
    $template = $_POST['template'];
    $address = $_POST['address'];
    
  	// Get image name
  	$image = $_FILES['image']['name'];
  	$directory = date("Y").'/'.date("m").'/'.date("d").'/';
    //If the directory doesn't already exists.
    if(!is_dir($directory)){
        //Create our directory.
        mkdir($directory, 755, true);
    }
  	// image file directory
  	$target = $directory.basename($image);


  	$sql = "UPDATE person SET fname='$finame', sname='$laname', image='$image', about='$image_text', template='$template', address='$address' where id=1";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
    }
    else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM person");
?>

<?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
         echo "<p>".$row['fname']."</p>";
         echo "<p>".$row['sname']."</p>";
      	echo "<img src='".$directory."/".$row['image']."'  style='width:200px; height:200px;'>";
        echo "<p>".$row['about']."</p>";
        echo "<p>".$row['address']."</p>";
      echo "</div>";
    }
?>

   </body>