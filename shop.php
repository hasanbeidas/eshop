<?php

include('srever/connection.php');

$STMT= $conn -> prepare("SELECT * FROM products ");

$STMT ->execute();

$products= $STMT -> get_result();








?>








<?php 
include('layout/header.php')
?>


           <!--fet-->
           <section id="shop" class="my-5 py-5" >
         
            <div class="row mx-auto container">
              <?php while ($row =$products->fetch_assoc() ) { ?>

              <div onclick="window.location.href='single_product.php'" class="product text-center col-lg-3 col-md-4 col-sm-12" >
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" >
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">$<?php echo $row['product_name']; ?> </h5>
                <h4 class="p-price">$<?php  echo $row['product_price']; ?></h4>

              <a class="btn buy-btn" href="<?php echo"single_product.php?product_id=".$row['product_id'] ?>" style="color:white;"> buy now</a>
              </div>

              <?php }?>


             
              <nav aria-label="page navigation">
                <ul class="pagination mt-5">
                    <li class="page-item"><a class="page-link" href="#">previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">next</a></li>
                    
                </ul>
              </nav>
            </div>

          </section>


          <?php 
include('layout/footer.php')
?>
