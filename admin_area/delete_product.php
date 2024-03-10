<?php
if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];
    $delete_product = "Delete from `products` where product_id = $delete_id";
    $result = mysqli_query($con , $delete_product);
    if($result){
        echo "<script>alert('Product deleted successfully!')</script>";
        echo "<script>window.open('index.php' , '_self')</script>";
    }
    
}


?>