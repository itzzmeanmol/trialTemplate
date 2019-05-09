<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Form</title>
      <link href="style.css" rel="stylesheet" type="text/css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css">
   </head>
   <body>
      <div class="container form">
         <form method="POST" action="" enctype="multipart/form-data">
                  First Name
                  <input type="text" name="firstname">
               
                  Last Name
                  <input type="text" name="lastname">
               
                  Address
                  <input type="textarea" name="address" cols="30" rows="3" placeholder="Your address..." >
               
                  Image
                  <input type="hidden" name="size" value="1000000"><input type="file" name="image">
               
               
                  About
                  <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Say something about this image..."></textarea>
   
            
                  Template
                  <input type="radio" value="1" name="template">Template 1
                  <input type="radio" value="2" name="template">Template 2</td>
         

            
            <button type="submit" name="upload">POST</button>      
               
         </form>
      </div>
      <script src="dashselector.js" type="text/javascript"></script>
      
   </body>
</html>