<?php
include ('admin/db_connection.php');

class FrontBackConn extends Database{

//    Display Category for home page from Category Table
    public function displayHomePageCategory()
    {
//      Create sql query to show data from database
        $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the query execute or not
        if ($result == true) {

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()) {
                $data[] = $raw;
            }
            return $data;
        }
    }

//  Display Category for Categories page from Category Table
    public function displayCatePageCategory()
    {
//      Create sql query to show data from database
        $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' ";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the query execute or not
        if ($result == true) {

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()) {
                $data[] = $raw;
            }
            return $data;
        }
    }

//  Display Category Title to get category based on click
    public function displayTitleBasedOnClick()
    {
//        Check whether id is passed or not
        if (isset($_GET['category_id'])){
//          Category id is set and get the id
            $category_id = $_GET['category_id'];
//          Get the category title based on category Id
            $sql = "SELECT title FROM tbl_category WHERE id = '$category_id'";

//          Execute the query
            $result = $this->conn->query($sql);
//           Get the value from database
            $row = $result->fetch_assoc();
            return $row;
        }
        else{
//            Category_id not passed
//            Redirect Home page
            header('location: index.php');
        }

    }

//  Display Food to get category based on click
    public function displayFoodBasedOnClick()
    {
//      Category id is set and get the id
        $category_id = $_GET['category_id'];
//      Create sql query to show data from database
        $sql2 = "SELECT * FROM tbl_food WHERE category_id = '$category_id' ";

//      Execute the query
        $result2 = $this->conn->query($sql2);

//      Check whether the query execute or not
        if ($result2 == true) {

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw2 = $result2->fetch_assoc()) {
                $data[] = $raw2;
            }
            return $data;
        }
    }

//    Display Foods for home page from Food Table
    public function displayHomePageFood()
    {
//      Create sql query to show data from database
        $sql = "SELECT * FROM tbl_food WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the query execute or not
        if ($result == true) {

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()) {
                $data[] = $raw;
            }
            return $data;
        }
    }

//    Display Foods for food page from Food Table
    public function displayFoodPageFood()
    {
//      Create sql query to show data from database
        $sql = "SELECT * FROM tbl_food WHERE active = 'Yes'";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the query execute or not
        if ($result == true) {

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()) {
                $data[] = $raw;
            }
            return $data;
        }
    }

//   Create function for View food from food table
    public function viewFood(){
//        Get id from form
        $id = $_GET['id'];

//        Create sql query to show data from database
        $sql = "SELECT * FROM tbl_food WHERE id = '$id'";

//        Execute the query
        $result = $this->conn->query($sql);

//      Get the value from database
        $row = $result->fetch_assoc();
        return $row;
    }

//    Display Foods for food page from Food Table
    public function displayFoodSearch()
    {

//        Get the search keyword
        $search = $this->conn->real_escape_string($_POST['search']);
//      Create sql query to show data from database
        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the query execute or not
        if ($result == true) {

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()) {
                $data[] = $raw;
            }
            return $data;
        }
    }


//    Order Section Start
//  Display data to do order based on click
    public function displayDataOnOrder()
    {
//        Check whether id is passed or not
        if (isset($_GET['food_id'])){
//          food id is set and get the id
            $food_id = $_GET['food_id'];
//          Get the category title based on category Id
            $sql = "SELECT * FROM tbl_food WHERE id = '$food_id'";

//          Execute the query
            $result = $this->conn->query($sql);
//        Checked whether the query execute or not
            if ($result == true){
//            check whether the data is available or not
                if ($result->num_rows == 1){
                    $row = $result->fetch_assoc();
                    return $row;
                }
                else{
//                redirect to page
                    header('location: index.php');
                }
            }
        }
        else{
//            Food_id not passed
//            Redirect Home page
            header('location: index.php');
        }

    }

//    Insert Data to Order into Database
    public function orderFood(){
//    Get the Data from Form
        $food = $_POST['food'];
        $price = $_POST['price'];
        $qty = $this->conn->real_escape_string($_POST['qty']);

        $total = $price * $qty;

        date_default_timezone_set('Asia/Dhaka');
        $order_date = date("Y-m-d h:i:s a");

        $status = 'Ordered';

        $first_name = $this->conn->real_escape_string($_POST['first_name']);
        $last_name = $this->conn->real_escape_string($_POST['last_name']);
        $customer_contact = $this->conn->real_escape_string($_POST['contact']);
        $customer_email = $this->conn->real_escape_string($_POST['email']);
        $customer_address = $this->conn->real_escape_string($_POST['address']);


//      Save the Order in Database
 //    sql query to save data into database
        $sql = "INSERT INTO tbl_order VALUES (null, '$food','$price','$qty','$total','$order_date','$status','$first_name','$last_name','$customer_contact','$customer_email','$customer_address')";

//    Executing query and saving data into database
        $result = $this->conn->query($sql);

        if ($result == true){
//           Create a session variable to display massage
            $_SESSION['order'] = 'Success!';
//           Redirect to manage admin page
            header('location: index.php');
        }
        else{

//           Create a session variable to display massage
            $_SESSION['not_order'] = 'Warning!';

        }
    }
//    Order Section End

}
