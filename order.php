<?php
// include navbar section
include 'partial_front/navbar.php';

$obj = new FrontBackConn();
$std = $obj->displayDataOnOrder();

// Check whether the submit button click or not
if (isset($_POST['submit'])){
    $obj->orderFood();
}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            <?php if (isset($_SESSION['not_order'])){?>
                <div class="alert-warning">
                    <strong><?php echo $_SESSION['not_order'];?></strong> Failed To Order.
                </div>
            <?php unset($_SESSION['not_order']);}?>
            </br>
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
//                   Check whether image is available or not
                        if ($std['image'] != ""){
                            ?>
                            <img src="images/food/<?php echo $std['image'];?>" alt="Pizza" class="img-responsive img-curve"  width="100px" height="100px">
                            <?php
                        }
                        else{
                            echo "<div style='color: red'> Image Not Added</div>";
                        }
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $std['title']?></h3>
                        <input type="hidden" name="food" value="<?php echo $std['title']?>">
                        <p class="food-price"><?php echo $std['price']?> Tk</p>
                        <input type="hidden" name="price" value="<?php echo $std['price']?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" min="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. HHHHSSSS" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 017xxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD SEARCH Section Ends Here -->

    <!--Include social section-->
<?php include 'partial_front/social.php'?>

<!--include footer section-->
<?php include 'partial_front/footer.php'?>