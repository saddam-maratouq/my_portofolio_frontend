
<?php

   $sql = "SELECT * FROM `footer` "  ; 

   $footerResult = mysqli_query($connect, $sql) ;

   $footerData =  mysqli_fetch_assoc($footerResult ); 

  
  
// print_r( $footer_data) ;
   
/*  <?=  htmlspecialchars( $footer_data ['title']) ?>  */ 

// <!-- Our-Servese.png -->


 
 ?> 





