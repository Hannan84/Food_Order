<?php
// include navbar section
include 'partial_front/navbar.php';
?>


    <!--   Main Content Section Starts Hare -->

    <section class="main_content">
        <div class="container">
            <h2 class="text-center">My Cart</h2>
            <br>
            <?php
            if (!isset($_SESSION['myCart']) || count($_SESSION['myCart']) == 0){
                echo "<h1 class='text-center'>Your Cart is Empty</h1>";
            }
            else {?>


            <table class="tbl-full">
                <thead>
                    <tr>
                        <th>S.N.</th>
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
                $sn = 1;
                if (isset($_SESSION['myCart'])){
                foreach ($_SESSION['myCart'] as $value){?>
                    <form action="my_cart.php?Addition=add&Subtraction=sub&id=<?php echo $value['id']?>" method="post">
                        <tbody>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $value['title']?></td>
                                <input type="hidden" name="title" value="<?php echo $value['title']?>">
                                <input type="hidden" name="description" value="<?php echo $value['description']?>">
                                <td>
                                    <?php
        //                        Check whether image is available or not
                                    if ($value['image'] != ""){
                                        ?>
                                        <img src="images/food/<?php echo $value['image'];?>" alt="Pizza" class="img-responsive img-curve"  width="100px" height="100px">
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
                                    <div class="qty_div">
                                        <button class="qty_button" type="submit" name="qty_sub" title="Quantity Sub">-</button>
                                        <input type="hidden" name="qty" value="<?php echo $value['qty']?>">
                                        <span class="qty_span"><?php echo $value['qty']?></span>
                                        <button class="qty_button" type="submit" name="qty_add" title="Quantity Add">+</button>
                                    </div>
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
                    <tr>
                        <th></th><th></th><th></th><th></th><th></th><th>Subtotal</th><th><?php echo number_format($total,2)?> Tk</th>
                    </tr>
                    <tr>
                        <th></th><th></th><th></th><th></th><th></th><th>Delivery fee</th><th><?php echo number_format($delivery_fee,2)?> Tk</th>
                    </tr>
                    <tr>
                        <th></th><th></th><th></th><th></th><th></th><th>Total</th><th><?php echo number_format($delivery_fee+$total,2)?> Tk</th>
                    </tr>
            </table>
            <?php } ?>
        </div>
    </section>

    <!--   Main Content Section Ends Hare -->

<?php include 'partial_front/footer.php' ?>