<?php
include('includes/connect.php');
// include('functions/common_functions.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E commerce website-Cart details</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .card-img-top{
        width: 80%;
        height: 200px;
        /* object-fit: contain; */
    }
*{
    padding:0;
    margin:0;
    box-sizing: border-box;
}

.cart_image{
    width: 70px;
    height: 70px;
    object-fit: contain;
}

</style>
<body>
    <div class="container-fluid p-0 m-0">
<nav class="navbar navbar-expand-lg  bg-info">
  <div class="container-fluid p-0 m-0">

    <!-- <img src="C:\xampp\htdocs\Ecommerce website\images2.jpg" alt="cart"> -->
    <!-- <a class="navbar-brand" href="#">Logo</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php  total_cart_price(); ?> </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
<!-- calling cart function -->
<?php cart(); ?>
<!-- second child -->
<div class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar nav me-auto">
       
        <?php 
                if(!isset($_SESSION['username'])){
                  echo " <li class='nav-item'>
                       <a class='nav-link btn btn-light text-light' href='#'>Welcome guest</a>
                     </li>";
                } else {
                  echo " <li class='nav-item'>
                        <a class='nav-link btn btn-light text-light' href='./users_area/logout.php'>Welcome ".$_SESSION['username']."</a>
                      </li>";
                }
        if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
                   <a class='nav-link btn btn-light text-light' href='./users_area/user_login.php'>Login</a>
                 </li>";
        } else {
          echo " <li class='nav-item'>
                <a class='nav-link btn btn-light text-light' href='./users_area/logout.php'>Logout</a>
              </li>";
        }
        
        
        ?>
</ul>
</div>

<!-- third child -->
<div class="bg-light">
    <h2 class="text-center">Hidden store </h2>
        <p class="text-center">Communications is at the heart of e-commerce and community</p>
</div>

<!-- fourth child -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <!-- <thead>
                <tr>
                    <th>Product title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead> -->
            <tbody>
                <!-- php code to display dynamic data -->

                <?php

                // global $con;
                $get_ip_add = getIPAddress();
                $total_price=0;
    $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
    $result = mysqli_query($con , $cart_query);
    $result_count = mysqli_num_rows($result);
    if($result_count>0){
      echo "<thead>
      <tr>
          <th>Product title</th>
          <th>Product Image</th>
          <th>Quantity</th>
          <th>Total price</th>
          <th>Remove</th>
          <th colspan='2'>Operations</th>
      </tr>
  </thead>";
    
    while($row = mysqli_fetch_array($result)){
      $product_id = $row['product_id'];
      $select_products = "Select * from `products` where product_id = '$product_id'";
      $result_products = mysqli_query($con , $select_products);
      while($row_product_price = mysqli_fetch_array($result_products)){
               $product_price = array($row_product_price['product_price']);
               $price_table = $row_product_price['product_price'];
               $product_title = $row_product_price['product_title'];
               $product_image1 = $row_product_price['product_image1'];
               $product_values = array_sum($product_price);
               $total_price += $product_values;
                ?>
                <tr>
                    <td> <?php echo $product_title ?> </td>
                    <td><img src="images/<?php echo $product_image1 ?>" class="cart_image" alt=""></td>
                    <td><input type="text" class="form-input w-50" name="qty"></td>
                    <?php
                    //    $get_ip_add = getIPAddress();
                       $get_ip_add = getIPAddress();
                       if(isset($_POST['update_cart'])){
                            $quantities = $_POST['qty'];
                            $update_cart = "update `cart_details` set quantity = $quantities where ip_address='$get_ip_add'";
                            $result_products_quantity = mysqli_query($con,$update_cart);
                            $total_price = $total_price*$quantities;
                       }
                    ?>
                    <td><?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php   echo
                       $product_id ?>"></td>
                    <td>
                        <input type="submit" class="bg-info px-2 py-1 mx-3" name="update_cart" value="Update cart">
                        <!-- <button class="bg-info px-2 py-1 mx-3">Update</button> -->
                        <!-- <button class="bg-info px-2 py-1 mx-3">Remove</button> -->
                        <input type="submit" class="bg-info px-2 py-1 mx-3" name="remove_cart" value="Remove cart">
                </td>
                </tr>
                <?php
                   }}}
                   else{
                    echo "<h2 class='text-center text-danger'> Cart is Empty! </h2>" ;
                   }
                          
                ?>
            </tbody>
        </table>
        <div class="d-flex mb-5 mt-3">
          <?php 
          $get_ip_add = getIPAddress();
          // $total_price=0;
$cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
$result = mysqli_query($con , $cart_query);
$result_count = mysqli_num_rows($result);
if($result_count>0){
  echo " <h4 class='px-3'>Subtotal: <b class='text-info'>  $total_price </b></h4>
             <input type='submit' class='bg-info px-2 py-1 mx-3' name='continue_shopping' value='Continue Shopping'>
          <button class='bg-secondary px-2 py-2 mx-3'> <a href='users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button> ";
}else{
 echo " <input type='submit' class='bg-info px-2 py-1 mx-3' name='continue_shopping' value='Continue Shopping'>";
}
if(isset($_POST['continue_shopping'])){
  echo "<script> window.open('index.php' , '_self')</script>";
}
          
          
          ?>
        
        </div>

    </div>
</div>
</form>

<!-- function to remove cart item -->
<?php
function remove_cart_item(){
  global $con;
if(isset($_POST['remove_cart'])){
  foreach($_POST['removeitem'] as $remove_id){
          echo $remove_id;
          $delete_query = "delete from `cart_details` where product_id = $remove_id";
          $run_delete = mysqli_query($con ,$delete_query); 
          if($run_delete){
             echo "<script>window.open('cart.php' , '_self')</script>";
          }
  }
}
}

echo $remove_item = remove_cart_item();
?>

    <!-- footer -->
    <?php   include("./includes/footer.php");  ?>

         <!-- <div class="text-center p-3 bg-info me-auto">
         <p> All rights reserved -- Designed by Mehul-2023</p>
         </div> -->


</div>
</body>
</html>



<!--   $select_query = "Select * from `user _table` where username = '$user_username' or user_email='$user_email'";
   $result = mysqli_query($con , $select_query);
   $rows_count = mysqli_num_rows($result);
   if($rows_count>0){
    echo "<script>alert('Username and email already exist')</script>";
   } else if($user_password != $conf_user_password){
    echo "<script>alert('passwords donot match!')</script>";
   } else{
    
   } --> 