<?php
session_start();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['myCart'][$id]);
    header('location: cartView.php');
}