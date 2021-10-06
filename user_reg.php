<?php
include 'Front-Back-Conn/user.php';
$obj = new User();
if (isset($_POST['submit'])){
    $obj->userReg();
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Register-Food Order Restaurant</title>
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
        <div class="clearfix"></div>
    </div>
</section>
<!-- Navbar Section Ends Here -->

<div class="form-container">
    <h3 class="text-center">Create an Account</h3>
    <br>
    <?php if (isset($_SESSION['pass_not_match'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['pass_not_match'];?></strong> Password and Confirm Password doesn't match.
        </div>
    <?php unset($_SESSION['pass_not_match']); }?>

    <?php if (isset($_SESSION['pass_8_char'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['pass_8_char'];?></strong> Password must be 8 characters.
        </div>
    <?php unset($_SESSION['pass_8_char']); }?>

    <?php if (isset($_SESSION['not_valid_email'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['not_valid_email'];?></strong> This email is not a valid email address.
        </div>
    <?php unset($_SESSION['not_valid_email']); }?>

    <?php if (isset($_SESSION['exist_email'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['exist_email'];?></strong> This Email is already exist please try another Email.
        </div>
    <?php unset($_SESSION['exist_email']);}?>

    <?php if (isset($_SESSION['regError'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['regError'];?></strong> Registration not complete. Please try again.
        </div>
    <?php unset($_SESSION['regError']);}?>

    <?php if (isset($_SESSION['sendEmail_fail'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['sendEmail_fail'];?></strong> Email sending fail. Please try again.
        </div>
    <?php unset($_SESSION['sendEmail_fail']);}?>
    </br>
    <form action="" method="post">
        <br>
        <div class="order-label">
            <label for="First Name"">First Name: <i class="fas fa-signature"></i></label>
            <input required type="text" class="input-responsive" name="first_name" placeholder="First Name">
        </div>
        <br>
        <div class="order-label">
            <label for="Last Name"">Last Name: <i class="fas fa-signature"></i></label>
            <input required type="text" class="input-responsive" name="last_name" placeholder="Last Name">
        </div>
        <br>
        <div class="order-label">
            <label for="Email"">Email: <i class="fas fa-mail-bulk"></i></label>
            <input required type="text" class="input-responsive" name="email" placeholder="Email">
        </div>
        <br>
        <div class="order-label">
            <label for="Number"">Number: <i class="fas fa-phone"></i></label>
            <input required type="number" class="input-responsive" name="number" placeholder="Number">
        </div>
        <br>
        <div class="order-label">
            <label for="Address"">Address: <i class="fas fa-map-marker-alt"></i></label>
            <textarea required name="address" class="input-responsive" cols="43" rows="7" placeholder="Address"></textarea>
        </div>
        <br>
        <div class="order-label">
            <label for="Password"">Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="input-responsive" name="password" placeholder="Password">
        </div>
        <br>
        <div class="order-label">
            <label for="Confirm Password"">Confirm Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="input-responsive" name="con_password" placeholder="Confirm Password">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Register</button>
        <div class="text-center margin-top">
            Already have an account? <a href="user_login.php" class="a-color">Login here</a>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

    <!--Include social section-->
<?php include 'partial_front/social.php'?>

    <!--include footer section-->
<?php include 'partial_front/footer.php'?>