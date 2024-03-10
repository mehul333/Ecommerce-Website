<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

  $product_title = $_POST['product_title'];
  $product_description= $_POST['product_description'];
  $product_keywords = $_POST['product_keywords'];
  $product_categories = $_POST['product_categories'];
  $product_brands = $_POST['product_brands'];
  $product_price = $_POST['product_price'];
  $product_status = 'true'; 

  // accessing images
  $product_image1 = $_FILES['product_image1']['name'];
  $product_image3 = $_FILES['product_image3']['name'];
  $product_image2 = $_FILES['product_image2']['name'];

  // accessing image tmp name
  $temp_image1 = $_FILES['product_image1']['tmp_name'];
  $temp_image2 = $_FILES['product_image2']['tmp_name'];
  $temp_image3 = $_FILES['product_image3']['tmp_name'];

  if($product_title=='' or   $product_description=='' or   $product_keywords=='' or $product_categories=='' or   $product_brands=='' or   $product_price=='' or   $product_image1=='' or   $product_image2=='' or   $product_image3==''){
    echo "<script>alert('Please fill all the fields!')</script>";
    exit();
  } else{
    move_uploaded_file($temp_image1, " product_images/ $product_image1");
    move_uploaded_file($temp_image2, " product_images/ $product_image2");
    move_uploaded_file($temp_image3, " product_images/ $product_image3");
  }

  $insert_products = "insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title', '$product_description', '$product_keywords', '$product_categories', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), $product_status)";
  $result_query = mysqli_query($con, $insert_products);
  if($result_query){
    echo "<script> alert ('Successfully inserted the products!') </script> ";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Products-Admin Dashboard</title>
    <!-- bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  </head>
  <body class="bg-light">
    <div class="container mt-3">
      <h1 class="text-center">Insert Products</h1>
        <form class="" method="post" enctype="multipart/form-data">
          <!-- product title -->

         <div class="form-outline mb-4 w-50 m-auto  ">
           <label for="product_title" class="form-label">Product title</label>
           <input type="text" name="product_title" value="" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off">
          </div>

          <!-- product description -->
          <div class="form-outline mb-4 w-50 m-auto  ">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" name="product_description" value="" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off">
           </div>

           <!-- product keywords -->

           <div class="form-outline mb-4 w-50 m-auto  ">
             <label for="product_keywords" class="form-label">Product keywords</label>
             <input type="text" name="product_keywords" value="" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off">
            </div>

            <!-- product categories -->
            <div class="form-outline mb-4 w-50 m-auto  ">
              <!-- <label for="product_keywords" class="form-label">Product keywords</label>
              <input type="text" name="product_keywords" value="" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off"> -->
              <select class="form-select" name="product_categories">
                <option value="">Select a category</option>
                <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con , $select_query);
                    while($row = mysqli_fetch_assoc($result_query)){
                      $category_title = $row['category_title'];
                      $category_id = $row['category_id'];
                      echo "<option value='$category_id'>$category_title</option>";
                    }

                 ?>
              </select>

             </div>

             <!-- product brands -->

             <div class="form-outline mb-4 w-50 m-auto  ">
               <!-- <label for="product_keywords" class="form-label">Product keywords</label>
               <input type="text" name="product_keywords" value="" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off"> -->
               <select class="form-select" name="product_brands">
                <option value="">Select a brand</option>
                <?php
                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con , $select_query);
                    while($row = mysqli_fetch_assoc($result_query)){
                      $brand_title = $row['brand_title'];
                      $brand_id = $row['brand_id'];
                      echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>


                 <!-- <option value="">Brand1</option>
                 <option value="">Brand2</option>
                 <option value="">Brand3</option>
                 <option value="">Brand4</option> -->
               </select>

              </div>

              <!-- image1 -->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" value="" id="product_image1" class="form-control">
               </div>

               <!-- image2 -->
               <div class="form-outline mb-4 w-50 m-auto">
                 <label for="product_image2" class="form-label">Product Image2</label>
                 <input type="file" name="product_image2" value="" id="product_image2" class="form-control">
                </div>

                <!-- image3 -->
                <div class="form-outline mb-4 w-50 m-auto">
                  <label for="product_image3" class="form-label">Product Image3</label>
                  <input type="file" name="product_image3" value="" id="product_image3" class="form-control">
                 </div>



          <!-- product price -->
                <div class="form-outline mb-4 w-50 m-auto  ">
             <label for="product_price" class="form-label">Product price</label>
             <input type="text" name="product_price" value="" id="product_price" class="form-control" placeholder="Enter product Price" autocomplete="off">
           </div>

            <!-- submit button -->
            <div class="form-outline mb-4 w-50 m-auto  ">
              <input type="submit" name="insert_product" value="Insert Products"  class="btn btn-info mb-2 px-2">
            </div>




        </form>

    </div>
  </body>
</html>
