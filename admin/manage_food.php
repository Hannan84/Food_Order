
<?php
// include navbar section
include 'partial/navbar.php';

// include food class
include 'food_class.php';
?>


<!--   Main Content Section Starts Hare -->

<section class="main_content">
    <div class="container">
        <h1>Manage Food</h1>
        <br/>
        <?php if (isset($_SESSION['insert'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['insert']?></strong> Insert Successfully Complete.
            </div>
         <?php unset($_SESSION['insert']); }?>
        <?php if (isset($_SESSION['delete'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['delete'];?></strong> Delete Successfully Complete.
            </div>
        <?php unset($_SESSION['delete']);}?>

        <?php if (isset($_SESSION['update'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['update'];?></strong> Update Successfully Complete.
            </div>
        <?php unset($_SESSION['update']);}?>

        <br/><br/>

        <!--        button to add admin-->
        <a href="food_add.php" class="btn-primary"><i class="fas fa-plus-square"></i> Food</a>
        <br/><br/><br/>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Description</th>
                <th>price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php
            $obj = new Food();
            $data = $obj->displayFood();
            $sn = 1;
            foreach ($data as $value){?>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $value['title']?></td>
                    <td width="500" height="80"><?php echo $value['description']?></td>
                    <td><?php echo $value['price']?> Tk</td>
                    <td>
                        <?php
//                        Check whether image is available or not
                        if ($value['image'] != ""){
                            ?>
                            <img src="../images/food/<?php echo $value['image'];?>"width="100px" height="100px">
                            <?php
                        }
                        else{
                            echo "<div style='color: red'> Image Not Added</div>";
                        }
                        ?>
                    </td>
                    <td><?php echo $value['featured']?></td>
                    <td><?php echo $value['active']?></td>
                    <td>
                        <a href="food_update.php?id=<?php echo $value['id'];?>&image=<?php echo $value['image'];?>" class="btn-secondary" title="update"><i class="fas fa-edit"></i></a>
                        <a class="btn-danger" onclick="return confirm('Are You Sure?')" href="food_delete.php?id=<?php echo $value['id'];?>&image=<?php echo $value['image'];?>" title="delete"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php }?>
        </table>

    </div>
</section>

<!--   Main Content Section Ends Hare -->

<?php include 'partial/footer.php' ?>