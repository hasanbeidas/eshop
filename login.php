<?php 
session_start();
include('srever/connection.php');

if(isset($_SESSION['logged_in'])){

  header("location: account.php");
  exit();


}


if(isset($_POST['login_btn'])){

 $email =$_POST['email'];
 $password = md5($_POST['password']);

 $STMT=$conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=? AND user_password =? LIMIT 1");
 
  $STMT->bind_param("ss",$email,$password);
  
 if( $STMT->execute()){

  $STMT->bind_result($user_id,$user_name,$user_email,$user_password);
  $STMT->store_result();
  if($STMT->num_rows()==1){


    $STMT->fetch();

    $_SESSION['user_id'] =$user_id;
    $_SESSION['user_name'] =$user_name;
    $_SESSION['user_email'] =$user_email;
    $_SESSION['logged_in'] =true;
    
    header('location: account.php?message=logged in successfully');
  }
  else{


    header('location: login.php?error=no account in this email');
  }




 }



}
// else{


//   header('location: login.php?message=something went wrong');
// }




?>








<?php 
include('layout/header.php')
?>


      <!-- login -->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-3">
            <h2 class="form-weight-bold">login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
          <p style="color:red;" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
            <form action="login.php" method="POST" id="login-form">
                <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="login_btn" class="btn" id="login-btn" value="login">
                </div>
                <div class="form-group">
                    <a href="register.php" id="register-url" class="btn">Don't have account? Register</a>
                </div>
            </form>
        </div>

      </section>



        




      <?php 
include('layout/footer.php')
?>
