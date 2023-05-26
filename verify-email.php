<?php
session_start();
  
include('db-connection.php');

if(isset($_SESSION['username']) && !isset($_SESSION['token']))
{
    $token = $_GET['token'];
    $username =$_SESSION['username'];
    $_SESSION['token']=$token;

    $sql = "UPDATE users SET code = '$token' WHERE username = '$username'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
      echo "your email was verified successfully";
    } 
    else 
    {
        echo "Error inserting user: " . mysqli_error($conn);
        header("Location login.php");
    }
 
}
else
{
    header("Location login.php");
    session_unset();
    session_destroy();
}

?>