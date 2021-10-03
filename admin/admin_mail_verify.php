<?php
include 'admin_class.php';

$obj = new Admin();
if (isset($_GET['token'])){
    $obj->adminVerify();
}
?>