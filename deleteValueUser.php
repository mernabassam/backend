<?php

session_start();
include('db-connection.php');

$postData = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['username']))
{
        $username=$postData['key3'];
        
        echo $username;
        $sql = "DELETE FROM users WHERE username = '$username'";

        if (mysqli_query($conn, $sql)) 
        {
            echo "User deleted Successfully";
        } 
        else 
        {
            echo "Error inserting user: " . mysqli_error($conn);
        }
    
}
?>