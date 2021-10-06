<?php

// include database connection
include_once 'db_connection.php';

class Admin extends Database {

//    insert data into admin table
    public function insertAdmin(){

//    1. Get data from form
        $full_name = $this->conn->real_escape_string($_POST['full_name']);
        $email     = $this->conn->real_escape_string($_POST['email']);
        $password  = md5($_POST['password']);
        $con_password  = md5($_POST['con_password']);
        $token = bin2hex(random_bytes(11));

//    Check whether the account exist or not and if account is already exist then try another account
//        Create SQL to get login email
        $sql = "SELECT email FROM tbl_admin WHERE email = '$email'";

//        Execute the Query
        $result = $this->conn->query($sql);

//      Check whether the email exist or not
        if ($result->num_rows === 1){
            $_SESSION['exist_email'] = "Warning!";
        }
//      Check whether the email valid or not
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['not_valid_email'] = "Warning!";
        }
//      Check whether the password and confirm password match or not
        elseif ($password !== $con_password){
            $_SESSION['pass_not_match'] = "Warning!";
        }
//      check whether the password is less than 8 or not
        elseif (strlen($_POST['password']) < 8){
            $_SESSION['pass_8_char'] = "Warning!";
        }
        else{

//          sql query to save data into database
            $sql1 = "INSERT INTO tbl_admin VALUES (null, '$full_name','$email','$password','$token','inactive')";

//          Executing query and saving data into database
            $result1 = $this->conn->query($sql1);

//          Check whether the query execute or not
            if ($result1 == true){
//              Create mail to email verification
                $subject = "Email Verification";
                $massage = "Hi,$full_name Click the below link to verify your account
                http://localhost:63342/index.php/Food_Order/admin/admin_mail_verify.php?token=$token";
                $sender = "From: wowfood100@gmail.com";

//              Check whether the mail is successfully send or not
                if (mail($email, $subject, $massage, $sender)){
                    $_SESSION['sendEmail'] = 'Success!';
                    header('location: manage_admin.php');
                }else{
                    $_SESSION['sendEmail_fail'] = 'Warning!';
                }
            }
            else{

//               Create a session variable to display massage
                $_SESSION['not_insert'] = 'Warning!';

            }
        }

    }

//   Create function to verify user account
    public function adminVerify(){
        $token = $_GET['token'];
//      create Sql to change verified status
        $sql = "UPDATE tbl_admin SET verified = 'active' WHERE token = '$token'";

//      Execute the query
        $result = $this->conn->query($sql);
        if ($result){
            $_SESSION['verified'] = 'Success!';
            header('location: manage_admin.php');
        }
    }


//        Display Data From Admin Table
    public function displayAdmin(){

//       Create Sql Query to show data from database
        $sql = "SELECT * FROM tbl_admin WHERE verified = 'active'";

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

//    Get a single data from database
    public function veiwData(){
//       Get the id of select Admin Data
        $id = $_GET['id'];

//       Create Sql Query to show single data
        $sql = "SELECT * FROM tbl_admin WHERE id = '$id'";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Checked whether the query execute or not
        if ($result == true){
//            check whether the data is available or not
            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
            else{
//                redirect to page
                header('location: manage_admin.php');
            }
        }
    }

//    Update Data into admin table
    public function updateAdmin(){

//        Get data from form
        $id = $_GET['id'];
        $full_name = $this->conn->real_escape_string($_POST['full_name']);
        $email     = $this->conn->real_escape_string($_POST['email']);

//        Sql Query to update data into database
        $sql = "UPDATE tbl_admin SET full_name = '$full_name', email = '$email' WHERE id = '$id'";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Check whether the Query is execute or not
        if ($result == true){
            $_SESSION['update'] = "Success!";
//            redirect to manage admin page
            header('location: manage_admin.php');
        }else{
            $_SESSION['not_update'] = "Warning!";
        }
    }

//    Delete Data into admin table
    public function deleteAdmin(){
//       Get the id of select Admin Data
        $id = $_GET['id'];

//        Create sql query to delete data into database
        $sql = "DELETE FROM tbl_admin WHERE id = '$id'";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Check whether the Query is execute or not
        if ($result == true){
            $_SESSION['delete'] = "Success!";
//            redirect to manage admin page
            header('location: manage_admin.php');
        }else{
            echo "Delete Not Success";
        }
    }

//    Change admin password into admin table
    public function changePassword(){
//        Get the data from form
        $id = $_GET['id'];
        $current_pass = md5($_POST['current_password']);
        $new_pass = md5($_POST['new_password']);
        $confirm_pass = md5($_POST['confirm_password']);

//        Create Sql query to check id and current password exist or not
        $sql = "SELECT * FROM tbl_admin WHERE id = '$id' AND password = '$current_pass'";

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
                            $sql2 = "UPDATE tbl_admin SET password = '$new_pass' WHERE id ='$id'";

//                          Execute the Query
                            $result2 = $this->conn->query($sql2);
//                          Check whether the Query execute or not
                            if ($result2 == true) {
                                $_SESSION['pass-change'] = 'Success!';
//                              Redirect to page
                                header('location: manage_admin.php');
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


//    Login Section for Admin Panel
    public function login(){
//        Get the data from login form
        $email = $this->conn->real_escape_string($_POST['email']);
        $password = md5($_POST['password']);

//        SQL to check whether the user with email or password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password' AND verified = 'active'";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Count rows to check whether the user exist or not
        if ($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $_SESSION['login'] = "Success!";
            $_SESSION['admin'] = $row['email'];
//            redirect to index page
            header('location: index.php');
        }else{
            $_SESSION['loginError'] = "Warning!";
        }
    }

//  Reset Password section start
//  Recovery Email  send link to reset password
    public function recoveryEmail(){
//      Get data from form
        $email = $this->conn->real_escape_string($_POST['email']);

//      Create Sql to check whether the email exist or not
        $sql = "SELECT * FROM tbl_admin WHERE email = '$email'";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the email is valid on not
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['not_valid_email'] = "Warning!";

        }

//      Check whether the email exist or not
        elseif ($result->num_rows){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $token = $row['token'];
            $_SESSION['email'] = $row['email'];

            $subject = "Recovery Password";
            $massage = "Hi $name, 
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
            $sql = "UPDATE tbl_admin SET password = '$password' WHERE token = '$token'";

//          Execute the query
            $result = $this->conn->query($sql);
            if ($result){
                $_SESSION['reset_pass'] = 'Success!';
                header('location: login.php');
            }
        }
    }

}


