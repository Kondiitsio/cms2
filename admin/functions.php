<?php
/////////////////////////////////////////
//===== SECURITY HELPERS =====//

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function ifItIsMethod($method=null){
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
        return true;
    }
    return false;
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
//===== USER HELPERS =====//

function login_user($username, $password){
    global $connection;

    $username = trim($username);
    $password = trim($password);

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_role = $row['user_role'];

        if(password_verify($password,$db_user_password)) {
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['user_role'] = $db_user_role;
    
            redirect("/cms2/admin");
        } else {
            return false;
        }
    }
    return true;
}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null) {
    if(isLoggedIn()){
        redirect($redirectLocation);
    }
}

function isLoggedIn(){
    if(isset($_SESSION['user_role'])) {
        return true;
    }
    return false;
}

function getLoggedInUsername(){
    return isset ($_SESSION['username']) ? $_SESSION['username'] : null;
}

//===== END USER HELPERS =====//
/////////////////////////////////////////