<html>
   <head>
      
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
      <title>Template1 Dashboard</title>
   </head>
   <div class="template1">
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
              echo "<img id='image_field' src='".$directory."/".$row['image']."'  style='width:200px; height:200px;'>";
              echo "<p id='text_field'>".$row['about']."</p>";
              echo "<p id='fname_field'>".$row['fname']."</p>";
              echo "<p id='lname_field'>".$row['sname']."</p>";
              echo "<p id='address_field'>".$row['address']."</p>";
            echo "</div>";
          }
      ?>
      
      </div>
      <br>
      <br>
      <br>
        
      <div class="container form">
         <form method="POST" action="" enctype="multipart/form-data">
                  First Name
                  <input type="text" name="firstname" id="fname">
               
                  Last Name
                  <input type="text" name="lastname" id="lname">
               
                  Address
                  <input type="textarea" name="address" cols="30" rows="3" placeholder="Your address..." id="address">
               
                  Image
                  <!-- <input type="hidden" name="size" value="1000000"> -->
                  <input type="file" name="image" id="image">
               
               
                  About
                  <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Say something about this image..."></textarea>
   
            
                  Template
                  <input type="radio" value="1" name="template">Template 1
                  <input type="radio" value="2" name="template">Template 2</td>
         

            
            <button type="submit" name="upload">Preview</button>      
            
         </form>
         
         <script>
          $(document).ready(function(){
            // First Name update  
            $('#fname').keyup(function(){
                $('#fname_field').text($('#fname').val());
            });

            // Last Name update  
            $('#lname').keyup(function(){
                $('#lname_field').text($('#lname').val());
            });
            // Address update  
            $('#address').keyup(function(){
                $('#address_field').text($('#address').val());
            });
            // Image update  
            // $('#image').keyup(function(){
            //     $('#image_field').text($('#image').val());
            // });

            function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_field').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
              }
            }
            $("#image").change(function(){
              readURL(this);
            });

            // About update  
            $('#text').keyup(function(){
                $('#text_field').text($('#text').val());
            });
            

          });

        </script>
        <script src="form.js" type="text/javascript"></script>
      
</html>