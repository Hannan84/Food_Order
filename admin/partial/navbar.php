<?php
include 'login-check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website Home Page</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
<!-- Navbar Section Starts Here -->
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="index.php" title="Logo">
                <img src="../images/logo.png" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>

        <div class="menu text-right">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="manage_admin.php">Admin</a>
                </li>
                <li>
                    <a href="manage_category.php">Category</a>
                </li>
                <li>
                    <a href="manage_food.php">Food</a>
                </li>
                <li>
                    <a href="manage_order.php">Order</a>
                </li>
                <li>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</section>

<!-- Navbar Section Ends Here -->