<?php

$db['db_host'] = "DB host";
$db['db_user'] = "DB user name";
$db['db_pass'] = "DB password";
$db['db_name'] = "DB name";

foreach($db as $key => $value) {
define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$query = "SET NAMES utf8";
mysqli_query($connection, $query);

// uncomment this to see if you are connected
//  if($connection) {
//     echo "We are connected";
// } 


?>
