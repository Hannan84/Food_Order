<?php
// include navbar section
include 'partial_front/navbar.php';

$obj = new FrontBackConn();
$std = $obj->displayTitleBasedOnClick();
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $std['title']?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $obj = new FrontBackConn();
            $data = $obj->displayFoodBasedOnClick();
            foreach ($data as $value){?>
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
            <?php }?>

            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!--Include social section-->
<?php include 'partial_front/social.php'?>

<!--include footer section-->
<?php include 'partial_front/footer.php'?>