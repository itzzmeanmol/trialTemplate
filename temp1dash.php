//TEMP1DASH

<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     header("location: login.php");
     exit;
}
?>
<?php
include("header.php");
?>


<!-- template -->
<?php
$db = mysqli_connect("localhost:8889", "root", "123", "temp") or die("could not connect to server");
$id = $_SESSION['id'];
$result = mysqli_query($db, "SELECT * FROM person WHERE id = $id");
$directory = date("Y") . '/' . date("m") . '/' . date("d") . '/';
while ($row = mysqli_fetch_array($result)) { ?>

     <div class="main">
          <div id="template1-header">

               <img class='rounded-circle' src="<?= $directory . $row['image'] ?>" alt='Card image' id='image_field' style='width:200px;
     height:200px;
     margin-left: 50px;
     margin-top:80px;
     border: 5px solid white; '>
               <div style="display:inline-block; margin-left: 35%; text-align:center; position:sticky; margin-top:20px">
                    <p id='fname_field' style=" color:white; font-size: 40px; display: inline;"><?= $row['fname'] ?></p>
                    <p id='lname_field' style=" color:white; font-size: 40px; display: inline;"><?= $row['sname'] ?></p>
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
          <p style='margin: 0 auto; color:gray; font-size:20px; font-family: Kaushan Script, cursive;
     color:gray; margin-top:0px; width: 80%;
     margin: 1em auto 1em auto;
     text-align: center;
     font-size: 0.8em;' id='text_field'><?= $row['about'] ?></p>
          <hr>
          <div class="row">
               <div class="card work-experience">
                    <div class="card-body">
                         <h3 class="card-title">Work Experience</h3>
                         <strong>Experience:</strong>
                         <p id='experience_field'><?= $row['experience'] ?></p>
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="card work-experience">
                    <div class="card-body">
                         <h3 class="card-title">Personal Info</h3>
                         <strong>Email:</strong>
                         <p id='email_field'><?= $row['email'] ?></p>
                         <strong>Address:</strong>
                         <p id='address_field'><?= $row['address'] ?></p>
                         <strong>Skills:</strong>
                         <!-- <table> -->

                         <?php
                         $db = mysqli_connect("localhost:8889", "root", "123", "temp") or die("could not connect to server");
                         $query = mysqli_query($db, "SELECT * from tagslist;");
                         while ($rws = mysqli_fetch_array($query)) { ?>
                              <!-- <form action=".deleteSkill($conn)." method="POST"> -->
                              <form action="removeskill.php" method="POST" id="removeskill">
                                   <?= $rws['name'] ?> <button type="submit" name="sid" value="<?= $rws['id'] ?>" class="btn btn-danger">X</button>
                              </form>

                         <?php } ?>
                         <script>
                              // e.preventDefault();

                              var formData = new FormData(this);
                              $.ajax({
                                   type: 'POST',
                                   url: 'removeskill.php',
                                   data: formData,
                                   processData: false,
                                   contentType: false,
                                   success: function(response) {

                                   }
                              });
                         </script>
                         <!-- </table> -->

                    </div>

               </div>
          </div>
          <div class="row">
               <div class="card work-experience">
                    <div class="card-body">
                         <h3 class="card-title">Work Performance</h3>
                         <?php $query = mysqli_query($db, "SELECT * FROM workperformance WHERE id = '$id';");
                         while ($rw = mysqli_fetch_array($query)) { ?>
                              <strong>Service Project: </strong><br>
                              <div id='servproject_field' class="dynamic_remove"><?= $rw['servproject'] ?></div><br>
                              <strong>Job Description: </strong><br>
                              <div id='jobdesc_field' class="dynamic_remove"><?= $rw['jobdesc'] ?></div><br>
                              <strong>Attendance Record: </strong><br>
                              <div id='atnrec_field' class="dynamic_remove"><?= $rw['atnrec'] ?></div><br>
                              <strong>Letter of Reccomendation: </strong><br>
                              <div id='lor_field' class="dynamic_remove"><?= $rw['lor'] ?></div>

                         </div>
                    </div>
               </div>



               <!-- Sidebar -->

               <div class="container sidenav">
                    <div id="color-selector">
                         <button id="red" class="spn1 color-btn" onclick="toggle(this)"></button>
                         <button id="orange" class="spn2 color-btn" onclick="toggle(this)"></button>
                         <button id="green" class="spn2 color-btn" onclick="toggle(this)"></button>
                    </div>
                    <form enctype="multipart/form-data" id="frmBox" method="post" role="form" action="insert.php">
                         <fieldset class="form-group">
                              <legend>Personal Info</legend>
                              <div><input type="text" name="firstname" id="fname" placeholder="First Name" class="file form-control" value="<?= $row['fname'] ?>"></div>
                              <div><input type="text" name="lastname" id="lname" placeholder="Last Name" class="file form-control" value="<?= $row['sname'] ?>"></div>
                              <div><input type="text" name="address" placeholder="Your address..." id="address" class="file form-control" value="<?= $row['address'] ?>"></div>
                              <div><input type="text" name="email" placeholder="Your Email" id="email" class="file form-control" value="<?= $row['email'] ?>"></div>
                              <div><input type="file" name="image" id="image" class="file form-control mb-3" value="<?= $directory . $row['image'] ?>"></div>
                         </fieldset>
                         <fieldset class="form-group">
                              <legend>Work Performance</legend>
                              <div><input type="text" name="servproject" id="servproject" placeholder="Service Project" value="<?= $rw['servproject'] ?>" class="file form-control"></div>
                              <div><input type="text" name="jobdesc" id="jobdesc" placeholder="Job Description" value="<?= $rw['jobdesc'] ?>" class="file form-control"></div>
                              <div><input type="text" name="atnrec" id="atnrec" placeholder="Attendance Record" value="<?= $rw['atnrec'] ?>" class="file form-control"></div>
                              <div><input type="text" name="lor" id="lor" placeholder="Letter of Recomendations" value="<?= $rw['lor'] ?>" class="file form-control"></div>
                         </fieldset>

                         <fieldset class="form-group">
                              <legend>Experience</legend>
                              <div><textarea id="text" cols="30" rows="4" name="image_text" class="file form-control" placeholder="Tagline..."><?= $row['about'] ?></textarea></div>

                              <div><textarea id="experience" cols="30" rows="4" name="experience" class="file form-control" placeholder="Experience..."><?= $row['experience'] ?></textarea></div>
                              <h3 id="success"></h3>
                              <table class="form-control" id="dynamic_field">
                                   <tr>
                                        <td><input type="text" name="name[]" placeholder="Add Skills" class="form-control name_list" required="" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>
                                   </tr>
                              </table>
                         </fieldset>
                         <br>
                         <input type="radio" value="1" name="template" style="margin-left: 15px;" class="file" checked>&nbsp; Template 1 &nbsp; &nbsp;
                         <input type="radio" value="2" name="template" class="file">&nbsp; Template 2
                         <br>
                         <br>


                         <input type="submit" name="upload" class="sub-btn btn btn-success form-control" value="submit" id="upload">
                         <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                    </form>

                    <script type="text/javascript">
                         var i = 1;
                         $('#add').click(function() {
                              i++;
                              $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

                         });
                         $(document).on('click', '.btn_remove', function() {
                              var button_id = $(this).attr("id");
                              $('#row' + button_id + '').remove();
                         });
                         $('document').ready(function() {


                              // $('#upload').click(function(e){
                              $('#frmBox').submit(function(e) {
                                   e.preventDefault();
                                   var formData = new FormData(this);
                                   $.ajax({
                                        type: 'POST',
                                        url: 'insert.php',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(response) {
                                             alert(response);
                                             i = 1;
                                             $('.dynamic-added').remove();
                                             $('#add_name')[0].reset();
                                             alert('Record Inserted Successfully.');
                                        }
                                   });
                              });
                         });
                    </script>




                    <form method="POST" action="template1.php">
                         <button type="submit" class="form-control btn btn-info" name="preview">Preview</button>
                    </form>
               </div>

          <?php } ?>
     <?php } ?>
     <script>
          $(document).ready(function() {
               // First Name update
               $('#fname').keyup(function() {
                    $('#fname_field').text($('#fname').val());
               });

               // Last Name update
               $('#lname').keyup(function() {
                    $('#lname_field').text($('#lname').val());
               });
               // Address update
               $('#address').keyup(function() {
                    $('#address_field').text($('#address').val());
               });
               // Email update
               $('#email').keyup(function() {
                    $('#email_field').text($('#email').val());
               });

               function readURL(input) {
                    if (input.files && input.files[0]) {
                         var reader = new FileReader();
                         reader.onload = function(e) {
                              $('#image_field').attr('src', e.target.result);
                         }
                         reader.readAsDataURL(input.files[0]);
                    }
               }
               $("#image").change(function() {
                    readURL(this);
               });

               // About update
               $('#text').keyup(function() {
                    $('#text_field').text($('#text').val());
               });
               $('#experience').keyup(function() {
                    $('#experience_field').text($('#experience').val());
               });


               $('#servproject').keyup(function() {
                    $('#servproject_field').text($('#servproject').val());
               });
               $('#jobdesc').keyup(function() {
                    $('#jobdesc_field').text($('#jobdesc').val());
               });
               $('#atnrec').keyup(function() {
                    $('#atnrec_field').text($('#atnrec').val());
               });
               $('#lor').keyup(function() {
                    $('#lor_field').text($('#lor').val());
               });

          });
     </script>
     <script src="color-selector.js" type="text/javascript"></script>

     <h3><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></h3>
     </body>

     </html>