
<?php

   $sql = "SELECT * FROM `contact_us`"  ;
   
   $result = mysqli_query($connect, $sql) ;

   $contactData =  mysqli_fetch_assoc($result ); 

?>

