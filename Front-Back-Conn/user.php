<?php
include_once (__DIR__ . '/../admin/db_connection.php');

class User extends Database {
//    user registration to insert data into user table
    public function userReg(){

//    1. Get data from form
        $first_name = $this->conn->real_escape_string($_POST['first_name']);
        $last_name = $this->conn->real_escape_string($_POST['last_name']);
        $email = $this->conn->real_escape_string($_POST['email']);
        $number = $this->conn->real_escape_string($_POST['number']);
        $address = $this->conn->real_escape_string($_POST['address']);
        $password  = md5($_POST['password']);
        $con_password  = md5($_POST['con_password']);
        $token = bin2hex(random_bytes(11));

//    Check whether the account exist or not and if account is already exist then try another account
//        Create SQL to get login email
        $sql = "SELECT email FROM tbl_user WHERE email = '$email'";

//        Execute the Query
        $result = $this->conn->query($sql);

//      Check whether the email exist or not
        if ($result->num_rows === 1){
            $_SESSION['exist_email'] = "Warning!";
        }
//      Check whether the email is valid on not
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['not_valid_email'] = "Warning!";

        }
//      check whether the password and confirm password match on not
        elseif ($password !== $con_password){
            $_SESSION['pass_not_match'] = "Warning!";

        }
//      check whether the password is less than 8 or not
        elseif (strlen($_POST['password']) < 8){
            $_SESSION['pass_8_char'] = "Warning!";
        }
        else{

//          sql query to save data into database
            $sql1 = "INSERT INTO tbl_user VALUES (null, '$first_name','$last_name','$email','$number','$address','$password','$token','inactive')";

//          Executing query and saving data into database
            $result1 = $this->conn->query($sql1);

//          Check whether the query execute or not
            if ($result1 == true){

//              create mail to email verification
                $subject = "Email Verification";
                $massage = "Hi, $first_name $last_name Click the below link to verify your account
                        http://localhost:63342/index.php/Food_Order/user_verify.php?token=$token";
                $sender = "From: wowfood100@gmail.com";

//              Check whether the mail is successfully send or not
                if (mail($email, $subject, $massage, $sender)){
                    $_SESSION['sendEmail'] = 'Success!';
                    header('location: user_login.php');
                }else{
                    $_SESSION['sendEmail_fail'] = 'Warning!';
                }
            }
            else{

//               Create a session variable to display massage
                $_SESSION['regError'] = 'Warning!';

            }
        }

    }
//    Create a function to update user verify status
    public function updateVerify(){

        $token = $_GET['token'];
//    create Sql to change verified status
        $sql = "UPDATE tbl_user SET verified = 'active' WHERE token = '$token'";

//    Execute the query
        $result = $this->conn->query($sql);
        if ($result){
            $_SESSION['verified'] = 'Success!';
            header('location: user_login.php');
        }
    }

//  Create function to get all user information
    public function displayUser(){
//       Create Sql Query to show data from database
        $sql = "SELECT * FROM tbl_user WHERE verified = 'active'";

//        Execute the query
        $result = $this->conn->query($sql);

//        Check whether the Query is Execute or Not
        if ($result==true){

//            get array to store data
            $data = [];
//            using while loop to get all the data from database
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }return $data;
        }
    }

//  Create function to get single user information
    public function userDetails(){
        $id = $_GET['id'];
//       Create Sql Query to show data from database
        $sql = "SELECT * FROM tbl_user WHERE verified = 'active' AND id = '$id'";

//        Execute the query
        $result = $this->conn->query($sql);

//        Check whether the Query is Execute or Not
        if ($result==true){
            $row = $result->fetch_assoc();
            return $row;
        }
    }

//    Login section for user
    public function userLogin(){
//      Get the data from login form
        $email = $this->conn->real_escape_string($_POST['email']);
        $password = md5($_POST['password']);


//      Sql to Check whether the user with email and password exist or not and account verified or not
        $sql = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' AND verified = 'active'";

//      Execute the Query
        $result = $this->conn->query($sql);

//      Count rows to check whether the user exist or not
        if ($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['user'] = $row['email'];
            $_SESSION['number'] = $row['number'];
            $_SESSION['address'] = $row['address'];

//          Create section for login massage
            $_SESSION['login'] = 'Success!';
//          Redirect to user profile
            header('location: index.php');
        }
        else{
            $_SESSION['loginError'] = 'Warning!';
        }
    }

