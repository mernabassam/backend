<?php

	include ("db-connection.php");

    
//Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use League\OAuth2\Client\Provider\Google;
    require 'vendor/autoload.php';
    //Load Composer's autoloader

    
    function sendEmail_verify($name,$email,$code)
    {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
            $mail->Username = 'maromoussa88@gmail.com';   //email
            $mail->Password = 'edudxuagukytgpty' ;   //16 character obtained from app password created
            $mail->Port = 465;                    //SMTP port
            $mail->SMTPSecure = "ssl";
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //sender information
            $mail->setFrom('maromoussa88@gmail.com', $name);

            //receiver email address and name
            $mail->addAddress($email); 

            
            
            $mail->isHTML(true);
            
            $mail->Subject = 'PHPMailer SMTP test';
            $mail->Body    = "<h4> Thank you for signing up please press on the link to verify </h4>
            
                <a href=' http://localhost/PHP/project-rahaf/verify-email.php?token=$code'>click me </a>";

            // Send mail   
           $mail->send();
            echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
            $mail->smtpClose();


    }

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $code = md5(rand());

        
            // assume $conn is a MySQLi object connected to your database

        $result1 = $conn->query("SELECT * FROM users WHERE username='$username'");
        if (mysqli_num_rows($result1) > 0)
        {
            header("Location: signupForm.php?error= Username already taken");
					exit();
        }
        else
        { 
            
            sendEmail_verify("$username","$email","$code");
            echo "email sent";
            $result2 = $conn->query("INSERT INTO users (username, email, password,role) VALUES ('$username', '$email', '$password','user')");
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header("Location: signupForm.php?error= Signed up successfully Please log in verify email");
			
            
            
        }
    }
?>