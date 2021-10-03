<?php
include 'Front-Back-Conn/user.php';
if (isset($_SESSION['user'])){
    header("Location:index.php");
}
$obj = new User();
if (isset($_POST['submit'])){
    $obj->userLogin();
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

    <title>Login-Food Order Restaurant</title>
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

<div class="login">
    <h3 class="text-center">Welcome Back!</h3>
    <p class="text-center">Sign up or log in to continue</p>
    <br>

    <?php if (isset($_SESSION['regSuccess'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['regSuccess']?></strong> Registration Successful, Please Login.
        </div>
    <?php unset($_SESSION['regSuccess']); }?>

    <?php if (isset($_SESSION['sendEmail'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['sendEmail']?></strong> Check your email we sent you a link to verify account.
        </div>
    <?php unset($_SESSION['sendEmail']); }?>

    <?php if (isset($_SESSION['loginError'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['loginError'];?></strong> Wrong Email and Password.
        </div>
    <?php unset($_SESSION['loginError']); }?>

    <?php if (isset($_SESSION['verified'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['verified'];?></strong> Your account is verified, Now you can login.
        </div>
    <?php unset($_SESSION['verified']); }?>

    <?php if (isset($_SESSION['reset_pass'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['reset_pass'];?></strong> Password successfully change.
        </div>
    <?php unset($_SESSION['reset_pass']); }?>

    <form action="" method="post">
        <br>
        <div class="form-group">
            <label for="Email"">Email: <i class="fas fa-mail-bulk"></i></label><br>
            <input required type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <br>
        <div class="form-group">
            <label for="Password"">Password: <i class="fas fa-key"></i></label><br>
            <input required type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Login</button>
        <div class="text-center margin-top">
            <a href="user_reg.php" class="a-color">Create New Account</a>
            <br><a href="recover_email.php">Forgot your password?</a>
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