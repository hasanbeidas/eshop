<?php 


session_start();
if(!empty($_SESSION['cart']) && isset($_POST['CheckOut'])){





}else{

  header('location: index.php');



}








?>






<?php 
include('layout/header.php')
?>



      <!-- checkout -->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-3">
            <h2 class="form-weight-bold">checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="srever/place_order.php" method="POST" id="checkout-form" >
                <div class="form-group checkout-small-element">
                    <label >Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label >Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label >phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="phone" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label >city</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="city" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label >address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="address" required>
                </div>
                <div class="form-group checkout-btn-container">
                  <p>Total amuont:$ <?php echo $_SESSION['total'] ?> </p>
                    <input type="submit" class="btn" id="checkout-btn" value="place order" name="place_order">
                </div>
               
            </form>
        </div>

      </section>
      
      <?php 
include('layout/footer.php')
?>
