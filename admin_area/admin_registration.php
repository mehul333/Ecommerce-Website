<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

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
    .admin_img{
        height: 500px;
        width : 500px;
        object-fit: contain;
    }
    body{
        overflow-x: hidden;
    }
</style>
<body>
    <div class="container-fluid m-3">
           <h2 class="text-center mb-5">Admin Registration</h2>
           <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <img src="../images/adminreg.jpg" alt="Admin Registration" class="admin_img">
             </div>
             <div class="col-lg-6">
                <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text"  name="username" id="username" placeholder="Enter your username" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"  name="email" id="email" placeholder="Enter your email" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">password</label>
                    <input type="password"  name="password" id="password" placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label"> Confirm password</label>
                    <input type="password"  name="confirm_password" id="confirm_password" placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                    <p class="small mt-2 pt-1">Do you have an account <a href="admin_login.php" class="link-danger">Login</a></p>
                </div>
                </form>
             </div>
           </div>
 </div>
</body>
</html>


<?php
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $conf_admin_password = $_POST['confirm_password'];

    $insert_query = "insert into `admin_table` (admin_name , admin_email, admin_password) values ('$admin_name', '$admin_email', '$admin_password')";
    $result = mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Admin registered successfully!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }    
}










?>