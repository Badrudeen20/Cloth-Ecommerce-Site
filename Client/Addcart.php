<?php
include('Connection.inc.php');

if(isset($_POST['userId'])){
    $userId = $_POST['userId'];
    $productId = $_POST['id'];
    $productSize = $_POST['size'];
    $productQty = $_POST['qty'];
    $productPrice  = $_POST['price'];
    $addedon = date('y-m-d');
    $update_cart_res =  mysqli_query($conn,"select  * from  cart where userid = '$userId' and productid = '$productId'");
    if(mysqli_num_rows($update_cart_res) > 0){
         $update_cart_row = mysqli_fetch_assoc($update_cart_res); 
         $updatecartid = $update_cart_row['id'];
         mysqli_query($conn,"update cart set productsize = '$productSize', productqty = '$productQty' where id = '$updatecartid'");
         $cartsnum  =    mysqli_query($conn,"select id from cart where userid = '$userId'");
         $cart = mysqli_num_rows($cartsnum);
         echo $cart;
    }else{
        if(mysqli_query($conn,"insert into cart (userid,productid,productsize,productqty,productprice,addedon) 
        values('$userId','$productId','$productSize','$productQty','$productPrice','$addedon')")){
            $cartsnum  =    mysqli_query($conn,"select id from cart where userid = '$userId'");
            $cart = mysqli_num_rows($cartsnum);
            echo $cart;
        }else{
            echo "failed";
        }

    }
  
}else{
    echo "Login first please!";
}
?>