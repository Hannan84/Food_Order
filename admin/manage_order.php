
<?php
// include navbar section file
include ('partial/navbar.php');

// include order class to get all data
include 'Order.php';
?>


<!--   Main Content Section Starts Hare -->

<section class="main_content">
    <div class="container">
        <h1>Manage Order</h1>
        <br/>
        <?php if (isset($_SESSION['update'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['update'];?></strong> Update Successfully Complete.
            </div>
        <?php unset($_SESSION['update']);}?>
        <?php if (isset($_SESSION['delete'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['delete'];?></strong> Delete Successfully Complete.
            </div>
        <?php unset($_SESSION['delete']);}?>

        <br/><br/>
        <?php
//       Create instant of Order class
        $obj = new Order();
        $data = $obj->displayOrderManager();
        if (empty($data)){
            echo "<h1 class='text-center'>Order is empty</h1>";
        }
        else {?>
        <table class="tbl-full">
            <tr>
                <th>Full Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Pay Mode</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Order Item</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($data as $value){?>
                <tr>
                    <td><?php echo $value['name']?></td>
                    <td><?php echo $value['number']?></td>
                    <td><?php echo $value['email']?></td>
                    <td><?php echo $value['address']?></td>
                    <td><?php echo $value['pay_mode']?></td>
                    <td><?php echo $value['order_date']?></td>
                    <td>
                        <?php
                        //                        Ordered, On Delivery, Delivered, Cancelled
                        $status = $value['status'];
                        if ($status == "Ordered")
                        {
                            echo "<label>$status</label>";
                        }
                        elseif ($status == "On Delivery")
                        {
                            echo "<label style='color: orange;'>$status</label>";
                        }
                        elseif ($status == "Delivered")
                        {
                            echo "<label style='color: #02b802;'>$status</label>";
                        }
                        elseif ($status == "Cancelled")
                        {
                            echo "<label style='color: red;'>$status</label>";
                        }
                        ?>
                    </td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Food Id</th>
                                    <th>Food Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //            Create instant of Order class
                                $total = 0;
                                $obj = new Order();
                                $data = $obj->displayOrderItem();
                                foreach ($data as $datum){
                                    if ($value['id'] == $datum['manage_id']){
                                    ?>
                                    <tr>
                                        <td><?php echo $datum['food_id']?></td>
                                        <td><?php echo $datum['food']?></td>
                                        <td><?php echo $datum['price']?>Tk</td>
                                        <td><?php echo $datum['qty']?></td>
                                        <td><?php echo $datum['subtotal']?>Tk</td>
                                    </tr>
                                    <?php $total += $datum['price']*$datum['qty']?>
                                <?php } }?>
                            </tbody>
                            <tr>
                                <th colspan="4">Total</th><th><?php echo number_format($total,2)?>Tk</th>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <a href="order_update.php?Order_id=<?php echo $value['id']?>" class="btn-secondary" title="update"><i class="fas fa-edit"></i></a>
                        <a class="btn-danger" onclick="return confirm('Are You Sure?')" href="order_delete.php?Order_id=<?php echo $value['id'];?>" title="delete"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php }} ?>
        </table>

    </div>
</section>

<!--   Main Content Section Ends Hare -->

<!--include footer section-->
<?php include 'partial/footer.php' ?>
