<?php
/////////////////////////////////////////
//===== SECURITY HELPERS =====//

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

//===== END SECURITY HELPERS =====//
/////////////////////////////////////////
//===== GENERAL HELPERS =====//

function imagePlaceholder($image=''){
    if (!$image){
        return 'placeholder.jpg';
    } else {
        return $image;
    }
}

function confirmQuery($result) {
    global $connection;
    if(!$result) {
        die("QUERY FAILED ." . mysqli_error($connection));
    }
}

function redirect($location) {
    header("Location:" . $location);
    exit;
}

//===== END GENERAL HELPERS =====//
/////////////////////////////////////////