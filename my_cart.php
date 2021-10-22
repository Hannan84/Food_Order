<?php
session_start();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $image = $_POST['image'];
    $title = $_POST['title'];
    $price = $_POST['price'];
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
        $_SESSION['myCart'][$id] = array($id,$image,$title,$price,$description);
        header('location: index.php');
    }


}