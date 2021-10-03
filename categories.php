
<?php
// include navbar section
include 'partial_front/navbar.php';
?>


<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        $obj = new FrontBackConn();
        $data = $obj->displayCatePageCategory();
        foreach ($data as $value){?>

            <a href="category-foods.php?category_id=<?php echo $value['id'];?>">
                <div class="box-3 float-container">
                    <?php
//                   Check whether image is available or not
                    if ($value['image'] != ""){
                        ?>
                        <img src="images/category/<?php echo $value['image'];?>" alt="Pizza" class="img-responsive img-curve" width="100" height="350">
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


<!--Include social section-->
<?php include 'partial_front/social.php'?>

<!--include footer section-->
<?php include 'partial_front/footer.php'?>