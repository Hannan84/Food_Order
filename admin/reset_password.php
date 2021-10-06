<?php
include 'admin_class.php';
if (!isset($_SESSION['email'])){
    header("Location:recovery_admin_email.php");
}
$obj = new Admin();
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
    <link rel="stylesheet" href="../css/admin.css">

    <title>Reset Password-Food Order Restaurant</title>
</head>
<body>

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
        <div class="form-group">
            <label for="Password">Password : * </label><br>
            <input required type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <br>
        <div class="form-group">
            <label for="Confirm Password">Confirm Password : * </label><br>
            <input required type="password" class="form-control" name="con_password" placeholder="Confirm Password">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Reset Password</button>
        <div class="text-center margin-top">
            <a href="login.php" class="a-color">Back to login</a>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>