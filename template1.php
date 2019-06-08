<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
include("header.php");
?>


<?php

$db = mysqli_connect("localhost:8889", "root", "123", "temp") or die("could not connect to server");
$id = $_SESSION['id'];
$result = mysqli_query($db, "SELECT * FROM person WHERE id = $id");

$directory = date("Y") . '/' . date("m") . '/' . date("d") . '/';
while ($row = mysqli_fetch_array($result)) { ?>

  <div class="container">
    <div id="template1-header">
      <img class='rounded-circle' src="<?= $directory . $row['image'] ?>" alt='Card image' id='image_field' style='width:200px; 
                      height:200px;  
                      margin-left: 50px; 
                      margin-top:80px; 
                      border: 5px solid white; '>
      <div style="display:inline-block; margin-left: 500px; text-align:center; position:sticky; margin-top:30px">
        <p id='fname_field' style=" color:white; font-size: 40px; display: inline; postiion: fixed;"><?= $row['fname'] ?></p>
        <p id='lname_field' style=" color:white; font-size: 40px; display: inline; postiion: fixed;"><?= $row['sname'] ?></p>
        <p style='margin: 0 auto; color:gray; font-size:20px; color:wheat; margin-top:0px;'>
                         <ul class="social list-inline">
                         <?php $query = mysqli_query($db, "SELECT * FROM social WHERE id = '$id' ;");
                                   while ($rw = mysqli_fetch_array($query)) { ?>
                                        <li class="list-inline-item"><a href="<?= $rw['twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="<?= $rw['gplus'] ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li class="list-inline-item"><a href="<?= $rw['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="<?= $rw['github'] ?>" target="_blank"><i class="fab fa-github-alt"></i></a></li>
                                        <li class="list-inline-item last-item"><a href="<?= $rw['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                   <?php } ?>
                         </ul>
                    </p>

      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class=".CV-introBlurb">

    </div>
    <p style='margin: 0 auto; color:gray; font-size:20px; font-family: Kaushan Script, cursive;
                      color:gray; margin-top:0px; width: 80%;
                      margin: 1em auto 1em auto;
                      text-align: center;
                      font-size: 0.8em;' id='text_field'><?= $row['about'] ?></p>
    <hr>
    <div class="row">
      <!-- <div class="col-sm-12 work-experience"> -->
      <div class="card work-experience">
        <div class="card-body">
          <h3 class="card-title">Work Experience</h3>
          <strong>Experience:</strong>
          <p id='experience_field'><?= $row['experience'] ?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- <div class="col-sm-12 work-experience"> -->
      <div class="card work-experience">

        <div class="card-body">
          <h3 class="card-title">Personal Info</h3>
          <strong>Email:</strong>
          <p id='email_field'><?= $row['email'] ?></p>
          <strong>Address:</strong>
          <p id='address_field'><?= $row['address'] ?></p>

          <!-- printing here  -->
          <strong>Skills:</strong>
          <?php $query = mysqli_query($db, "SELECT name FROM tagslist");

          while ($rw = mysqli_fetch_array($query)) { ?>
            <p id='address_field'><?= $rw['name'] ?></p>
          <?php } ?>


        </div>
      </div>
    </div>
    <div class="row">
               <div class="card work-experience">
                    <div class="card-body">
                         <h3 class="card-title">Work Performance</h3>
                         <?php $query = mysqli_query($db, "SELECT * FROM workperformance WHERE id = '$id';");
                         while ($rw = mysqli_fetch_array($query)) { ?>
                              <div id='servproject_field' class="dynamic_remove"><strong>Service Project: </strong><br><?= $rw['servproject'] ?></div><br>
                              <div id='jobdesc_field' class="dynamic_remove"><strong>Job Description: </strong><br><?= $rw['jobdesc'] ?></div><br>
                              <div id='atnrec_field' class="dynamic_remove"><strong>Attendance Record: </strong><br><?= $rw['atnrec'] ?></div><br>
                              <div id='lor_field' class="dynamic_remove"><strong>Letter of Reccomendation: </strong><br><?= $rw['lor'] ?></div>
                         <?php } ?>
                         
                    </div>
               </div>
          </div>
  </div>



  </div>


  <form method="POST" action="temp1dash.php">
    <button class="btn btn-primary">Dashboard</button>
  </form>
  </div>

<?php } ?>

<h3><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></h3>

</body>