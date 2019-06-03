<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Form</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
         <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
         <link href="style.css" rel="stylesheet" type="text/css">
         
   </head>
   <body id="body-back">
      <div class="container">
         <form method="GET" action="" enctype="multipart/form-data" id="form">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <input class="form-control" type="text" name="firstname" placeholder="First name">
                  </div> 
                  <br>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <input class="form-control" type="text" name="lastname" placeholder= "Last name">
                  </div>
                  <br>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                     <input class="form-control" type="text" name="address" placeholder="Your address...">
                  </div>
                  <br>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                     <input class="form-control" type="text" name="email" placeholder="Your email...">
                  </div>
                  <br>
                  <div class="form-group">
                     <textarea id="text" cols="40" rows="4" name="experience" placeholder="Experience..." class="form-control"></textarea>
                  </div> 
                  
                  <div class="form-group">
                     <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Say something about this image..." class="form-control"></textarea>
                  </div> 
                  <div class="custom-file mb-3">
                     <input type="file" class="custom-file-input" id="customFile" name="image">
                     <label class="custom-file-label" for="customFile">Choose Image</label>
                  </div>

                  
                  <br>
      
            
               <input type="radio" value="1" name="template">&nbsp;Template 1 &nbsp; &nbsp;&nbsp;
               <input type="radio" value="2" name="template">&nbsp;Template 2
            
            <br>
            <br>

      
      <button type="submit" name="upload" class="btn btn-primary" style="width:100%;">SUBMIT</button>      
         
   </form>
</div>


<script src="dashselector.js" type="text/javascript"></script>
<script>
   // Add the following code if you want the name of the file appear on select
   $(".custom-file-input").on("change", function() {
     var fileName = $(this).val().split("\\").pop();
     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
   </script>   
</body>
</html>