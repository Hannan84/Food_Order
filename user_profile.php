<?php
// include navbar section
include 'partial_front/navbar.php';

if (!isset($_SESSION['user'])){
//    User is not logged in
//    Redirect to login page
    header('location: user_login.php');
}
// Create instant of user class
$obj = new User();
// Call userDetails function to get user data
$userData = $obj->userDetails();
// Check whether the user value is execute or not
if (isset($_POST['submit'])){
//    Called function for user data update
    $obj->updateUser();
}
// Check whether the password value is execute or not
if (isset($_POST['pass_submit'])){
//    Called function for password change
    $obj->changePassword();
}
?>
<div class="form-container" style="width: 35% ; border: none">
    <h3 class="text-center" style="border-bottom: 1px solid #d4d3d3; padding-bottom: 25px">My Profile</h3>
    <?php if (isset($_SESSION['not_update'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['not_update'];?></strong> Failed to Update.
        </div>
    <?php unset($_SESSION['not_update']); }?>

    <?php if (isset($_SESSION['update'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['update'];?></strong> Your profile is updated.
        </div>
    <?php unset($_SESSION['update']); }?>

    <?php if (isset($_SESSION['pass-change'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['pass-change'];?></strong> Your Password Successfully Change.
        </div>
    <?php unset($_SESSION['pass-change']);}?>

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

    <form action="" method="post">
        <br/>
        <div class="order-label">
            <label for="First Name"">First Name: <i class="fas fa-signature"></i></label>
            <input required type="text" class="input-responsive" name="first_name" value="<?php echo $userData['first_name']?>">
        </div>
        <div class="order-label">
            <label for="Last Name"">Last Name: <i class="fas fa-signature"></i></label>
            <input required type="text" class="input-responsive" name="last_name" value="<?php echo $userData['last_name']?>">
        </div>
        <div class="order-label">
            <label for="Email"">Email: <i class="fas fa-mail-bulk"></i></label>
            <input type="email" class="input-responsive" name="email" value="<?php echo $userData['email']?>" readonly>
        </div>
        <div class="order-label">
            <label for="Number"">Number: (optional) <i class="fas fa-phone"></i></label>
            <input type="number" class="input-responsive" name="number" value="<?php echo $userData['number']?>">
        </div>
        <div class="order-label">
            <label for="Address"">Address: (optional) <i class="fas fa-map-marker-alt"></i></label>
            <textarea name="address" class="input-responsive" cols="43" rows="7"><?php echo $userData['address']?></textarea>
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
    <br/><br/><br/><br/>

    <h3 class="text-center" style="border-bottom: 1px solid #d4d3d3; padding-bottom: 25px">Password</h3>
    <form action="" method="post">
        <br/>
        <div class="order-label">
            <label for="Current Password"">Current Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="input-responsive" name="curr_password" placeholder="Current Password">
        </div>
        <div class="order-label">
            <label for="New Password"">New Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="input-responsive" name="new_password" placeholder="New Password">
        </div>
        <div class="order-label">
            <label for="Confirm Password"">Confirm Password: <i class="fas fa-key"></i></label>
            <input required type="password" class="input-responsive" name="con_password" placeholder="Confirm Password">
        </div>
        <button type="submit" name="pass_submit" class="btn-primary-login">Save</button>
    </form>
</div>


    <!--Include social section-->
<?php include 'partial_front/social.php'?>

    <!--include footer section-->
<?php include 'partial_front/footer.php'?>