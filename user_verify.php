<?php
include 'Front-Back-Conn/user.php';
$obj = new User();
if (isset($_GET['token'])){
    $obj->updateVerify();
}
?>