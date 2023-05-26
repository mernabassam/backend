<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
      <header class="d-flex justify-content-around align-items-center bg-secondary py-2">
        <div>
          <div class="text-white">Free shipping on all orders above 75$!</div>
        </div>
        <div class="list-inline d-flex justify-content-center align-items-center w-50">
          <div class="list-inline-item white-text-anchor mx-4">
            <a href='myAccount.php'>My account</a>
          </div>
          <div class="list-inline-item white-text-anchor mx-4">
            <a href="#">Wishlist</a>
          </div>
          <div class="list-inline-item white-text-anchor mx-4">
            <a href="loginForm.php">Login</a>
          </div>
          <div class="list-inline-item white-text-anchor mx-4">
            <a href="signupForm.php">Sign up</a>
          </div>
          <div class="list-inline-item white-text-anchor mx-4">
            <a href="#">
              Cart <i class="fa-cart-shopping"></i>
            </a>
          </div>
        </div>
      </header>
      <div class="container-fluid h-100 d-flex justify-content-center align-items-center mt-5">
        <div class="row w-50">
          <div class="col-md-6 offset-md-3">
            <form method="post" action="search.php">
              <div class="input-group mb-3">
                <input type="text" class="form-control rounded-pill" name="searched-thing" placeholder="Search here what you need...">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary rounded-pill" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>      
      <header class="d-flex justify-content-around mt-3 py-3 align-items-center bg-black">
        <div>
          <img src="assets/imgs/dos-a.png" width="25%">
        </div>
        <div class="list-inline d-flex justify-content-around align-items-center w-50">
          <div class="list-inline-item white-text-anchor"><a href="#">Home</a></div>
          <div class="list-inline-item white-text-anchor"><a href="#">Women</a></div>
          <div class="list-inline-item white-text-anchor"><a href="#">Men</a></div>
          <div class="list-inline-item white-text-anchor"><a href="#">Footwear</a></div>
          <div class="list-inline-item white-text-anchor"><a href="#">Accessories</a></div>
          <div class="list-inline-item white-text-anchor"><a href="#">Sales</a></div>
          <div class="list-inline-item white-text-anchor"><a href="#">Blog</a></div>
        </div>
      </header>
      
      <div class="swap-circle">
        <img src="assets/imgs/spread-a.png" width="100%">
        
        <div class="d-flex justify-content-between">
          <div class="border rounded-circle d-flex justify-content-center arrow left p-4 ">
            <i class="fa fa-angle-right" aria-hidden="true"></i>  
          </div>
          <div class="border rounded-circle d-flex justify-content-center arrow right p-4 ">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
          </div>    
        </div>
      </div>
      
     
      
      <div class="d-flex justify-content-center">
        <div class="d-flex flex-column mr-5 w-25">
          <img src="assets/imgs/advice-c.png" width="300px">
          <h5 class="text-purple mt-5">Hot Collection</h5>
          <h2 >New Trend For Women</h2>
          <div class="text d-flex flex-wrap align-items-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio fuga dignissimos possimus laborum nam impedit sit eius veritatis corrupti officiis maxime sed odit inventore ex quibusdam, suscipit et, illo corporis.
          </div>
          <div class="w-100 d-flex justify-content-center mt-3"><button class="btn btn-outline-secondary w-50">Shop Now</button></div>

        </div>
        <div class="d-flex flex-column justify-content-between ml-5">
          <img src="assets/imgs/advice-d.png">
          <img src="assets/imgs/advice-b.png">
        </div>
      </div>

    
      <div class="d-flex mt-5 justify-content-center align-items-center">
        <div class="border border-dark d-flex just" style="width: 35%; height: 2px;"></div>
        <h3 class="px-5">Feature Items</h3>
        <div class="border border-dark " style="width: 35%; height: 2px;"></div>
      </div>
            
      <div class="mt-5 d-flex justify-content-center">
        <div class="text-secondary mx-5">All</div>
        <div class="text-secondary mx-5">Men</div>
        <div class="text-secondary mx-5">Women</div>
        <div class="text-secondary mx-5">Kids</div>
      </div>
       
      <div class="d-flex flex-wrap justify-content-center mt-5">
      <?php
      
  include('db-connection.php');
  $result = $conn->query("SELECT * FROM products");
  
  if (mysqli_num_rows($result) > 0)
  {
    for($i=1;$i<=mysqli_num_rows($result);$i++)
    {
      $row = $result->fetch_assoc();  
  ?>
  
  <div class="col-md-3">
    <div class="d-flex flex-column m-5">
      <img src="assets/imgs/hand-f.png" width="250">
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
      <?php 
    if(isset($_SESSION['role']))
    {
      if($_SESSION['role']=='admin'||$_SESSION['role']=='mod')
      {
       echo "<a class='d-flex mt-2 justify-content-center' href='edit-product.php'>edit product</a>";
      }
    }
  ?>
    </div>
  </div>
    <?php
    }}
    ?>

      </div>


      <div class="d-flex mt-5">
        <img src="assets/imgs/donts-a.png" width="50%" height="400">
        <img src="assets/imgs/donts-b.png" width="50%" height="400">
      </div>


      <div class="d-flex mt-5 justify-content-center align-items-center">
        <div class="border border-dark d-flex just" style="width: 30%; height: 2px;"></div>
        <h3 class="px-5">New Items</h3>
        <div class="border border-dark " style="width: 30%; height: 2px;"></div>
      </div>

      <div class="d-flex flex-wrap justify-content-center mt-5">
      <?php
      for ($i = 0; $i < 8; $i++) {
          ?>
          <div class="d-flex flex-column m-5">
              <img src="assets/imgs/advice-c.png" width="250">
              <div class="name text-center mt-2">dsdsdssdsdsd</div>
              <div class="d-flex justify-content-center"><img src="assets/imgs/stars.jpg" width="100"></div>
              <div class="d-flex justify-content-center">
                  <div class="mx-3">
                      <i class="fa fa-heart"></i>
                  </div>
                  <div class="mx-3">
                      <i class="fa fa-shopping-cart"></i>
                  </div>
                  <div class="mx-3">
                      <i class="fa fa-share"></i>
                  </div>
              </div>
          </div>
          <?php
      }
