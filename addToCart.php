<?php

session_start();
include('db-connection.php');

$postData = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['username']))
{
    $id=$postData['key1'];
    $quantity=intval($postData['quantity']);
    $username=$_SESSION['username'];
    $result = $conn->query("SELECT id FROM products WHERE id='$id' "); 
    
    $result2 = $conn->query("SELECT id FROM users WHERE username='$username' "); 

    if (mysqli_num_rows($result2) > 0 && mysqli_num_rows($result) > 0)
	{
        $rowProduct = mysqli_fetch_assoc($result);
        $rowUser = mysqli_fetch_assoc($result2);
        
     
        $rowUser=$rowUser['id'];
        $rowProduct=$rowProduct['id'];
        
        $result3 = $conn->query("INSERT INTO cart (productID, userID, quantity)
        VALUES ($rowProduct, $rowUser, $quantity)"); 

        if ($result3 === true && $conn->affected_rows > 0) 
        {
            echo "Insert successful";
        } 
        else 
        {
            echo "Insert failed";
        }
        
    }
}
else
{
    echo "1";
}

?>