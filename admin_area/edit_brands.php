<?php
if(isset($_GET['edit_brands'])){
    $edit_brands = $_GET['edit_brands'];

    $get_categories = "Select * from `brands` where brand_id=$edit_brands";
    $result = mysqli_query($con , $get_categories);
    $row = mysqli_fetch_assoc($result);
    $brands_title = $row['brand_title'];
    // $brands_id = $row['brands_id'];

}

if(isset($_POST['edit_brands'])){
    $cat_title = $_POST['brands_title'];
    $update_query = "update `brands` set brand_title='$brand_title' where brand_id=$edit_brands";
    $result_brand = mysqli_query($con , $update_query);

    if($result_brand){
        echo "<script>alert('Brand has been updated successfully!')</script>";
        echo "<script>window.open('./index.php?view_brands.php','_self')</script>";
    }


}



?>


<div class="container mt-3">
    <h1 class="text-center">Edit brands</h1>
    <form action="" method="post" class="text-center">
     <div class="form-outline mb-4">
        <label for="brands_title" class="form-label">brands Title</label>
        <input type="text" value="<?php echo $brands_title; ?>" name="brands_title" id="brands_title" class="form-control m-auto w-50" required="required"> 
     </div>

     <input type="submit" name="edit_brands" value="Update brands" class="btn btn-info px-3 mb-3">
</form>
</div>