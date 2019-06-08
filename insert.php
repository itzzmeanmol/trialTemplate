

<?php

// Initialize the session
session_start();
$id = $_SESSION['id'];
   // Create database connection
   $db = mysqli_connect("localhost:8889", "root", "123", "temp") or die("could not connect to server");

   // Initialize message variable
   $msg = "";
   $number = count($_POST["name"]);

   if (isset($_POST['firstname'])) {
      $finame = $_POST['firstname'];
      $laname = $_POST['lastname'];
      $image_text = $_POST['image_text'];
      $template = $_POST['template'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $experience = $_POST['experience'];
      $servproject = $_POST['servproject'];
      $jobdesc = $_POST['jobdesc'];
      $atnrec = $_POST['atnrec'];
      $lor = $_POST['lor'];
      $twitter = $_POST['twitter'];
      $gplus = $_POST['gplus'];
      $linkedin = $_POST['linkedin'];
      $github = $_POST['github'];
      $facebook = $_POST['facebook'];
      $number = count($_POST["name"]);

      for ($i = 0; $i < $number; $i++) {
         if (trim($_POST["name"][$i] != '')) {
            $sqli = "INSERT INTO tagslist(name,uid) VALUES('" . mysqli_real_escape_string($db, $_POST["name"][$i]) . "',1)";
            mysqli_query($db, $sqli);
         }
      }
      echo "Data Inserted";


      // Get image name
      $image = $_FILES['image']['name'];
      $directory = date("Y") . '/' . date("m") . '/' . date("d") . '/';
      //If the directory doesn't already exists.

      if (!is_dir($directory)) {
         //Create our directory.
         mkdir($directory, 755, true);
      }
      // image file directory
      $target = $directory . basename($image);

      // fetching user id from users table
      // $fetch = "SELECT id FROM users WHERE"

      // $sql = "INSERT INTO person(fname, sname, image, about, template, address, email,experience) VALUES('$finame','$laname','$image','$image_text','$template','$address','$email','$experience') WHERE id = '1'";
      $sql = "UPDATE person SET fname='$finame', sname='$laname', image='$image', about='$image_text', template='$template', address='$address', email='$email', experience='$experience' WHERE id=$id";
      $query = "UPDATE workperformance SET servproject='$servproject', jobdesc='$jobdesc', atnrec='$atnrec', lor='$lor' where id=$id";
      $qry = "UPDATE social SET twitter='$twitter', gplus='$gplus', linkedin='$linkedin', github='$github', facebook='$facebook' where id=$id";
      // execute query
      mysqli_query($db, $sql);
      mysqli_query($db, $query);
      mysqli_query($db, $qry);




      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
      } else {
         $msg = "Failed to upload image";
      }
      // header('Location: temp1dash.php');
   }

?>
