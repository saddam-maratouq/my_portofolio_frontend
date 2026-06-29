

<?php

//  ex :  string $mealName , string $tableName , string $imgName , string $description , int $price 

function  getQueryData ( string $tableName  , $where = '' )  : array {
  //  int $limitRecord = 1  for limit later if need ... 
    global  $connect ;

      // Whitelist allowed =>  tables can pass 
    $allowedTables = [ 
      'website_settings', 'main_slider', 'offer_meal' ,  
       'menu_pizza' , 
       'menu_burger' ,
       'menu_pasta' ,
       'menu_fries' ,
       'about',
       'feed_back' ,
       'contact_us',
       'cart_item',
       'restaurant_tables' , 
       'bookings'
    ]; // add new table name here  
    
    if (! in_array($tableName, $allowedTables)) {
       error_log("Invalid table: $tableName");
        // die("invalid  table");
        return ['error' => 'Invalid table'];
    } 

    // fix later for injiction sql need refactor code ... 
    
    $stmt = $connect->prepare("SELECT  *  FROM   $tableName  $where ");
   
    //  $stmt->bind_param("i", $where);
    $stmt->execute();

    // fill whole array 
    $queryData = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
   

    return $queryData  ?: ['empty'=>'array is empty']  ; 

}



function getQueryDataByDynamicColum(string $tableName, string $whereColumn = '', $whereValue = '', string $whereType = 'i') {
    
  global $connect;
    
    // Build query with placeholder
    $sql = "SELECT * FROM $tableName";
    
    if (!empty($whereColumn)) {
        $sql .= " WHERE $whereColumn = ?";
        // echo     $sql ;
    }
    
    $stmt = $connect->prepare($sql);
    
    if (!empty($whereColumn)) {
        $stmt->bind_param($whereType, $whereValue);
    }
    
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC) ;
}

// Usage:
// $cartItems = getQueryData('cart_item', 'id', 8, 'i');
// Result: SELECT * FROM cart_item WHERE id = 8







?>

