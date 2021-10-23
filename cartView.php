<?php

// include navbar section
include 'partial_front/navbar.php';

?>


    <!--   Main Content Section Starts Hare -->

    <section class="main_content">
        <div class="container">
            <h1>My Cart</h1>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php
                $total = 0;
                $sn = 1;
                if (isset($_SESSION['myCart'])){
                foreach ($_SESSION['myCart'] as $value){?>
                    <form action="my_cart.php?action=add&id=<?php echo $value['id']?>" method="post">
                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $value['title']?></td>
                        <input type="hidden" name="title" value="<?php echo $value['title']?>">
                        <td width="500" height="80"><?php echo $value['description']?></td>
                        <input type="hidden" name="description" value="<?php echo $value['description']?>">
                        <td>
                            <?php
//                        Check whether image is available or not
                            if ($value['image'] != ""){
                                ?>
                                <img src="images/food/<?php echo $value['image'];?>" alt="Pizza"
                                     class="img-responsive"  width="100px" height="100px">
                                <?php
                            }
                            else{
                                echo "<div style='color: red'> Image Not Added</div>";
                            }
                            ?>
                        </td>
                        <input type="hidden" name="image" value="<?php echo $value['image']?>">
                        <td>
                            <input type="number" name="qty" value="<?php echo $value['qty']?>" min="1" max="50"
                                   style="width: 80px; height: 23px; background-color: whitesmoke" required">
                        </td>
                        <td><?php echo $value['price']?> Tk</td>
                        <input type="hidden" name="price" value="<?php echo $value['price']?>">
                        <td><?php echo number_format($value['price']*$value['qty'],2)?> Tk</td>
                        <td>
                            <button type="submit" name="qty_add" class="btn-secondary" style="border: none; cursor: pointer"
                                    title="Quantity Add"><i class="far fa-plus-square"></i></button>

                            <a class="btn-danger" onclick="return confirm('Are You Sure?')"
                               href="cart_delete.php?id=<?php echo $value['id'];?>"
                               title="delete"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    </form>
                    <?php $total += $value['price']*$value['qty']?>
                <?php }}?>
                    <tr>
                        <th></th><th></th><th></th><th></th><th></th><th>Total Amount = </th><th><?php echo number_format($total,2)?> Tk</th><th></th
                    </tr>
            </table>

        </div>
    </section>

    <!--   Main Content Section Ends Hare -->

<?php include 'partial_front/footer.php' ?>