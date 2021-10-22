<?php
session_start();

if (isset($_GET['id'])){
    unset($_SESSION['id']);
    header('location: cartView.php');
}