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
                    <div class="food-menu-img">
                        <?php
                        //                   Check whether image is available or not
                        if ($value['image'] != ""){
                            ?>
                            <a href="food_view.php?id=<?php echo $value['id']?>"><img src="images/food/<?php echo $value['image'];?>" alt="Pizza" class="img-responsive img-curve"  width="100px" height="100px"></a>
                            <?php
                        }
                        else{
                            echo "<div style='color: red'> Image Not Added</div>";
                        }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><a style="color: black" href="food_view.php?id=<?php echo $value['id']?>"><?php echo $value['title']?></a></h4>
                        <p class="food-price"><a style="color: black" href="food_view.php?id=<?php echo $value['id']?>"><?php echo $value['price']?> Tk</a></p>
                        <p class="food-detail">
                            <a style="color: #747d8c" href="food_view.php?id=<?php echo $value['id']?>"><?php echo preg_replace('/((\w+\W*){'.(13).'}(\w+))(.*)/', '${1}', $value['description']);?></a>
                        </p>
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