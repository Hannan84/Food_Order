<?php
// include navbar section
include 'partial_front/navbar.php';
include 'admin/Order.php';

if (!isset($_SESSION['user'])){
//    User is not logged in
//    Redirect to login page
    header('location: user_login.php');
}
?>


<!--   Main Content Section Starts Hare -->

<section class="main_content">
    <div class="container">
        <h2 class="text-center" style="color: #4b4a4a">ORDERS</h2>
        <br><br>
        <table width="100%">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $obj = new FrontBackConn();
            $Data = $obj->orderDetails();
            foreach ($Data as $datum){?>
                <?php $_SESSION['manage_id'] = $datum['id']?>
                <tr>
                    <td><?php echo $datum['order_id']?></td>
                    <td><?php echo $datum['order_date']?></td>
                    <td><?php echo $datum['status']?></td>
                    <td><?php echo $datum['amount']?> Tk</td>
                    <td><a href="#">View</a></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</section>

<!--   Main Content Section Ends Hare -->

<?php include 'partial_front/footer.php' ?>