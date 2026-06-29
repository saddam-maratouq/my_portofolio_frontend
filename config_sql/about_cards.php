
<?php

   $sql = "SELECT * FROM `about_cards`"  ;
   $result = mysqli_query($connect, $sql) ;

   // $aboutData =  mysqli_fetch_assoc($result);

   $aboutData = mysqli_fetch_all($result, MYSQLI_ASSOC); //  Fetches ALL rows! not only first one as array 


?>

