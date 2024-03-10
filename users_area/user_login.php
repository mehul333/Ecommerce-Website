<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
body{
  overflow-x:hidden;
}
</style>
<body>
    
<div class="container-fluid my-3">
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <!-- username field -->
        <div class="col-lg-12 col-xl-6">
            <form action="" method = "post">
              <div class="form-outline mb-4">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" name="user_username">
        </div>
              


               <!-- password field -->
               <div class="form-outline mb-4">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" name="user_password">

              </div>

           
              <!-- register button -->
               <div class="mt-4 pt-2">
                <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                <p class="small fw-bold mt-2 pt-1 mb-0">Dont have an account? <a href="user_registration.php" class="text-center text-danger"> Register</a></p>
               </div>


            </form>
        </div>
    </div>
</div>
</body>
</html>


<!--   move_uploaded_file( $user_image_tmp, "./user_images/$user_image");
  $insert_query = "insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) values ('$user_username', '$user_email', ' $hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
  $sql_execute = mysqli_query($con , $insert_query); -->

  <?php

  if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];   
    $select_query = "Select * from `user_table` where username = '$user_username'";
    $result= mysqli_query($con , $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
    $select_query_cart = "Select * from `cart_details` where ip_address = '$user_ip'";
    $select_cart = mysqli_query($con , $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);  
 if($row_count>0){
        $_SESSION['username'] = $user_username;
        if(password_verify($user_password,$row_data['user_password'])){
           
           if($row_count==1 and $row_count_cart==0){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('login successfull')</script>";
            echo "<script>window.open('profile.php' , '_self')</script>";
           } else{
            $_SESSION['username'] = $user_username;
            echo "<script>alert('login successfull')</script>";
            echo "<script>window.open('payment.php' , '_self')</script>";
           }
        } else{
            echo"<script>alert('Invalid Credentials!')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials!')</script>";
    }

  }
  
?>

  