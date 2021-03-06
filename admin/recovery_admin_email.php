<?php
include 'admin_class.php';

$obj = new Admin();
if (isset($_POST['submit'])){
    $obj->recoveryEmail();
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Forgot Password-Food Order Restaurant</title>
</head>
<body>
<div class="form-container">
    <h3 class="text-center">Forgot your password?</h3>
    <p class="text-center margin-top">Enter your email and we'll send you a link to reset your password</p>
    <br>
    <?php if (isset($_SESSION['not_valid_email'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['not_valid_email'];?></strong> This email is not a valid email address.
        </div>
        <?php unset($_SESSION['not_valid_email']); }?>

    <?php if (isset($_SESSION['sendEmail_fail'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['sendEmail_fail'];?></strong> Email sending fail. Please try again.
        </div>
        <?php unset($_SESSION['sendEmail_fail']);}?>

    <?php if (isset($_SESSION['email_not_found'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['email_not_found'];?></strong> Email not found. Please try again.
        </div>
        <?php unset($_SESSION['email_not_found']);}?>
    </br>
    <form action="" method="post">
        <br>
        <div class="form-group">
            <label for="Email"">Email: <i class="fas fa-mail-bulk"></i></label><br>
            <input required type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Sent mail</button>
        <div class="text-center margin-top">
            <a href="login.php" class="a-color"><i class="fas fa-arrow-left"></i>Back to login</a>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>