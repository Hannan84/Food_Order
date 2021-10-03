<?php
// include database connection
include_once 'db_connection.php';

class Order extends Database{
//    Display Order data from Database
    public function displayOrder(){
//        Create sql query to display order data
        $sql = "SELECT * FROM tbl_order";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Check whether the Query Execute or not
        if ($result == true){

//            Get the Array to store data
            $data = [];

//            Using while loop to get all the data from database
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }return $data;
        }
    }

//    View Order to get all the single Data from Database
    public function viewOrder(){
//        Check whether the id is passed or not
        if (isset($_GET['Order_id'])){
//        Get the order id
            $id = $_GET['Order_id'];
//          Create Sqo query to view Order data
            $sql = "SELECT * FROM tbl_order WHERE id = '$id'";

//          Execute the Query
            $result = $this->conn->query($sql);

//        Checked whether the query execute or not
            if ($result == true){
//              check whether the data is available or not
                if ($result->num_rows > 0 ){
                    $row = $result->fetch_assoc();
                    return $row;
                }
                else{
//              redirect to page
                    header('location: manage_order.php');
                }
            }
        }
        else{
//            Food_id not passed
//            Redirect Home page
            header('location: manage_order.php');
        }

    }

//    Update Data into Order table
    public function updateOrder(){

//      Get data from form
        $id = $_GET['Order_id'];
        $qty = $this->conn->real_escape_string($_POST['qty']);
        $price = $this->conn->real_escape_string($_POST['price']);
        $total = $qty * $price;
        $status = $_POST['status'];

//        Sql Query to update data into database
        $sql = "UPDATE tbl_order SET qty = '$qty',total = '$total', status = '$status' WHERE id = '$id'";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Check whether the Query is execute or not
        if ($result == true){
            $_SESSION['update'] = "Success!";
//            redirect to manage admin page
            header('location: manage_order.php');
        }else{
            $_SESSION['not_update'] = "Warning!";
        }
    }

//    Create the Query to get Total revenue
    public function totalRevenue(){
//        Create the Query to get revenue generate
//        Aggregate function
        $sql = "SELECT SUM(total) AS Total FROM tbl_order WHERE status = 'Delivered'";

//        Execute the Query
        $result = $this->conn->query($sql);

        $raw = $result->fetch_assoc();
        return $raw;
    }
}
