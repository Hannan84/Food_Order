<?php

// include navbar section
include 'partial_front/navbar.php';


?>

<?php if (isset($_SESSION['order'])){?>
    <div class="alert-success">
        <strong><?php echo $_SESSION['order']?></strong> Order Successfully Complete.
    </div>
    <?php unset($_SESSION['order']); }?>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food View</h2>

                <div class="food-menu-box">
                    <form action="my_cart.php?id=<?php echo $value['id']?>" method="post">
                        <div class="food-menu-img">
                            <?php
                            //                   Check whether image is available or not
                            if ($value['image'] != ""){
                                ?>
                                <img src="images/food/<?php echo $value['image'];?>" alt="Pizza" class="img-responsive img-curve"  width="100px" height="100px">
                                <?php
                            }
                            else{
                                echo "<div style='color: red'> Image Not Added</div>";
                            }
                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $value['title']?></h4>
                            <p class="food-price"><?php echo $value['price']?> Tk</p>
                            <p class="food-detail">
                                <?php echo preg_replace('/((\w+\W*){'.(13).'}(\w+))(.*)/', '${1}', $value['description']);?>
                            </p>
                            <br>
                            <input type="hidden" name="image" value="<?php echo $value['image']?>">
                            <input type="hidden" name="title" value="<?php echo $value['title']?>">
                            <input type="hidden" name="price" value="<?php echo $value['price']?>">
                            <input type="hidden" name="description" value="<?php echo $value['description']?>">
                            <input type="number" name="qty" value="1" min="1" max="50"  style="width: 90px; height: 23px; border-radius: 5px" placeholder="Quantity" required">
                            <button type="submit" name="submit" class="btn btn-primary">Add To Cart</button>
                        </div>
                    </form>
                </div>

            <div class="clearfix"></div>

        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!--Include social section-->
<?php include 'partial_front/social.php'?>

    <!--include footer section-->
<?php include 'partial_front/footer.php'?>