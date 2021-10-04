<?php
// include navbar section
include 'partial/navbar.php';

// include Food class file
include 'food_class.php';

// create instant of Category class
$obj = new Food();
$std = $obj->veiwData();
if (isset($_POST['submit'])){

//    call updateFood function
    $obj->updateFood();
}

?>

<div class="form-container">
    <h1 class="text-center">Update Food</h1>
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
            <input required type="text" class="form-control" name="title" value="<?php echo $std['title'];?>">
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description: <i class="fas fa-signature"></i></label>
            <textarea cols="43" rows="6" name="description"><?php echo $std['description'];?></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="Price">Price: <i class="fas fa-coins"></i></label>
            <input required type="number" class="form-control" name="price" value="<?php echo $std['price'];?>">
        </div>
        <br>
        <div class="form-group">
            <label for="Current Image">Current Image: <i class="fas fa-image"></i></label><br>
            <?php
//                  Check whether image is available or not
                if ($std['image'] != ""){
                    ?>
                    <img src="../images/food/<?php echo $std['image'];?>"width="100px" height="100px">
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
            <label for="Category">Category: <i class="fas fa-th-list"></i></label>
            <select name="category_id" class="form-control">
                <?php
                $obj = new Food();
                $data = $obj->activeCategory();
                foreach ($data as $value){?>
                    <option <?php if ($std['category_id'] == $value['id']){ echo "Selected";}?> value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                <?php }?>
            </select>
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
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
</div>

<!-- include footer section-->
<?php include 'partial/footer.php'?>
