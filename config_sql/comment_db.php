<?php

   $sql = "SELECT * FROM `comments`"  ; 

   $result = mysqli_query($connect, $sql) ;

//    $commentData =  mysqli_fetch_assoc($result ); 

    $countComments = mysqli_num_rows($result) ; 

    

?>


