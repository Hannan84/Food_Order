<?php
session_start();
// Get data from form
$id = $_GET['id'];
$image = $_POST['image'];
$title = $_POST['title'];
$price = $_POST['price'];
$quantity = $_POST['qty'];
$description = $_POST['description'];

// insert data into session for add to cart
if (isset($_GET['id'])){

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
// update session value for added quantity to get individual id
if ((isset($_GET['id'])) and (isset($_GET['Addition']) == 'add') and isset($_POST['qty_add'])){
    $_SESSION['myCart'][$id] = array('id' => $id,'image' => $image,'title' => $title,'price' => $price,'qty' => $quantity+1,'description' => $description);
    header('location: cartView.php');
}
elseif ((isset($_GET['id'])) and (isset($_GET['Subtraction']) == 'sub') and isset($_POST['qty_sub'])){
    $_SESSION['myCart'][$id] = array('id' => $id,'image' => $image,'title' => $title,'price' => $price,'qty' => $quantity-1,'description' => $description);
    header('location: cartView.php');
}
