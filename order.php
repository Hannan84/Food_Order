<?php
// include navbar section
include 'partial_front/navbar.php';
// Check whether the user exist or not
if (!isset($_SESSION['user'])){
    header('location: user_login.php');
}

$obj = new FrontBackConn();


// Check whether the submit button click or not
if (isset($_POST['submit'])){
    $obj->orderFood();
}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section style="padding: 4% 0">
        <h2 class="text-center" style="color: #4b4a4a">CHECKOUT DETAILS</h2>
        <br>
        <div class="container">
            <?php if (isset($_SESSION['not_order'])){?>
                <div class="alert-warning">
                    <strong><?php echo $_SESSION['not_order'];?></strong> Failed To Order.
                </div>
            <?php unset($_SESSION['not_order']);}?>
            </br>
            <form action="" method="post">
                <div class="flex-display">
                    <div class="tbl-div">
                        <fieldset>
                            <legend>Delivery Details</legend>
                            <?php
//                      Check whether user is available or not
                            if (isset($_SESSION['user'])){
                                ?>
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']?>">
                                <div class="order-label">Full Name <i class="fas fa-signature"></i></div>
                                <input type="text" name="name" value="<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']?>" class="input-responsive" required>
                                <div class="order-label">Phone Number <i class="fas fa-phone"></i></div>
                                <input type="tel" name="contact" value="<?php echo $_SESSION['number']?>" class="input-responsive" required>

                                <div class="order-label">Email <i class="fas fa-mail-bulk"></i> (optional)</div>
                                <input type="email" name="email" value="<?php echo $_SESSION['user']?>" class="input-responsive">

                                <div class="order-label">Address <i class="fas fa-map-marker-alt"></i></div>
                                <textarea name="address" rows="5" class="input-responsive" required><?php echo $_SESSION['address']?></textarea>
                                <?php
                            }?>
                        </fieldset>
                    </div>
                    <div class="tbl-div" style="border-left: 1px solid #e5e3e3;">
                        <table class="tbl-full">
                            <thead>
                            <tr>
                                <th class="text-left">FOOD</th>
                                <th class="text-right">SUBTOTAL</th>
                            </tr>
                            </thead>
                        </table>
                        <table class="tbl-full">
                        <?php
                        $total = 0;
                        $delivery_fee = 40;
                        if (isset($_SESSION['myCart'])){
                            foreach ($_SESSION['myCart'] as $value) {?>
                                <?php $total += $value['price'] * $value['qty']?>

                            <tr>
                                <td style="padding-bottom: 40px" class="text-left"><?php echo $value['title'] ." x ". $value['qty']?></td>
                                <th style="padding-bottom: 40px" class="text-right"><?php echo number_format(($value['price'] * $value['qty']),2)?> Tk</th>
                            </tr>
                        <?php }}?>
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
                                <td class="text-left">Total</td>
                                <th class="text-right"><?php echo number_format($total+$delivery_fee,2)?> Tk</th>
                            </tr>
                            </tbody>
                        </table>
                        <div class="payment-div">
                            <input required type="radio" name="pay_mode" value="COD">
                            <input type="hidden" name="amount" value="<?php echo $total+$delivery_fee?>">
                            <label for="Payment">Cash on delivery</label>
                            <p>আপনার খাবার হোম ডেলিভারি দেয়া হবে এবং
                                সেখানেই ডেলিভারি চার্জসহ খাবার এর মূল্য একসাথে পরিশোধ করবেন।
                                কোন অগ্রিম পেমেন্ট করতে হবেনা।পরবর্তী যেকোন অনুসন্ধানের জন্য আপনার অর্ডার সিরিয়াল নাম্বারটি মনে রাখুন।
                                ডেলিভারী সংক্রান্ত কোন সমস্যা না হলে ৩০-৪০ মিনিটের মধ্যে খাবার পৌছে যাবে ইন শা আল্লাহ।</p>
                        </div>
                        <br>
                        <input type="submit" name="submit" value="PLACE ORDER" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- fOOD SEARCH Section Ends Here -->

    <!--Include social section-->
<?php include 'partial_front/social.php'?>

<!--include footer section-->
<?php include 'partial_front/footer.php'?>