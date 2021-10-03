<?php
// include navbar section
include 'partial_front/navbar.php';

if (!isset($_SESSION['user'])){
//    User is not logged in
//    Redirect to login page
    header('location: user_login.php');

}
?>
<h1>Hello World</h1>


    <!--Include social section-->
<?php include 'partial_front/social.php'?>

    <!--include footer section-->
<?php include 'partial_front/footer.php'?>