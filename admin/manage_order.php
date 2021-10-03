
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
        <br/><br/>

        <table class="tbl-full text-center">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Customer Email</th>
                <th>Customer Address</th>
                <th>Action</th>
            </tr>
            <?php
//            Create instant of Order class
            $obj = new Order();
            $data = $obj->displayOrder();
            $sn = 1;
            foreach ($data as $value){?>
                <tr>
                    <td><?php echo $sn++?></td>
                    <td><?php echo $value['food']?></td>
                    <td><?php echo $value['price']?> Tk</td>
                    <td><?php echo $value['qty']?></td>
                    <td><?php echo $value['total']?> Tk</td>
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
                    <td><?php echo $value['customer_name']?></td>
                    <td><?php echo $value['customer_contact']?></td>
                    <td><?php echo $value['customer_email']?></td>
                    <td><?php echo $value['customer_address']?></td>
                    <td>
                        <a href="order_update.php?Order_id=<?php echo $value['id']?>" class="btn-secondary" title="update"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>
</section>

<!--   Main Content Section Ends Hare -->

<!--include footer section-->
<?php include 'partial/footer.php' ?>
