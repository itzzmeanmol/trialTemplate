$("input[name=template]").on("click", function() {
   var action = "";
   switch($(this).val()) {
     case "1":
       action = 'template1.php';
       break;
     case "2":
       action = 'template2.php';
       break;
   }
   $(this).parent("form").prop("action", action);
 });