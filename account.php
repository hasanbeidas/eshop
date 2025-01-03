<?php
session_start();
include('srever/connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $email = $_SESSION['user_email'];
    
    if ($password !== $confirmPassword) {
        header('location: account.php?error=Passwords do not match');
        exit;
    } elseif (strlen($password) < 6) {
        header('location: account.php?error=Passwords must be at least 6 characters');
        exit;
    } else {
        $hashedPassword = md5($password);
        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss', $hashedPassword, $email);
        if ($stmt->execute()) {
            header('location: account.php?message=Password has been changed');
            exit;
        } else {
            header('location: account.php?error=Something went wrong');
            exit;
        }
    }
}


if(isset($_SESSION['logged_in'])){

  
  $STMT= $conn -> prepare("SELECT * FROM orders WHERE user_id=?");
  $STMT -> bind_param('s', $_SESSION['user_id']);

  $STMT ->execute();

$orders= $STMT -> get_result();
}
?>


<?php 
include('layout/header.php')
?>


    <!-- account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name: <span><?php echo $_SESSION['user_name']; ?></span></p>
                    <p>Email: <span><?php echo $_SESSION['user_email']; ?></span></p>
                    <p><a href="#orders" id="orders-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form method="POST" action="account.php" id="account-form">
                    <p class="text-center" style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                    <p class="text-center" style="color:green;"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>     
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="account-password">Password</label>
                        <input type="password" name="password" id="account-password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="account-password-confirm">Confirm Password</label>
                        <input type="password" name="confirm_password" id="account-password-confirm" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="change_password" value="Change Password" class="btn" id="change-pass-btn" >
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bolde text-center">Your orders</h2>
            <hr class="mx-auto ">
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>order id</th>
                <th>order cost</th>
                <th>order status</th>
                <th>Date</th>
            </tr>
            <?php while($row=$orders->fetch_assoc()) {?>
            <tr>
                <td>
                    <!-- <div class="product-info">
                         <img src="assets/imgs/5.png" alt=""> 
                        <div>
                            <p class="mt-3"><?php echo $row['order_id']; ?></p>

                        </div>
                    </div> -->
                       <span>
                            <?php echo $row['order_id']; ?>
                        </spa>


                </td>
                <td>
                        <span>
                            <?php echo $row['order_cost']; ?>
                        </span>

                </td>
                <td>
                        <span>
                            <?php echo $row['order_status']; ?>
                        </span>

                </td>
                <td>
                        <span>
                            <?php echo $row['order_date']; ?>
                        </span>

                </td>
                
            </tr>
            <?php }?>
        </table>
    </section>

    <!-- FOOTER -->
    <?php 
include('layout/footer.php')
?>

