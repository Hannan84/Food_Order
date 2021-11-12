
<?php
include ('partial/navbar.php');
include 'category_class.php';
include 'food_class.php';
include 'Order.php';
include '../Front-Back-Conn/user.php';

// create user class instant for user count
$user_obj = new User();
$user_obj = count($user_obj->displayUser());

// create Category class instant for food count
$category_obj = new Category();
$category_count = count($category_obj->displayCategory());

// create food class instant for food count
$food_obj = new Food();
$food_count = count($food_obj->displayFood());

// create food class instant for food count
$order_obj = new Order();
$order_count = count($order_obj->displayOrderManager());
$total_revenue = $order_obj->totalRevenue();
?>

    <!--   Main Content Section Starts Hare -->

    <section class="main_content">
        <div class="container">
            <?php if (isset($_SESSION['login'])){?>
                <div class="alert-success" style="width: 20%">
                    <strong><?php echo $_SESSION['login']?></strong> Login Successful.
                </div>
            <?php unset($_SESSION['login']); }?>
            <h1>DASHBOARD</h1>
                <div class="col-4 text-center">
                    <h1><?php echo $user_obj?></h1>
                    <br />
                    Total Users <i class="fas fa-users"></i>
                </div>

                <div class="col-4 text-center">
                    <h1><?php echo $category_count?></h1>
                    <br />
                    Categories <i class="fas fa-th-list"></i>
                </div>

                <div class="col-4 text-center">
                    <h1><?php echo $food_count?></h1>
                    <br />
                    Foods <i class="fas fa-carrot"></i>
                </div>

                <div class="col-4 text-center">
                    <h1><?php echo $order_count?></h1>
                    <br />
                    Total Orders <i class="fab fa-first-order"></i>
                </div>

                <div class="col-4 text-center">
                    <h1><?php echo $total_revenue['total']?> Tk</h1>
                    <br />
                    Revenue Generated <i class="fas fa-coins"></i>
                </div>

            <div class="clearfix"></div>

        </div>
    </section>

    <!--   Main Content Section Ends Hare -->

<?php include 'partial/footer.php' ?>