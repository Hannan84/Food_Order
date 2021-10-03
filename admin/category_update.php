<?php
// include navbar section
include 'partial/navbar.php';

// include Category class file
include 'category_class.php';

// create instant of Category class
$obj = new Category();
$std = $obj->veiwData();
if (isset($_POST['submit'])){

//    call updateCategory function
    $obj->updateCategory();
}

?>

<div class="form-container">
    <h1>Update Category</h1>
    <br/>
    <?php if (isset($_SESSION['not_update'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['not_update'];?></strong> Failed to Update.
        </div>
    <?php unset($_SESSION['not_update']); }?>
    <br/>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <div class="form-group">
            <label for="Title">Title: <i class="fas fa-signature"></i></label>
            <input required type="text" class="form-control" name="title" value=" <?php echo $std['title'];?>">
        </div>
        <br>
        <div class="form-group">
            <label for="Current Image">Current Image:</label><br>
            <?php
//                  Check whether image is available or not
                if ($std['image'] != ""){
                    ?>
                    <img src="../images/category/<?php echo $std['image'];?>"width="100px" height="100px">
                    <?php
                }
                else{
                    echo "<div style='color: red'> Image Not Added</div>";
                }
            ?>
        </div>
        <br>
        <div class="form-group">
            <label for="New Image">New Image: <i class="fas fa-image"></i></label>
            <input class="form-control" type="file" name="image">
        </div>
        <br>
        <div class="form-group">
            <label for="Feature">Feature: <i class="fas fa-cogs"></i></label>
            <input <?php if($std['featured'] == 'Yes'){echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
            <input <?php if($std['featured'] == 'No'){echo "checked";}?> type="radio" name="featured" value="No"> No
        </div>
        <br>
        <div class="form-group">
            <label for="Active">Active: <i class="far fa-thumbs-up"></i></label>
            <input <?php if($std['active'] == 'Yes'){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
            <input <?php if($std['active'] == 'No'){echo "checked";}?> type="radio" name="active" value="No"> No
        </div>
        <input type="hidden" name="current_image" value="<?php echo $std['image']?>">
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
</div>

<!-- include footer section-->
<?php include 'partial/footer.php'?>
