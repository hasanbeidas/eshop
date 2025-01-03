<?php 

include('srever/connection.php');

if (isset($_GET['product_id']))
{
  $product_id = $_GET['product_id'];

  $STMT = $conn ->prepare(" SELECT * FROM products WHERE product_id = ?");

  $STMT->bind_param("i", $product_id);

  $STMT->execute();
 
  $products = $STMT->get_result();

  


  
  

}
else
{
  header("Location: index.html");
}





?>







<?php 
include('layout/header.php')
?>


          <section class="container single-product my-5 pt-5">
            <div class="row mt-5">

              <?php while( $row = $products -> fetch_assoc()){ ?>

               

                <div class="col-lg-5 col-md-6 col-sm-12">
                    <img class="img-fluid width-100 pb-1" src="assets/imgs/<?php echo $row['product_image'] ?>" id="mainimg">
                    <div class="small-img-groub">
                        <div class="small-img-col">
                            <img src="assets/imgs/<?php echo $row['product_image'] ?>" width="100%" class="small-img" />
                        </div>
                        <div class="small-img-col">
                            <img src="assets/imgs/<?php echo $row['product_image2'] ?>" width="100%" class="small-img" />
                        </div>
                        <div class="small-img-col">
                            <img src="assets/imgs/<?php echo $row['product_image3'] ?>" width="100%" class="small-img" />
                        </div>
                        <div class="small-img-col">
                            <img src="assets/imgs/<?php echo $row['product_image4'] ?>" width="100%" class="small-img" />
                        </div>
                    </div>
                </div>
              

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h6><?php echo $row['product_category']; ?></h6>
                    <h3 class="py-4"> <?php echo $row['product_name']; ?></h3>
                    <h2>$<?php echo $row['product_price'] ;?></h2>
                    <form method="POST" action="cart.php">
                         <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>" />
                         <input type="hidden" name="product_image" value="<?php echo $row['product_image'] ?>" />
                         <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>" />
                         <input type="hidden" name="product_price" value="<?php echo $row['product_price']?>"/>
                         <input type="number" name="product_q" value="1">
                         <button class="buy-btn" type="submit" name="add_to_cart">Add to cart</button>
                    </form>
                    <h4 class="mt-t mb-5">prouduct details</h4>
                   
                    <span> <?php echo $row['product_description']; ?>  </span>
                </div> 

             

                <?php } ?>   
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
               
            </div>
          </section>





        

                <script>
          var mainimg = document.getElementById("mainimg");
          var smallimg = document.getElementsByClassName("small-img");
          for (let i = 0; i < 4; i++) {
            smallimg[i].onclick = function()
          {
            mainimg.src=smallimg[i].src;
          }
            
          }
          
          

         </script>
   
<?php 
include('layout/footer.php')
?>

