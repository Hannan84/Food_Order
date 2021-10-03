<?php
// include navbar section
include 'partial_front/navbar.php';
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $_POST['search']?>"</a></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $obj = new FrontBackConn();
            $data = $obj->displayFoodSearch();
            foreach ($data as $value){?>
                <div class="food-menu-box">
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
                            <?php echo $value['description']?>
                        </p>
                        <br>

                        <a href="order.php?food_id=<?php echo $value['id']?>" class="btn btn-primary">Order Now</a>
                    </div>
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