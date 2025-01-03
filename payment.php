<?php 


session_start();









?>





<?php 
include('layout/header.php')
?>


      <!-- payment -->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-3">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">
            <p>order place successfully</p>
           
            <p>Total payment:$<?php if(isset($_SESSION['total'])){ echo $_SESSION['total']; ?></p> 
            <input class="btn btn-primary" type="submit" value="Pay now" />
            <?php }?>
            
        </div>

      </section>
      
      <?php 
include('layout/footer.php')
?>
