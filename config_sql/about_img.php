
<?php

   $sql = "SELECT * FROM `about_img`"  ;
   $result = mysqli_query($connect, $sql) ;
   $imgData =  mysqli_fetch_assoc($result);
   

?>
