<?php
// include FrontBackConn class
include ('Front-Back-Conn/FrontBackConn.php');
include 'Front-Back-Conn/user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Restaurant</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>
<!-- Navbar Section Starts Here -->
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="index.php" title="Logo">
                <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>

        <div class="menu text-right">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="categories.php">Categories</a>
                </li>
                <li>
                    <a href="foods.php">Foods</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <?php
                if (!isset($_SESSION['user'])){?>
                    <li>
                    <a href="user_login.php">Login</a>
                    </li>
                <?php } ?>
                <?php
                if (isset($_SESSION['user'])){
                        if (isset($_SESSION['first_name'])){?>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn" onclick="myFunction()">
                                <i class="fas fa-user-circle"></i> <?php echo $_SESSION['first_name']?> <i class="fas fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content" id="myDropdown">
                                <a href="#">My orders</a>
                                <a href="user_profile.php?id=<?php echo $_SESSION['id']?>">Profile</a>
                                <a href="user_logout.php">Logout</a>
                            </div>
                        </div>
                    </li>
                <?php } }?>
                <li>
                    <a href="index.php"><i class="fas fa-shopping-cart"></i> (0)</a>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Navbar Section Ends Here -->

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
</script>