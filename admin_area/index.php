<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <!-- font awesome link -->
       <!-- font awesome link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       

</head>
<style>
.logo{
    width: 7%;
    height: 7%;
}
.admin_image{
    width:100px;
    height: 100px;
    object-fit : contain;
}
.lastchild{
    position: absolute;
}
body{
    overflow-x: hidden;
}
.product_img{
    width: 100px;
    object-fit: contain;
}

</style>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid p-0">
           <img src="C:\xampp\htdocs\Ecommerce website\images\images.jpg" alt="" class="logo">
           <nav class="navbar navbar-expand-lg">
               <ul class="navbar-nav ">
               <?php 
                 if(!isset($_SESSION['admin_name'])){ 
                  echo " <li class='nav-item'>
                       <a class='nav-link btn btn-light text-light bg-secondary mx-2' href='#'>Welcome guest</a>
                     </li>";
                } else {
                  echo " <li class='nav-item'>
                        <a class='nav-link btn btn-light text-light bg-secondary mx-2' href='logout.php'>Welcome ".$_SESSION['admin_name']."</a>
                      </li>";
                }
        if(!isset($_SESSION['admin_name'])){
          echo " <li class='nav-item'>
                   <a class='nav-link btn btn-light text-light bg-secondary mx-2' href='admin_login.php'>Login</a>
                 </li>";
        } else {
          echo " <li class='nav-item'>
                <a class='nav-link btn btn-light text-light bg-secondary mx-2' href='logout.php'>Logout</a>
              </li>";
        }
        
        
        ?>
               </ul>
           </nav>
            </div>
        </nav>
          <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center mt-2">Manage Details:</h3>
         </div>

         <!-- third child -->
         <div class="row">
            <div class="col-md-12 bg-secondary p-1 m-2 d-flex align-items-center">
            <div class="p-3">
            <a href="index.php"><img src="../images/shopping_image.jpeg" alt="img" class="admin_image"></a>
            <!-- <p class=" text-center text-light p-1 me-4 fs-3">Mehul</p> -->
             </div>
             <div class="button text-center m-auto">
            <button class="bg-info"><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert products</a></button>
            <button class="bg-info"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
            <button class="bg-info"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
            <button class="bg-info"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View categories</a></button>
            <button class="bg-info"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert brands</a></button>
            <button class="bg-info"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View brands</a></button>
            <button class="bg-info"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
            <button class="bg-info"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All payments</a></button>
            <button class="bg-info"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
            <!-- <button class="bg-info"><a href="" class="nav-link text-light bg-info my-1">Logout</a></button> -->
              </div>
            </div>
         </div>

         <!-- fourth child -->
        <div class="container my-5">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            } 
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            } 
            if(isset($_GET['delete_brands'])){
                include('delete_brands.php');
            } 
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            } 
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            } 
            if(isset($_GET['delete_user'])){
                include('delete_user.php');
            } 


            
            ?>
        </div>

        <!-- lastchild -->
        <!-- <div class="lastchild">
           <div class="text-center p-3 bg-secondary me-auto bg-info">
             <p> All rights reserved -- Designed by Mehul-2023</p>
           </div>
        </div> -->
        <?php   include("../includes/footer.php");  ?>
    </div>

</body>
</html>
