<?php
// include navbar section
include 'partial/navbar.php';

// include food class
include 'food_class.php';

// Create instant of Food class
$obj = new Food();
if (isset($_POST['submit'])){
    $obj->AddFood();
}
?>


<div class="form-container">
    <h1 class="text-center">Add Food</h1>
    </br>
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
            <input required type="text" class="form-control" name="title" placeholder="Food Title">
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description: <i class="fas fa-signature"></i></label>
            <textarea class="form-control" cols="30" rows="5" name="description" placeholder="Description ot the food"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="Price">Price: <i class="fas fa-coins"></i></label>
            <input required type="number" class="form-control" name="price" placeholder="Food Price">
        </div>
        <br>
        <div class="form-group">
            <label for="Image">Image: <i class="fas fa-image"></i></label>
            <input class="form-control" type="file" name="image">
        </div>
        <br>
        <div class="form-group">
            <label for="Category">Category: <i class="fas fa-th-list"></i></label>
            <select name="category" class="form-control">
                <?php
                $obj = new Food();
                $data = $obj->activeCategory();
                foreach ($data as $value){?>
                    <option value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                <?php }?>
            </select>
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