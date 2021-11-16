<?php
// include navbar section
include 'partial_front/navbar.php';
?>


    <!--   Main Content Section Starts Hare -->

    <section class="main_content">
        <div class="container">
            <h2 class="text-center" style="color: #4b4a4a">SHOPPING CART</h2>
            <br><br>
            <?php
            if (!isset($_SESSION['myCart']) || count($_SESSION['myCart']) == 0){
                echo "<h1 class='text-center'>Your Cart is Empty</h1>";
            }
            else {?>
            <div class="flex-display">
                <div class="tbl-div">
                    <table>
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php
                        $total = 0;
                        $delivery_fee = 40;
                        if (isset($_SESSION['myCart'])){
                            foreach ($_SESSION['myCart'] as $value){?>
                                <form action="my_cart.php?id=<?php echo $value['id']?>" method="post">
                                    <tbody>
                                    <tr>
                                        <td><?php echo $value['title']?></td>
                                        <input type="hidden" name="title" value="<?php echo $value['title']?>">
                                        <input type="hidden" name="description" value="<?php echo $value['description']?>">
                                        <td>
                                            <?php
//                                          Check whether image is available or not
                                            if ($value['image'] != ""){
                                                ?>
                                                <img src="images/food/<?php echo $value['image'];?>" alt="Pizza" class="cart-img img-curve"  width="100px" height="100px">
                                                <?php
                                            }
                                            else{
                                                echo "<div style='color: red'> Image Not Added</div>";
                                            }
                                            ?>
                                        </td>
                                        <input type="hidden" name="image" value="<?php echo $value['image']?>">
                                        <td><?php echo $value['price']?> Tk</td>
                                        <td>
                                            <input class="qty_input" type="number" name="qty_item" min="1" onchange="this.form.submit();" value="<?php echo $value['qty']?>">
                                        </td>
                                        <input type="hidden" name="price" value="<?php echo $value['price']?>">
                                        <td><?php echo number_format($value['price']*$value['qty'],2)?> Tk</td>
                                        <td>
                                            <a class="btn-danger" onclick="return confirm('Are You Sure?')"
                                               href="cart_delete.php?id=<?php echo $value['id'];?>"
                                               title="delete"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </form>
                                <?php $total += $value['price']*$value['qty']?>
                            <?php }}?>
                    </table>
                </div>
                <div class="tbl-div" style="border-left: 1px solid #e5e3e3">
                    <table class="tbl-full">
                        <thead>
                        <tr>
                            <th class="text-left">Cart Totals</th>
                        </tr>
                        </thead>
                    </table>
                    <table class="tbl-full">
                        <tbody>
                        <tr>
                            <td class="text-left">Subtotal</td>
                            <th ><?php echo number_format($total,2)?> Tk</th>
                        </tr>
                        <tr>
                            <td class="text-left">Delivery fee</td>
                            <th ><?php echo number_format($delivery_fee,2)?> Tk</th>
                        </tr>
                        <tr>
                            <td class="text-left">Total</td>
                            <th ><?php echo number_format($total+$delivery_fee,2)?> Tk</th>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout-div">
                        <a href="order.php">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
    </section>

    <!--   Main Content Section Ends Hare -->

<?php include 'partial_front/footer.php' ?>