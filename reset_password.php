<?php
include 'Front-Back-Conn/user.php';
if (!isset($_SESSION['email'])){
    header("Location:recover_email.php");
}
$obj = new User();
if (isset($_POST['submit'])){
    $obj->resetPassword();
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

    <title>Reset Password-Food Order Restaurant</title>
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
    <h3 class="text-center">Reset Your Password</h3>
    <br>

    <?php if (isset($_SESSION['sendEmail'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['sendEmail']?></strong> Check your email we sent you a link to Reset Password.
        </div>
    <?php unset($_SESSION['sendEmail']); }?>

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

    <form action="" method="post">
        <br>
        <div class="order-label">
            <label for="Password">Password : * </label><br>
            <input required type="password" class="input-responsive" name="password" placeholder="Password">
        </div>
        <br>
        <div class="order-label">
            <label for="Confirm Password">Confirm Password : * </label><br>
            <input required type="password" class="input-responsive" name="con_password" placeholder="Confirm Password">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Reset Password</button>
        <div class="text-center margin-top">
            <a href="user_login.php" class="a-color"><i class="fas fa-arrow-left"></i>Back to login</a>
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