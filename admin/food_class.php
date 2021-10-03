<?php
// include database connection
include_once 'db_connection.php';

class Food extends Database{
//    Insert data into food table
    public function AddFood(){
//      Get data from form
        $title = $this->conn->real_escape_string($_POST['title']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $price = $this->conn->real_escape_string($_POST['price']);
        $category = $this->conn->real_escape_string($_POST['category']);

//      For radio input, we need to check whether the button is selected or not
        if (isset($_POST['featured'])){
//          Get the value from form
            $feature = $_POST['featured'];
        }
        else{
            $feature = 'No';
        }
        if (isset($_POST['active'])){
//            Get the value from form
            $active = $_POST['active'];
        }
        else{
            $active = 'No';
        }
//      Check whether the image select or not and set the value for image accordingly
        if ($_FILES['image']['error'] <= 0){

//         Upload the Image
//         To upload image we need image name,source name and destination path
            $image_name = $_FILES['image']['name'];

//          Auto Rename our image
//          Get the Extension of our image (jpg,png,gif,etc)
            $exp_name = explode('.',$image_name);
            $ext = end($exp_name);
//          Rename the Image
            $image_name = "Food_Category-".rand(000,999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/food/".$image_name;

//          Finally upload the image
            move_uploaded_file($source_path,$destination_path);
        }
        else{
//           Don't upload image and set the image_name value as blank
            $image_name = "";
        }

//        Create sql query to insert category into database
        $sql = "INSERT INTO tbl_food VALUES (null, '$title','$description','$price','$image_name','$category', '$feature', '$active')";

//        Executing query and save data into database

        $result = $this->conn->query($sql);

//        Check whether the query execute or not
        if ($result == true){
//               Create a session variable to display massage
            $_SESSION['insert'] = 'Success!';
//               Redirect to manage admin page
            header('location: manage_food.php');
        }
        else{

//               Create a session variable to display massage
            $_SESSION['not_insert'] = 'Warning!';

        }
    }
//  Display Food from Food Table
    public function displayFood(){
//      Create sql query to show data from database
        $sql = "SELECT * FROM tbl_food";

//      Execute the query
        $result = $this->conn->query($sql);

//      Check whether the query execute or not
        if ($result == true){

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()){
                $data[] = $raw;
            }return $data;
        }
    }

//  Create display categories to get all active data from database
    public function activeCategory(){
//      Create sql to get all active categories from database
        $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

//        Execute the query
        $result = $this->conn->query($sql);

//      Check whether the query execute or not
        if ($result == true){

//          Get array to store data
            $data = [];

//          using while loop to get all the data from database
            while ($raw = $result->fetch_assoc()){
                $data[] = $raw;
            }return $data;
        }
    }

//  Delete Data into food table
    public function deleteFood()
    {
//        Check whether the id and image value is set or not
        if (isset($_GET['id']) AND isset($_GET['image'])){


            //       Get the id  and image of select Category Data
            $id = $_GET['id'];
            $image = $_GET['image'];

//          Remove the physical image file is available
            if ($image != ""){
                $path = "../images/food/".$image;
                unlink($path);
            }

            //        Create sql query to delete data into database
            $sql = "DELETE FROM tbl_food WHERE id = '$id'";

            //        Execute the Query
            $result = $this->conn->query($sql);

            //        Check whether the Query is execute or not
            if ($result == true) {
                $_SESSION['delete'] = "Success!";
                //            redirect to manage Category page
                header('location: manage_food.php');
            } else {
                echo "Delete Not Success";
            }
        }
    }

//    Get a single data from database
    public function veiwData(){
//       Get the id of select Food Data
        $id = $_GET['id'];

//       Create Sql Query to show single data
        $sql = "SELECT * FROM tbl_food WHERE id = '$id'";

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
                header('location: manage_food.php');
            }
        }
    }

//  Update Data into food table
    public function updateFood(){

//      Get data from form
        $id = $_GET['id'];
        $title = $this->conn->real_escape_string($_POST['title']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $price = $this->conn->real_escape_string($_POST['price']);
        $current_image = $_POST['current_image'];
        $category_id = $_POST['category_id'];
        $featured = $_POST['featured'];
        $active  = $_POST['active'];

//      Check whether the image select or not and set the value for image accordingly
        if ($_FILES['image']['error'] <= 0){

//         Get the image details
            $image_name = $_FILES['image']['name'];

//          Check whether the image is available or not
            if ($image_name != ""){
//            Auto Rename our image
//            Get the Extension of our image (jpg,png,gif,etc)
                $exp_name = explode('.',$image_name);
                $ext = end($exp_name);
//            Rename the Image
                $image_name = "Food_Category-".rand(000,999).'.'.$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/food/".$image_name;

//            Finally upload the image
                move_uploaded_file($source_path,$destination_path);

//              Remove the physical image file is available
                $path = "../images/food/".$current_image;
                unlink($path);

            }

        }
        else{
//           Don't upload image and set the image_name value as blank
            $image_name = $current_image;
        }

//        Sql Query to update data into database
        $sql = "UPDATE tbl_food SET title = '$title',description = '$description',price = '$price', image = '$image_name',category_id = '$category_id', featured = '$featured', active = '$active' WHERE id = '$id'";

//        Execute the Query
        $result = $this->conn->query($sql);

//        Check whether the Query is execute or not
        if ($result == true){
            $_SESSION['update'] = "Success!";
//            redirect to manage Category page
            header('location: manage_food.php');
        }else{
            $_SESSION['not_update'] = "Warning!";
        }
    }
}