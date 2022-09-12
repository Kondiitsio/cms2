<?php ob_start(); ?>
<?php include "../includes/db.php" ?>
<?php include "functions.php" ?>
<?php session_start(); ?>


<?php 
    if(isset($_SESSION['user_role'])) {
    } else {
    header("location: /cms2/login.php");
    }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="/cms2/css/styles.css">
    <link rel="stylesheet" href="/cms2/css/vendor/summernote-lite.css">
</head>





