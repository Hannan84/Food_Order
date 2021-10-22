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
                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $value['title']?></td>
                        <td width="500" height="80"><?php echo $value['description']?></td>
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
                        <td><input type="number" name="qty" value="<?php echo $value['qty']?>" min="1" max="50"  style="width: 80px; height: 23px; background-color: whitesmoke" required"></td>
                        <td><?php echo $value['price']?> Tk</td>
                        <td><?php echo number_format($value['price']*$value['qty'],2)?> Tk</td>
                        <td>
                            <a href="cart_delete.php?id=<?php echo $value['id'];?>"
                               class="btn-secondary" title="update"><i class="fas fa-edit"></i></a>

                            <a class="btn-danger" onclick="return confirm('Are You Sure?')"
                               href="cart_delete.php?id=<?php echo $value['id'];?>"
                               title="delete"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
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