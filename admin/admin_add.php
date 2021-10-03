<?php
// include navbar section file
include ('partial/navbar.php');

// include Admin class file
include 'admin_class.php';

// create instant of Admin class
$obj = new Admin();
if (isset($_POST['submit'])){

//    call insertAdmin function
    $obj->insertAdmin();
}
?>

<div class="form-container">
    <h1 class="text-center">Add Admin</h1>
    <br/>
    <?php if (isset($_SESSION['not_insert'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['not_insert'];?></strong> Failed To Insert Data.
    </div>
    <?php unset($_SESSION['not_insert']);}?>

    <?php if (isset($_SESSION['exist_email'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['exist_email'];?></strong> This Email is already exist please try another Email.
    </div>
    <?php unset($_SESSION['exist_email']);}?>

    <?php if (isset($_SESSION['pass_not_match'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['pass_not_match'];?></strong> Password and Confirm Password doesn't match.
    </div>
    <?php unset($_SESSION['pass_not_match']); }?>

    <?php if (isset($_SESSION['pass_8_char'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['pass_8_char'];?></strong> Password minimum to be 8 characters.
    </div>
    <?php unset($_SESSION['pass_8_char']); }?>

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
    <br/>
    <form action="" method="post">
        <br>
        <div class="form-group">
            <label for="Full Name">Full Name: <i class="fas fa-signature"></i></label>
            <input required type="text" class="form-control" name="full_name" placeholder="Full Name">
        </div>
        <br>
        <div class="form-group">
            <label for="Email">Email: <i class="fas fa-mail-bulk"></i></label>
            <input required type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <br>
        <div class="form-group">
            <label for="Password">Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <br>
        <div class="form-group">
            <label for="Confirm Password"">Confirm Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="form-control" name="con_password" placeholder="Confirm Password">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
</div>

<!-- include footer section file-->
<?php include 'partial/footer.php' ?>
