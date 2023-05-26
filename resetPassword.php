<?php 

    include('db-connection.php');
    session_start();
        if(isset($_SESSION['username']) && isset($_POST['oldPassword']) && isset($_POST['newPassword'] ) )
		{

			$username = $_SESSION['username'];
            $oldPassword=$_POST['oldPassword'];
            $newPassword=$_POST['newPassword'];

            $result = $conn->query("SELECT password FROM users WHERE username='$username' and password ='$oldPassword'");
            
            if (mysqli_num_rows($result) > 0)
			{
                $result2 =$conn->query("UPDATE users SET password = '$newPassword' WHERE username = '$username'");
                header("Location: logout.php");
                
            }
            else
            {
                header("Location: resetPasswordForm.php?error=Incorrect old password");
					exit();
            }

        }
        else
        {

        }


?>
