<?php

session_start();
include('db-connection.php');

$postData = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['username']))
{

    
        $nameOfValueGoingTochange=$postData['key1'];
        $actualValueGoingToChange=$postData['key2'];
        $id=$postData['key3'];
        
        $sql = "UPDATE products SET $nameOfValueGoingTochange = '$actualValueGoingToChange' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) 
        {
            echo "Products Updated Successfully";
        } 
        else 
        {
            echo "Error updating product: " . mysqli_error($conn);
        }
    
}
?>