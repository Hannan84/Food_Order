<?php

// include navbar section file
include ('partial/navbar.php');

// include Admin class from insert_admin file
include 'admin_class.php';

$obj = new Admin();
if (isset($_POST['submit'])){
    $obj->changePassword();
}
?>

<div class="form-container">
    <h1 class="text-center">Password Change</h1>
    <?php if (isset($_SESSION['pass-not-match'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['pass-not-match'];?></strong> New Password and Confirm Password Dose Not Match.
    </div>
    <?php unset($_SESSION['pass-not-match']); }?>

    <?php if (isset($_SESSION['curr-pass-not-match'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['curr-pass-not-match'];?></strong> Current Password Not Match.
    </div>
    <?php unset($_SESSION['curr-pass-not-match']); }?>

    <?php if (isset($_SESSION['pass_8_char'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['pass_8_char'];?></strong> Password minimum to be 8 characters.
        </div>
    <?php unset($_SESSION['pass_8_char']); }?>

    <?php if (isset($_SESSION['user-not-found'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['user-not-found'];?></strong> User Not Found.
    </div>
    <?php unset($_SESSION['user-not-found']); }?>
    <br>
    <form action="" method="POST">
        <br>
        <div class="form-group">
            <label for="Current Password">Current Password: <i class="fas fa-mail-bulk"></i></label>
            <input required type="password" class="form-control" name="current_password" placeholder="Current Password">
        </div>
        <br>
        <div class="form-group">
            <label for="New Password">New Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="form-control" name="new_password" placeholder="New Password">
        </div>
        <br>
        <div class="form-group">
            <label for="Confirm Password">Confirm Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
</div>

<!-- include footer Section-->
<?php include 'partial/footer.php' ?>
