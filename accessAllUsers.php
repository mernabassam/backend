<?php
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<h1 class="mt-2 d-flex justify-content-center">
    User Details
</h1>
<?php
  include('db-connection.php');
  $result = $conn->query("SELECT * FROM users");
  
  if (mysqli_num_rows($result) > 0)
  {
    for($i=1;$i<=mysqli_num_rows($result);$i++)
    {
      $row = $result->fetch_assoc();  
  ?>
  
  <div class="d-flex justify-content-around my-5 ">
    
        <div class="d-flex">
            <div class="px-1">ID: </div>
            <div><?php echo $row['id'] ?></div>
        </div>
        <div class="d-flex">
            <div class="px-1">Username:</div>
        <div><?php echo $row['username'] ?></div>
        </div>
      <div class="d-flex">
        <div class="px-1">Email:</div>
        <div><?php echo $row['email'] ?></div>
      </div>
      <div class="d-flex">
        <div class="px-1">Password:</div>
        <div><?php echo $row['password'] ?></div>
      </div> 
      <div class="d-flex">
        <div class="px-1">Role:</div>
      <div><?php echo $row['role'] ?></div>
      </div>
      <div class="d-flex">
        <div class="px-1">Token:</div>
      <div><?php echo $row['code'] ?></div>
      </div>

      <?php if( $_SESSION['role']=='admin'){?>
      <button  class="btn btn-primary update" data-username=<?php echo $row["username"] ?>>Update</button>
      <button class="btn btn-danger delete" data-username=<?php echo $row["username"] ?>>Delete</button>
      <?php } ?>
    </div>
    <?php
    }}
    ?>


<body>
<div id="update-container" class="d-none">
    <div class="container">
           
                <?php if (isset($_GET['error'])) { ?>
                <div class="mt-3 alert alert-warning" role="alert"><?php echo $_GET['error']; ?></div>
                <?php } ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">what value do u want to update</label>
                <input type="text" class="form-control" id="nameOfValueGoingToChange" aria-describedby="emailHelp" name="updated-value">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">updated value</label>
            <input type="password" class="form-control" id="actualValueChanged" name="value">
            </div>
            <button type="submit" id='update-user' class="btn btn-primary">Update User</button>
        
        </div>
    </div>
    <script src="userScript.js"></script>
</body>
