<?php

if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];
    $delete_brands="Delete from `brands` where brand_id=$delete_brands";
    $result=mysqli_query($con,$delete_brands);
    if($result){
        echo"<script>alert('brand has been seleted successfully!')</script>";
        echo "<script>window.open('./index.php?view_brands' , '_self')</script>";
    }
}




?>