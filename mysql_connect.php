<?php
$db = new mysqli('localhost', 'root', 'root', 'projects');
// print_r($db);
if($db->connect_errno != 0){
    die("Error in DB connection $db->connect_error");
} else{
//    echo ("Yes connected!\n");
}

?>