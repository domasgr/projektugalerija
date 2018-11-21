<?php
//mysql://be27f95009fb7d:64b660d2@us-cdbr-iron-east-01.cleardb.net/heroku_33338926e8b69c3?reconnect=true
$db = new mysqli('us-cdbr-iron-east-01.cleardb.net', 'be27f95009fb7d', '64b660d2', 'heroku_33338926e8b69c3');
// print_r($db);
if($db->connect_errno != 0){
    die("Error in DB connection $db->connect_error");
} else{
//    echo ("Yes connected!\n");
}

?>