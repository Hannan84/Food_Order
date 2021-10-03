
<?php

// include navbar section file
include ('partial/navbar.php');

// include Admin class from insert_admin file
include 'admin_class.php';
?>

<!--   Main Content Section Starts Hare -->

<section class="main_content">
    <div class="container">
        <h1>Manage Admin</h1>
        <br/>

            <?php if (isset($_SESSION['sendEmail'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['sendEmail']?></strong> Check your email to verify account.
            </div>
            <?php unset($_SESSION['sendEmail']); }?>

            <?php if (isset($_SESSION['update'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['update'];?></strong> Update Successfully Complete.
            </div>
            <?php unset($_SESSION['update']);}?>

            <?php if (isset($_SESSION['delete'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['delete'];?></strong> Delete Successfully Complete.
            </div>
            <?php unset($_SESSION['delete']);}?>

           <?php if (isset($_SESSION['pass-change'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['pass-change'];?></strong> Password Change Successfully Complete.
            </div>
            <?php unset($_SESSION['pass-change']);}?>
            <?php if (isset($_SESSION['curr_pass_not'])){?>
            <div class="alert-warning">
                <strong><?php echo $_SESSION['curr_pass_not'];?></strong> Wrong Current Password.
            </div>
            <?php unset($_SESSION['curr_pass_not']); }?>

            <?php if (isset($_SESSION['verified'])){?>
            <div class="alert-success">
                <strong><?php echo $_SESSION['verified'];?></strong> Your account is verified.
            </div>
            <?php unset($_SESSION['verified']); }?>

        <br/><br/>
<!--        button to add admin-->
        <a href="admin_add.php" class="btn-primary"><i class="fas fa-user-plus"></i> Admin</a>
        <br/><br/><br/>


        <table class="tbl-full">
            <tr>
                <th>SN <i class="fas fa-list-ol"></i></th>
                <th>Full Name <i class="fas fa-file-signature"></i></th>
                <th>Email <i class="fas fa-mail-bulk"></i></th>
                <th>Action</th>
            </tr>
            <?php
            $obj = new Admin();
            $data = $obj->displayAdmin();
            $sn = 1;
            foreach ($data as $value){?>
                <tr>
                    <td><?php echo $sn++?></td>
                    <td><?php echo $value['full_name']?></td>
                    <td><?php echo $value['email']?></td>
                    <td>
                        <a href="admin_change_pass.php?id=<?php echo $value['id'];?>" class="btn-primary" title="change password"><i class="fas fa-key"></i></a>
                        <a href="admin_update.php?id=<?php echo $value['id'];?>" class="btn-secondary" title="update"><i class="fas fa-user-edit"></i></a>
                        <a class="btn-danger" onclick="return confirm('Are You Sure?')" href="admin_delete.php?id=<?php echo $value['id'];?>" title="delete"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php }?>
        </table>
        <div class="clearfix"></div>

    </div>
</section>

<!--   Main Content Section Ends Hare -->

<!-- include footer Section-->
<?php include 'partial/footer.php' ?>