<?php
// include navbar section
include 'partial_front/navbar.php';
// Check whether the user exist or not
if (!isset($_SESSION['user'])){
    header('location: user_login.php');
}
$obj = new FrontBackConn();
$billingData = $obj->billingAddress();
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section style="padding: 4% 0">
        <div class="container" style=" box-shadow: 0px 0px 22px 0px rgb(0 0 0 / 10%)">
            <div class="tbl-div">
                <h1 style="color: #626161;font-size: medium">Order #<mark><?php echo $billingData['order_id']?></mark> was placed on <mark><?php echo $billingData['order_date']?></mark> and is currently <mark><?php echo $billingData['status']?></mark>.</h1>
                <br>
                <h1 style="color: #4b4a4a">Order details</h1>
                <br>
                <table style="width: 100%">
                    <thead>
                    <tr>
                        <th class="text-left">FOOD</th>
                        <th class="text-right">TOTAL</th>
                    </tr>
                    </thead>
                </table>
                <table style="width: 100%">
                    <?php
                    $Data = $obj->orderDetails();
                    $total = 0;
                    $delivery_fee = 40;
                        foreach ($Data as $value) {?>
                            <?php $total += $value['subtotal']?>

                            <tr>
                                <td style="padding-bottom: 40px" class="text-left"><?php echo $value['food'] ." x ". $value['qty'].'<br><br>'.
                                        preg_replace('/((\w+\W*){'.(17).'}(\w+))(.*)/', '${1}', $value['description'])?></td>
                                <th style="padding-bottom: 40px" class="text-right"><?php echo $value['subtotal']?> Tk</th>
                            </tr>
                        <?php }?>
                    <tbody>
                    <tr>
                        <td class="text-left">Subtotal</td>
                        <th class="text-right"><?php echo number_format($total,2)?> Tk</th>
                    </tr>
                    <tr>
                        <td class="text-left">Delivery fee</td>
                        <th class="text-right"><?php echo number_format($delivery_fee,2)?> Tk</th>
                    </tr>
                    <tr>
                        <td class="text-left">Payment method</td>
                        <th class="text-right" style="font-size: small">Cash on delivery</th>
                    </tr>
                    <tr>
                        <td class="text-left">Total</td>
                        <th class="text-right"><?php echo number_format($total+$delivery_fee,2)?> Tk</th>
                    </tr>
                    </tbody>
                </table>
                <br>
                <h1 style="color: #4b4a4a">Billing address</h1>
                <br>
                <p style="color: grey"><?php echo $billingData['name']?></p>
                <p style="color: grey;margin-top: 10px"><?php echo $billingData['address']?></p>
                <p style="color: grey;margin-top: 10px"><?php echo $billingData['number']?></p>
                <p style="color: grey;margin-top: 10px"><?php echo $billingData['email']?></p>
            </div>
        </div>
    </section>
    <!-- fOOD SEARCH Section Ends Here -->

    <!--Include social section-->
<?php include 'partial_front/social.php'?>

    <!--include footer section-->
<?php include 'partial_front/footer.php'?>