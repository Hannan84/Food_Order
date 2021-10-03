<?php
// include navbar section file
include ('partial/navbar.php');

// include Admin class from insert_admin file
include 'admin_class.php';

// create instant of Admin class
$obj = new Admin();
$std = $obj->veiwData();
if (isset($_POST['submit'])){

//    call updateAdmin function
    $obj->updateAdmin();
}
?>

<div class="form-container">
    <h1 class="text-center">Update Profile</h1>
    <br/>
    <?php if (isset($_SESSION['not_update'])){?>
    <div class="alert-warning">
        <strong><?php echo $_SESSION['not_update'];?></strong> Failed to Update.
    </div>
    <?php unset($_SESSION['not_update']); }?>
    <br/>
    <form action="" method="post">
        <br>
        <div class="form-group">
            <label for="Full Name">Full Name: <i class="fas fa-signature"></i></label>
            <input required type="text" class="form-control" name="full_name" placeholder="Full Name" value="<?php echo $std['full_name']?>">
        </div>
        <br>
        <div class="form-group">
            <label for="Email">Email: <i class="fas fa-mail-bulk"></i></label>
            <input required type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $std['email']?>">
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
</div>

<!-- include footer section file-->
<?php include 'partial/footer.php' ?>
