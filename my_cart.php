<?php
session_start();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $image = $_POST['image'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['qty'];
    $description = $_POST['description'];

    if (isset($_SESSION['myCart'][$id])){
        echo "
        <script>
        alert('product already added');
        window.location.href = 'index.php';
        </script> 
        ";
    }
    else{
        $_SESSION['myCart'][$id] = array('id' => $id,'image' => $image,'title' => $title,'price' => $price,'qty' => $quantity,'description' => $description);
        header('location: index.php');
    }


}