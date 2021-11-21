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
//  Create function to get order  information
    public function orderView(){
        $id = $_SESSION['id'];
//       Create Sql Query to show data from database
        $sql = "SELECT * FROM tbl_order_manager WHERE user_id = '$id' and status = 'Delivered'";
//        Execute the query
        $result = $this->conn->query($sql);

//        Check whether the Query is Execute or Not
        if ($result==true){
//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()) {
                $data[] = $raw;
            }
            return $data;
        }
    }

//  Create function to get order  information
    public function billingAddress(){
        $id = $_GET['ViewId'];
//       Create Sql Query to show data from database
        $sql = "SELECT * FROM tbl_order_manager WHERE id = '$id'";
//        Execute the query
        $result = $this->conn->query($sql);

//        Check whether the Query is Execute or Not
        if ($result==true){

            $raw = $result->fetch_assoc();
            return $raw;

        }
    }

    public function orderDetails(){
        $id = $_GET['ViewId'];
//       Create Sql Query to show data from database
        $sql = "SELECT * FROM tbl_order_item join tbl_food ON tbl_order_item.food_id = tbl_food.id WHERE manage_id = '$id'";
//        Execute the query
        $result = $this->conn->query($sql);

//        Check whether the Query is Execute or Not
        if ($result==true){
//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()) {
                $data[] = $raw;
            }
            return $data;
        }
    }

//    Insert Data to Order into Database
    public function orderFood(){
//    Get the Data from Form
        $user_id = $this->conn->real_escape_string($_POST['user_id']);
        $order_id = rand(00000,99999);
        $full_name = $this->conn->real_escape_string($_POST['name']);
        $customer_contact = $this->conn->real_escape_string($_POST['contact']);
        $customer_email = $this->conn->real_escape_string($_POST['email']);
        $customer_address = $this->conn->real_escape_string($_POST['address']);
        $pay_mode = $this->conn->real_escape_string($_POST['pay_mode']);
        $amount = $this->conn->real_escape_string($_POST['amount']);

        date_default_timezone_set('Asia/Dhaka');
        $order_date = date("Y-m-d h:i:s a");

        $status = 'Ordered';


//      Save the Order in Database
 //    sql query to save data into database
        $sql = "INSERT INTO tbl_order_manager VALUES (null, '$user_id', '$order_id', '$full_name','$customer_contact','$customer_email','$customer_address','$pay_mode', '$amount','$order_date','$status')";

//    Executing query and saving data into database
        $result = $this->conn->query($sql);

        if ($result == true){

            $manage_id = $this->conn->insert_id;
            $sql2 = "INSERT INTO `tbl_order_item`(`id`, `manage_id`, `food_id`, `food`, `price`, `qty`, `subtotal`) VALUES (null ,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($sql2);
            if ($stmt == true)
            {
                $stmt->bind_param("iisdid",$manage_id,$food_id,$food,$price,$qty,$subtotal);
                foreach ($_SESSION['myCart'] as $value)
                {
                    $food_id = $value['id'];
                    $food = $value['title'];
                    $price = $value['price'];
                    $qty = $value['qty'];
                    $subtotal = $price*$qty;
                    $stmt->execute();
                }
                unset($_SESSION['myCart']);
                    echo "
                <script>
                alert('order placed successfully complete');
                window.location.href = 'index.php';
                </script> 
                ";
            }
            else
            {
                echo "
            <script>
            alert('Sql query prepare error');
            window.location.href = 'cartView.php';
            </script>
            ";
            }
        }
        else{

            echo "
            <script>
            alert('order not complete');
            window.location.href = 'cartView.php';
            </script> 
            ";

        }
    }
//    Order Section End

}
