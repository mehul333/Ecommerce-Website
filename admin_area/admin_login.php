<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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
</style>
<body>
    <div class="container-fluid m-3">
           <h2 class="text-center mb-5">Admin Login</h2>
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
                    <label for="password" class="form-label">password</label>
                    <input type="password"  name="password" id="password" placeholder="Enter your password" required="required" class="form-control">
                </div>
              
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                    <p class="small mt-2 pt-1">Don't have an account <a href="admin_registration.php" class="link-danger">Register</a></p>
                </div>
                </form>
             </div>
           </div>
 </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
         $admin_name = $_POST['username'];
         $admin_password = $_POST['password'];  
         
        $select_query = "Select * from `admin_table` where admin_name='$admin_name'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);

     
      if($row_count>0){
        $_SESSION['admin_name'] = $admin_name;
        if($admin_password == $row_data['admin_password']){
                $_SESSION['admin_name'] = $admin_name;
                echo "<script>alert('login successfull!')</script>";
                echo "<script>window.open('index.php' , '_self')</script>";
            } 
            else{
                echo "<script>alert('invalid credentials!')</script>";
                echo "<script>window.open('admin_login.php','_self')</script>";
            }
      } else{
        echo "<script>alert('invalid credentials!')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }


    


}




?>



<!-- $_SESSION['admin_name'] = $admin_name;
                    echo "<script>alert('login successfull')</script>";
                    echo "<script>window.open('./index.php','_self')</script>"; -->