//  Reset Password section start
//  Recovery Email  send link to reset password
    public function recoveryEmail(){
//      Get data from form
        $email = $this->conn->real_escape_string($_POST['email']);

//      Create Sql to check whether the email exist or not
        $sql = "SELECT * FROM tbl_user WHERE email = '$email'";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the email is valid on not
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['not_valid_email'] = "Warning!";

        }

//      Check whether the email exist or not
        elseif ($result->num_rows){
            $row = $result->fetch_assoc();
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $token = $row['token'];
            $_SESSION['email'] = $row['email'];

            $subject = "Recovery Password";
            $massage = "Hi $first_name $last_name,
                        Click the below link to reset your password
                        http://localhost:63342/index.php/Food_Order/reset_password.php?token=$token";

            $sender = "From: wowfood100@gmail.com";

//          Check whether the mail is successfully send or not
            if (mail($email, $subject, $massage, $sender)){
                $_SESSION['sendEmail'] = 'Success!';
                header('location: reset_password.php');
            }else{
                $_SESSION['sendEmail_fail'] = 'Warning!';
            }
        }
        else{
            $_SESSION['email_not_found'] = 'Warning!';
        }
    }

//   Create function to reset password
    public function resetPassword(){
//      Get data from form
        $password = md5($_POST['password']);
        $con_password = md5($_POST['con_password']);
        $token = $_GET['token'];

//      check whether the password and confirm password match on not
        if ($password !== $con_password){
            $_SESSION['pass_not_match'] = "Warning!";

        }
//      check whether the password is less than 8 or not
        elseif (strlen($_POST['password']) < 8){
            $_SESSION['pass_8_char'] = "Warning!";
        }
        else{

//          create Sql to change password
            $sql = "UPDATE tbl_user SET password = '$password' WHERE token = '$token'";

//          Execute the query
            $result = $this->conn->query($sql);
            if ($result){
                $_SESSION['reset_pass'] = 'Success!';
                header('location: user_login.php');
            }
        }
    }

//    Update Data into user table
    public function updateUser(){

//        Get data from form
        $id = $_GET['id'];
        $first_name = $this->conn->real_escape_string($_POST['first_name']);
        $last_name = $this->conn->real_escape_string($_POST['last_name']);
        $email     = $this->conn->real_escape_string($_POST['email']);
        $number     = $this->conn->real_escape_string($_POST['number']);
        $address     = $this->conn->real_escape_string($_POST['address']);

//        Sql Query to update data into database
        $sql = "UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name', email = '$email', number = '$number', address = '$address' WHERE id = '$id'";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Check whether the Query is execute or not
        if ($result == true){
            $_SESSION['update'] = "Success!";
        }else{
            $_SESSION['not_update'] = "Warning!";
        }
    }

//    Change user password into user table
    public function changePassword(){
//        Get the data from form
        $id = $_GET['id'];
        $current_pass = md5($_POST['curr_password']);
        $new_pass = md5($_POST['new_password']);
        $confirm_pass = md5($_POST['con_password']);

//        Create Sql query to check id and current password exist or not
        $sql = "SELECT * FROM tbl_user WHERE id = '$id' AND password = '$current_pass'";

//        Execute the Query
        $result = $this->conn->query($sql);


//        Check whether the Query is execute or not
        if ($result == true) {
//            Check whether the value is available or not
            if ($result->num_rows == 1) {
//                check whether the new password and confirm password are match or not
                if ($new_pass === $confirm_pass) {
//                      check whether the password is greater than or equal 8 or not
                    if (strlen($_POST['new_password']) >= 8){
//                          Create sql Query to change password
                        $sql2 = "UPDATE tbl_user SET password = '$new_pass' WHERE id ='$id'";

//                          Execute the Query
                        $result2 = $this->conn->query($sql2);
//                          Check whether the Query execute or not
                        if ($result2 == true) {
                            $_SESSION['pass-change'] = 'Success!';
                        }
                    }else{
//                          create session to massage password minimum to be 8 characters
                        $_SESSION['pass_8_char'] = 'Warning!';
                    }
                } else {
//                      massage to password match or not
                    $_SESSION['pass-not-match'] = 'Warning!';
                }
            } else {
//                    massage user found or not
                $_SESSION['curr-pass-not-match'] = 'Warning!';
            }
        }else {
            $_SESSION['user-not-found'] = 'Warning!';
        }
    }
}