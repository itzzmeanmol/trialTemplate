$("input[name=template]").on("click", function() {
   var action = "";
   switch($(this).val()) {
     case "1":
       action = 'temp1dash.php';
       break;
     case "2":
       action = 'temp2dash.php';
       break;
   }
   $(this).parent("form").prop("action", action);
 });