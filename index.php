<?php
// include navbar section
include 'partial_front/navbar.php';
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

    <?php if (isset($_SESSION['order'])){?>
        <div class="alert-success">
            <strong><?php echo $_SESSION['order']?></strong> Order Successfully Complete.
        </div>
    <?php unset($_SESSION['order']); }?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        $obj = new FrontBackConn();
        $data = $obj->displayHomePageCategory();
        foreach ($data as $value){?>

            <a href="category-foods.php?category_id=<?php echo $value['id'];?>">
                <div class="box-3 float-container">
                    <?php
//                   Check whether image is available or not
                    if ($value['image'] != ""){
                        ?>
                        <img src="images/category/<?php echo $value['image'];?>" alt="Pizza" class="img-responsive img-curve"  width="100" height="350">
                        <?php
                    }
                    else{
                        echo "<div style='color: red'> Image Not Added</div>";
                    }
                    ?>
                    <h3 class="float-text text-white"><?php echo $value['title'];?></h3>
                </div>
            </a>
        <?php }?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $obj = new FrontBackConn();
        $data = $obj->displayHomePageFood();
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
                            <?php echo $value['description']?>
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