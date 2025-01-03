
<?php 
include('layout/header.php')
?>











          <!-- home -->
          <section id="home">
            <div class="container">
              <h5>NEW ARRIVALS</h5>
              <h1><span>Best Prices</span>  This season</h1>
              <p>eshop offers the best cars  </p>
              <button>Shop Now</button>
            </div>
          </section>

          <!--BRANDS-->
          <section id="brand" >
            <div class="row" >
                <img class="img-fluid w-25 h-100 m2" src="assets/imgs/hh.jpeg"  />
                <img class="img-fluid w-25 h-100 m2" src="assets/imgs/hh2.jpg"  />
                <img class="img-fluid w-25 h-100 m2" src="assets/imgs/hh3.jpg"   />
                <img class="img-fluid w-25 h-100 m2" src="assets/imgs/hh4.jpeg"    />
            </div>
          </section>
          <!--new-->
          <section id="new" class="w-100" >
            <div class="row p-0 m-0">
              <!--one-->
              <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/5.png" alt="car"/>
                  <div class="details">
                    <h2>toyota camry</h2>
                    <button class="text-uppercase">buy now</button>

                  </div>
              </div>
              <!--two-->
              <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/6.jpg" alt="car"/>
                  <div class="details">
                    <h2>toyota hilux</h2>
                    <button class="text-uppercase">buy now</button>

                  </div>
              </div>

              <!--three-->
              <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/7.jpg" alt="car"/>
                  <div class="details">
                    <h2>toyota prius</h2>
                    <button class="text-uppercase">buy now</button>
                  </div>
              </div>
            </div>
          </section>

          <!--sedan-->
          <section id="featured" class="my-5 pb-5" >
            <div class="container text-center mt-5 py-5">
              <h3>sedan cars</h3>
              <hr class="mx-auto ">
              <p>new arraiv</p>
            </div>
            <div class="row mx-auto container-fluid">
              <?php include('srever\get_sedan_products.php'); ?>
              <?php while($row = $sedan_products->fetch_assoc()){ ?>


              <div class="product text-center col-lg-3 col-md-4 col-sm-12" >
                <div class="im-sedan"  >
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"  width="100%" height="50%">
              </div>
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?>  </h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?> </h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"> <button class="buy-btn">buy now</button> </a>
              </div>
              <?php }?>
              
            </div>

          </section>
          <!--banner-->
          <section id="banner" class="my-5 py-5">
            <div class="container">
              <h4>MID SEASON SALS</h4>
              <h1>new<br />UP to 25%off </h1>
              <button class="text-uppercase">take it</button>

            </div>
          </section>
          <!--sport cars-->
          <section id="featured" class="my-5" >
            <div class="container text-center mt-5 py-5">
              <h3>sport car</h3>
              <hr class="mx-auto ">
              <p>her you can see all the cars </p>
            </div>
            <div class="row mx-auto container-fluid">
            <?php include('srever\get_sport.php'); ?>
              <?php while($row = $sport_products->fetch_assoc()){ ?>
              <div class="product text-center col-lg-3 col-md-4 col-sm-12" >
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" >
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?> </h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"> <button class="buy-btn">buy now</button> </a>
              </div>
              <?php } ?>
            </div>

          </section>
          <!--4x4 -->

          <section id="featured" class="my-5" >
            <div class="container text-center mt-5 py-5">
              <h3>4x4 car</h3>
              <hr class="mx-auto ">
              <p>her you can see all the cars </p>
            </div>
            <div class="row mx-auto container-fluid">
              <?php include('srever\get_4x4.php'); ?>
              <?php while($row = $car4x4->fetch_assoc()){ ?>


              <div class="product text-center col-lg-3 col-md-4 col-sm-12" >
                <div class="im-sedan"  >
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"  width="100%" height="50%">
              </div>
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?>  </h5>
                <h4 class="p-price">$<?php echo $row['product_price']; ?> </h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"> <button class="buy-btn">buy now</button> </a>
              </div>
              <?php }?>
              
            </div>

          </section>


          <?php 
include('layout/footer.php')
?>

