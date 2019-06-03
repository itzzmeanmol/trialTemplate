<div class='container'>
 <table border='1' >
  <tr style='background: whitesmoke;'>
   <th>S.no</th>
   <th>Title</th>
   <th>Operation</th>
  </tr>

  <?php 
  $query = "SELECT * FROM posts";
  $result = mysqli_query($con,$query);

  $count = 1;
  while($row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $title = $row['title'];
    $link = $row['link'];

  ?>
    <tr>
     <td align='center'><?php echo $count; ?></td>
     <td><a href='<?php echo $link; ?>'><?php echo $title; ?></a></td>
     <td align='center'>
       <span class='delete' id='del_<?php echo $id; ?>'>Delete</span>
     </td>
    </tr>
  <?php
   $count++;
  }
 ?>
 </table>
</div>