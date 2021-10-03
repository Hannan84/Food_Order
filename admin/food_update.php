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

<div class="main_container">
    <div class="container form_center">
        <?php if (isset($_SESSION['not_update'])){?>
            <div class="alert-warning">
                <strong><?php echo $_SESSION['not_update'];?></strong> Failed to Update.
            </div>
            <?php unset($_SESSION['not_update']); }?>
        <br/>
        <h1>Update Food</h1>
        <br/>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input class="form_input" type="text" name="title" value="<?php echo $std['title'];?>"></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><textarea class="form_input" cols="30" rows="5" name="description"><?php echo $std['description'];?></textarea></td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td><input class="form_input" type="text" name="price" value="<?php echo $std['price'];?>"></td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
//                      Check whether image is available or not
                        if ($std['image'] != ""){
                            ?>
                            <img src="../images/food/<?php echo $std['image'];?>"width="100px" height="100px">
                            <?php
                        }
                        else{
                            echo "<div style='color: red'> Image Not Added</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td><input class="form_input" type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category_id" class="form_input">
                            <?php
                            $obj = new Food();
                            $data = $obj->activeCategory();
                            foreach ($data as $value){?>
                                <option <?php if ($std['category_id'] == $value['id']){ echo "Selected";}?> value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Feature: </td>
                    <td class="form_input">
                        <input <?php if($std['featured'] == 'Yes'){echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($std['featured'] == 'No'){echo "checked";}?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td class="form_input">
                        <input <?php if($std['active'] == 'Yes'){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($std['active'] == 'No'){echo "checked";}?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $std['image']?>">
                        <input type="submit" name="submit" value="Update-Food" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- include footer section-->
<?php include 'partial/footer.php'?>
