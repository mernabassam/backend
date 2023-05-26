<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<?php
include('db-connection.php');
$searched=$_POST['searched-thing'];
session_start();
$result = $conn->query("SELECT * FROM products WHERE name LIKE '%$searched%';
");
$numOfSearches=mysqli_num_rows($result);
echo "<h5 class='w-100 d-flex justify-content-center mt-5'>You searched for $searched and $numOfSearches items appeared:    </h5>";
?>
<div class="d-flex flex-wrap justify-content-center mt-5">
  
<?php
  include('db-connection.php');
  $searched=$_POST['searched-thing'];
 
  $result = $conn->query("SELECT * FROM products WHERE name LIKE '%$searched%';
  ");
  if (mysqli_num_rows($result) > 0)
  {
    for($i=1;$i<=mysqli_num_rows($result);$i++)
    {
      $row = $result->fetch_assoc()  
  ?>
  
  <div class="col-md-3">
    <div class="d-flex flex-column m-5">
      <img src="assets/imgs/advice-a.png" width="250">
      <div class="name text-center"><?php echo $row["name"] ?></div>
      <div class="d-flex justify-content-center"><img src="assets/imgs/stars.jpg" width="100"></div>
      <div class="d-flex justify-content-center">
        <div class="mx-3">
        <button class="btn"><i class="fa fa-heart"></i></button>
        </div>
        <div class="mx-3">
            <button class="btn buttons"><i class="fa fa-shopping-cart" id="buttonProduct<?php echo $i; ?>"></i></button>
        </div>
        <div class="mx-3">
        <button class="btn"><i class="fa fa-share"></i></button>
        </div>
      </div>
    </div>
  </div>

    <?php
    }}
?>
</div>
<script src="script.js"></script>