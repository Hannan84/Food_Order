<?php
include 'db_connection.php';
if (!isset($_SESSION['admin'])){
//    User is not logged in
//    Redirect to login page with massage
    $_SESSION['no-login'] = "Warning!";
    header('location: login.php');

}
?>