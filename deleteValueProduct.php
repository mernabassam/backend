<?php

session_start();
include('db-connection.php');

$postData = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['username']))
{
        $id=$postData['key3'];
        
        echo $username;
        $sql = "DELETE FROM products WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) 
        {
            echo "product deleted Successfully";
        } 
        else 
        {
            echo "Error deleting product: " . mysqli_error($conn);
        }
    
}
?>