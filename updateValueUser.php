<?php

session_start();
include('db-connection.php');

$postData = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['username']))
{

    
        $nameOfValueGoingTochange=$postData['key1'];
        $actualValueGoingToChange=$postData['key2'];
        $username=$postData['key3'];
        
        echo $nameOfValueGoingTochange;
        echo $actualValueGoingToChange;
        echo $username;
        $sql = "UPDATE users SET $nameOfValueGoingTochange = '$actualValueGoingToChange' WHERE username = '$username'";
        if (mysqli_query($conn, $sql)) 
        {
            echo "User Updated Successfully";
        } 
        else 
        {
            echo "Error inserting user: " . mysqli_error($conn);
        }
    
}
?>