<?php
// include navbar section
include 'partial/navbar.php';

// include Category class file
include 'category_class.php';

// create instant of Category class
$obj = new Category();
if (isset($_POST['submit'])){

//    call AddCategory function
    $obj->AddCategory();
}

?>

<div class="form-container">
    <h1 class="text-center">Add Category</h1>
    <br/>
    <?php if (isset($_SESSION['not_insert'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['not_insert'];?></strong> Failed To Insert Data.
        </div>
    <?php unset($_SESSION['not_insert']);}?>
    <br/>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <div class="form-group">
            <label for="Title">Title: <i class="fas fa-signature"></i></label>
            <input required type="text" class="form-control" name="title" placeholder="Category Title">
        </div>
        <br>
        <div class="form-group">
            <label for="Image">Image: <i class="fas fa-image"></i></label>
            <input class="form-control" type="file" name="image">
        </div>
        <br>
        <div class="form-group">
            <label for="Feature">Feature: <i class="fas fa-cogs"></i></label>
            <input type="radio" name="featured" value="Yes"> Yes
            <input type="radio" name="featured" value="No"> No
        </div>
        <br>
        <div class="form-group">
            <label for="Active">Active: <i class="far fa-thumbs-up"></i></label>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
</div>

<!-- include footer section-->
<?php include 'partial/footer.php'?>
