<?php 
session_start();

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $product_array_id = array_column($_SESSION['cart'], "product_id");
        if (!in_array($_POST["product_id"], $product_array_id)) {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_q = $_POST['product_q'];
            $product_id=$_POST['product_id'];

           
            $product_arr = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_q' => $product_q
            );
            $_SESSION['cart'][$product_id] = $product_arr;
        } else {
            echo '<script>alert("This product is already added to the cart");</script>';
           
        }
    } else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_q = $_POST['product_q'];

        $product_arr = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_q' => $product_q
        );
        $_SESSION['cart'][$product_id] = $product_arr;
    }


    totalcart();
    
}





else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];

  unset($_SESSION['cart'][$product_id]);
  totalcart();



}
else if(isset($_POST['edit_q'])) {
  $product_id = $_POST['product_id'];
  $product_q = $_POST['product_q'];
  $product_array = $_SESSION['cart'][$product_id];
  $product_array['product_q'] = $product_q;
  $_SESSION['cart'][$product_id] = $product_array;
  
  totalcart();
}


else {
   //header('location:index.php');
   
}
function totalcart()
{
  $total=0;

  foreach($_SESSION['cart'] as $key =>$value){
    $product =$_SESSION['cart'][$key];
    $price= $product['product_price'];
    $quantity = $product['product_q'];
    $total +=($price * $quantity);

  }
  $_SESSION['total']=$total;
  //return $total;
}




?>










<!DOCTYPE html>
<html lang="on">
    <head>
        <meta charset="UFT-8">
        <meta  http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="view port" content="width=device-width, initial scale=1.0">
        <title>cart</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css" />
        <style>
            .product img{
                width: 100%;
                height: auto;
                box-sizing:border-box ;
                object-fit: cover;
            }
            .pagination a{
                color: black;
            }
            .pagination li:hover a{
                color:  red;
            }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark py-3 fixed-top">
        <div class="container">
        <img class="logo" src="assets/imgs/4.jpg">
        <h2 class="brand">Brands</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
           
            <li class="nav-item">
              <a class="nav-link" href="index.php">home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="shop.php">shop</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="contact.php">cotact us</a>
            </li>

            <li class="nav-item">   
              <a href="account.php"><i class="fa-solid fa-user"></i></a>
            </li>
            <li class="nav-item">
              <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>
        
          </ul>
         </div>
        </div>
      </nav>
         <!--cart-->
         <section class="cart container my-5 py-5">
            <div class="container mt-5">
                <h2 class="font-weight-bolde" >your cart</h2>
                <hr>

            </div>
            <table class="mt-5 pt-5">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>subtotal</th>
                </tr>

                <?php foreach($_SESSION['cart'] as $key=>$value )  { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/imgs/<?php echo $value['product_image'] ?>" alt="">
                            <div>
                             <p><?php echo $value['product_name'] ?></p>
                             <small><samp>$</samp><?php echo $value['product_price'] ?></small>
                             <br>
                             <form method="POST" action="cart.php">
                             <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>" />
                              <input type="submit" name="remove_product" class="remove-btn" value="remove" style="width: 100%; background-color: white; " />
                        
                             </form>
                            </div>
                        </div>
                    </td>
                   <td>
                       <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>" />
                        <input type="number" name="product_q" value="<?php echo $value['product_q'] ?>" />
                        <input type="submit" class="edit-btn" value="edit" name="edit_q" style="background-color: white; border:none; " />
                        </form>
                    </td>
                    <td>
                        <span>$</span>
                        <span class="product-price"><?php echo $value['product_q']* $value['product_price'] ; ?></span>
                    </td>
                </tr>
                <?php }?>
            </table>
            <div class="cart-total">
                <table>
                    
                    <tr>
                        <td>Total</td>
                        <td>$ <?php echo $_SESSION['total']; ?> </td>
                    </tr>

                </table>
            </div>
          <div class="checkout">
            <form method="POST" action="checkout.php">
            <input type="submit" class="btn" value="CheckOut" name="CheckOut" style=" font-size: 0.8rem;
                  font-weight: 900;
                  outline: none;
                  border: none;
                  background-color: #1d1d1d;
                  color: aliceblue;
                  padding: 13px 30px;
                  text-transform: uppercase ;
                  cursor: pointer;
                  transition: 0.5s ease;
                   "   >
            </form>
            <!--  -->
          </div>
         </section>













        <footer id="main-footer" class="mt-3 py-5">
            <div class="row container mx-auto pt-5">
              <div class="col-la-3 col-md-6 col-sm-12">
                <img class="logo" src="assets/imgs/4.jpg">
                <p class="pt-3">we provide the best cars for the most affordable prices</p>
              </div>
              <div class="col-la-3 col-md-6 col-sm-12">
                <h5 class="pb-2">featured
                </h5>
                <ul class="text-uppercase">
                  <li><a href="#">accessories</a></li>
                  <li><a href="#">electric car</a></li>
                  <li><a href="#">used cars</a></li>
                  <li><a href="#">Buses</a></li>
                  <li><a href="#">Boats</a></li>
                  
                </ul>
              </div>
              <div class="col-la-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact us</h5>
                <div>
                  <h6 class="text-uppercase">address</h6>
                  <p>JORDAN-maan-AHU</p>

                </div>
                <div>
                  <h6 class="text-uppercase">whatsApp number </h6>
                  <p>0780058965</p>
                </div>
              </div>
              <div class="foorer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">instgram</h5>
                <div class="row">
                  <img src="assets/imgs/fot.jpg" class="img-fluid w-25 h-100 m2">
                  <img src="assets/imgs/fot1.jpg"class="img-fluid w-25 h-100 m2">
                  <img src="assets/imgs/fo3.jpg" class="img-fluid w-25 h-100 m2">
                  <img src="assets/imgs/fot2.jpg" class="img-fluid w-25 h-100 m2">
                </div>
              </div>
            </div>
            <div class="copyright mt-5">
              <div class="row container mx-auto">
                <div class=" col-lg-3 col-md-6 col-sm-12">
                  <img src="assets/imgs/py.png" alt="">
                </div>
                <div class=" col-lg-3 col-md-6 col-sm-12 text-nowrap mb-2">
                  <p>eCommerce @ 2021 All rights reserved.</p>
                </div>
                <div class=" col-lg-3 col-md-6 col-sm-12">
                 <a href="#"><i class="fab fa-facebook"></i></a>
                 <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
              </div>

            </div>
          </footer>
          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    </body>    </body>
</html>