?>

      </div>
      
      <div class="w-100 d-flex justify-content-center mt-3"><button class="btn btn-outline-secondary w-15">Load more</button></div>
     
      <div class="background-pic mt-5">
        <div class="d-flex flex-column justify-content-center h-100 w-100 align-items-center">
          <img src="assets/imgs/png-transparent-quotation-mark-computer-icons-text-manuscript-quote-purple-violet-rectangle.png" width="250">
          <div class="text w-50">Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Cupiditate odio praesentium aliquam illum provident labore rerum voluptates eveniet, 
            excepturi esse nemo ullam quibusdam voluptate qui saepe sed dolorum tenetur mollitia!
          </div>
          <img src="assets/imgs/advice-a.png">
          <h4 class="text-green">MD Shalin Alam</h4>
          <h6 class="text-secondary">CCEO OF TTCM</h6>
        </div>
      </div>

      <div class="d-flex mt-5 justify-content-center align-items-center">
        <div class="border border-dark d-flex just" style="width: 35%; height: 2px;"></div>
        <h3 class="px-5">Latest Blog</h3>
        <div class="border border-dark " style="width: 35%; height: 2px;"></div>
      </div>

      <div class="d-flex justify-content-center">
      <?php
        for ($i = 0; $i < 3; $i++) {
            ?>
            <div class="d-flex flex-column mr-5 mt-5 w-25">
                <img src="assets/imgs/advice-d.png" width="300px">
                <h5 class="mt-3">Some headline here</h5>
                <div class="text d-flex flex-wrap align-items-center mt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio fuga dignissimos possimus laborum nam impedit sit eius veritatis corrupti officiis maxime sed odit inventore ex quibusdam, suscipit et, illo corporis.
                </div>
                <div class="w-100 d-flex justify-content-center mt-3"><button class="btn btn-outline-secondary w-50">Read more</button></div>
            </div>
            <?php
        }
      ?>
      </div>  

      <div class="d-flex mt-5 justify-content-center align-items-center">
        <div class="border border-dark d-flex just" style="width: 35%; height: 2px;"></div>
        <h3 class="px-5">Shop by brand</h3>
        <div class="border border-dark " style="width: 35%; height: 2px;"></div>
      </div>

      <div class="d-flex justify-content-center mt-5 ">
      <?php
        for ($i = 0; $i < 4; $i++) {
            ?>
            <div class="d-flex justify-content-center align-items-center mx-5">
                <img src="assets/imgs/themefores.png" width="100">
                <h4 class="text-black">Themeforest</h4>
            </div>
            <?php
        }
      ?>

      </div>
      <footer class="my-5">
        <div class="d-flex  justify-content-center">
        <?php
          for ($i = 0; $i < 3; $i++) {
              ?>
              <div class="footer-section mx-5">
                  <h3>Shops</h3>
                  <ul class="list-unstyled">
                      <li>New in</li>
                      <li>Women</li>
                      <li>Men</li>
                      <li>Schune shoes</li>
                      <li>Bags and accessories</li>
                      <li>Top brands</li>
                      <li>Sale and Special offers</li>
                      <li>Lookbook</li>
                  </ul>
              </div>
              <?php
          }
          ?>
          <div class="footer-section mx-5">
            <h3>Newsletter</h3>
            <ul class="list-unstyled">
              <li>Signup for for news leter</li>
              <li>
                <form>
                  <div class="input-group my-3">
                    <input type="text" class="form-control rounded-pill" placeholder="Type your email">
                  </div>
                </form>
              </li>
              <li><button class="btn btn-pink w-100">Subscribe</button></li>
              <li>
                <div class="d-flex w-100 mt-3">
                  <i class="fa fa-facebook-square fa-2x mx-1"></i>
                  <i class="fa fa-twitter-square fa-2x mx-1"></i>
                  <i class="fa fa-youtube-square fa-2x mx-1"></i>


                </div>
              </li>
            </ul>
          </div>
        </div>
      </footer>

      <footer class=" text-white black-footer py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
              <div class="px-5">&copy; EELA Fashion store</div>
              <div class="font-size-small d-flex justify-content-center align-items-center">
                 Shopify all rights are reserved. Eccomerce shop by shopify
              </div>
            </div>
            <div class="d-flex justify-content-center mr-5">
              <ul >
                <li class="list-inline-item"><i class="fa fa-cc-visa fa-3x"></i></li>
                <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-3x"></i></li>
                <li class="list-inline-item"><i class="fa fa-cc-paypal fa-3x"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      
      <script src="script.js"></script>
</body>
</html>