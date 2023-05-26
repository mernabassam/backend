<?php 

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['token']!=NULL &&$_SESSION['role']=="user") 
{
  
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
     <a href="logout.php">Logout</a>
	 <a href="resetPasswordForm.php">Reset Password</a>
</body>
</html>

<?php 
}
else if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['token']!=NULL &&($_SESSION['role']=="admin"||$_SESSION['role']=="mod")) 
{
  
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['username']; ?> Your Admin</h1>
     <a href="logout.php">Logout</a>
	<a href="resetPasswordForm.php">Reset Password</a>
     <a href="accessAllUsers.php">Access all users</a>
     <a href="accessAllProducts.php">Access all products</a>
</body>
</html>

<?php 
}
else
{
     header("Location: loginForm.php");
     exit();
}
 ?>