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

// Create condition for update quantity
    if (isset($_POST['qty'])){
        foreach ($_SESSION['myCart'] as $key => $value){
            if ($value['id'] == $id){
                $_SESSION['myCart'][$key]['qty'] = $_POST['qty'];
                header('location: cartView.php');
            }
        }
    }

}

