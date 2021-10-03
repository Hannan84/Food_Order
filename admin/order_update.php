<?php
// include navbar section file
include ('partial/navbar.php');

// include order class to get all data
include 'Order.php';
$obj = new Order();
$std = $obj->viewOrder();
if (isset($_POST['submit'])){

//    call updateOrder function
    $obj->updateOrder();
}
?>

<div class="form-container">
    <h1 class="text-center">Update Order</h1>
    </br>
    <?php if (isset($_SESSION['not_update'])){?>
        <div class="alert-warning">
            <strong><?php echo $_SESSION['not_update'];?></strong> Failed to Update.
        </div>
    <?php unset($_SESSION['not_update']); }?>
    <br/>
    <form action="" method="post">
        <br>
        <div class="form-group">
            <label for="Food">Food:</label>
            <?php echo $std['food']?>
        </div>
        <br>
        <div class="form-group">
            <label for="Price">Price: </label>
            <?php echo $std['price']?> Tk <i class="fas fa-coins"></i>
            <input type="hidden" name="price" value="<?php echo $std['price']?>">
        </div>
        <br>
        <div class="form-group">
            <label for="Quantity">Quantity:</label>
            <input class="form-control" type="number" name="qty" value="<?php echo $std['qty']?>">
        </div>
        <br>
        <div class="form-group">
            <label for="Status">Status: <i class="fas fa-th-list"></i></label>
            <select name="status" class="form-control">
                <option <?php if ($std["status"] == 'Ordered'){ echo "selected";}?> value="Ordered">Ordered</option>
                <option <?php if ($std["status"] == 'On Delivery'){ echo "selected";}?> value="On Delivery">On Delivery</option>
                <option <?php if ($std["status"] == 'Delivered'){ echo "selected";}?> value="Delivered">Delivered</option>
                <option <?php if ($std["status"] == 'Cancelled'){ echo "selected";}?> value="Cancelled">Cancelled</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn-primary-login">Save</button>
    </form>
</div>


<!--include footer section-->
<?php include 'partial/footer.php' ?>
