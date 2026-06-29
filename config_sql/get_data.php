

<?php

//  ex :  string $mealName , string $tableName , string $imgName , string $description , int $price 

function  getQueryData ( string $tableName  , $where = '' )  : array {
  //  int $limitRecord = 1  for limit later if need ... 
    global  $connect ;

      // Whitelist allowed =>  tables can pass 
   $allowedTables = [ 
    'website_settings',   // Website settings
    'about',              // About page
    'hero',               // Hero slider
    'services',           // Services
    'experience_gallery', // Experience gallery
    'experience_info',    // Experience info
    'my_projects',        // Projects
    'feedback',           // Feedback
    'contact_info',       // Contact info       
];



    if (! in_array($tableName, $allowedTables)) {
       error_log("Invalid table: $tableName");
        // die("invalid  table");
        return ['error' => 'Invalid table'];
    } 

    // fix later for specific column 
    
    $stmt = $connect->prepare("SELECT  *  FROM   $tableName  $where ");
   
    //  $stmt->bind_param("i", $where);
    $stmt->execute();

    // fill whole array 
    $queryData = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
   

    return $queryData  ?: ['empty'=>'array is empty']  ; 

}


function getSingleQueryData(string $tableName, $where = '') : array {
    global $connect;

    // Whitelist allowed tables
    $allowedTables = [ 
        'website_settings',   // Website settings
        'about',              // About page
        'hero',               // Hero slider
        'services',           // Services
        'experience_gallery', // Experience gallery
        'experience_info',    // Experience info
        'my_projects',        // Projects
        'feedback',           // Feedback
        'contact_info',       // Contact info       
    ];

    if (!in_array($tableName, $allowedTables)) {
        error_log("Invalid table: $tableName");
        return ['error' => 'Invalid table'];
    }

    $stmt = $connect->prepare("SELECT * FROM $tableName $where");
    $stmt->execute();

    // Fetch single record (assoc)
    $queryData = $stmt->get_result()->fetch_assoc();

    return $queryData ?: ['empty' => 'No record found'];
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

