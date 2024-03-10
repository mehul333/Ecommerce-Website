<?php
include('../includes/connect.php');
// include('functions/common_functions.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .card-img-top{
        width: 100%;
        height: 200px;
         /* object-fit: contain;  */
    }
*{
    padding:0;
    margin:0;
    box-sizing: border-box;
}

.profile_img{
    width: 100%;
    margin: auto; 
    display: block;
    height: 100%;
    object-fit: contain;
}

body{
  overflow-x:hidden;
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?> </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex" role="search" method="get" action = "../search_product.php">
        <input class="form-control me-2" type="search" name = "search_data" placeholder="Search" aria-label="Search">
        <input type="submit" value="Search" class="btn btn-outline-light" name = "search_data_product">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
<!-- calling cart function  
<li class="nav-item">
          <a class="nav-link btn btn-light text-light" href="#">Welcome guest</a>
        </li>-->
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
<div class="row">
    <div class="col-md-2 p-0">
    <ul class="navbar-nav bg-secondary" style= "height:100vh"> 
        <li class="nav-item bg-info">
          <a class="nav-link text-light text-center" href="#"><h4>Your profile</h4></a>
        </li>

        <?php 
        $username = $_SESSION['username'];
        $user_image1 = "select * from `user_table` where username = '$username'";
        $result_image = mysqli_query($con , $user_image1);
        $row_image = mysqli_fetch_array($result_image);
        $user_image = $row_image['user_image'];
        echo " <li class='nav-item'>
        <img src='./user_images/$user_image' class='profile_img' alt=''>
      </li>";
     ?>
       
        <li class="nav-item">
          <a class="nav-link text-light text-center" href="profile.php">Pending orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light text-center" href="profile.php?edit_account">Edit account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light text-center" href="profile.php?my_orders">My orders</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link text-light text-center" href="profile.php?delete_account">Delete account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light text-center" href="logout.php">Logout</a>
        </li>
    </ul>

    </div>
    <div class="col-md-10 text-center">
       <?php  get_user_order_details();
       if(isset($_GET['edit_account'])){
        include('edit_acccout.php');
       }
       if(isset($_GET['my_orders'])){
        include('user_orders.php');
       }
       if(isset($_GET['delete_account'])){
        include('delete_account.php'); 
       }
        
       ?>
    </div>
</div>



    <!-- last child -->
    <!-- footer -->
    <?php   include("../includes/footer.php");  ?>

         <!-- <div class="text-center p-3 bg-info me-auto">
         <p> All rights reserved -- Designed by Mehul-2023</p>
         </div> -->


</div>
</body>
</html>
