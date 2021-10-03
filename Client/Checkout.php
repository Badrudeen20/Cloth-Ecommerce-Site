<?php 
require('Top.inc.php');
$subTotal = 0;
if(!isset($_SESSION['CUSTOMER'])){
    redirect('Home.php');
}else{
    
   //delete cart item
    if(isset($_GET['type']) && $_GET['type']=="delete"){ 
       if($_GET['id'] > 0){
          $id = $_GET['id'];
          mysqli_query($conn,"delete from cart where id = '$id'");
       }
    }
    //check cart
    if(mysqli_num_rows(mysqli_query($conn,"select * from cart where userid = '$userid'")) > 0){
       //detail
       $user_detail_res = mysqli_query($conn,"select * from users where id = '$userid'");
       $user_detail_row = mysqli_fetch_assoc($user_detail_res);
    }else{
        redirect('Home.php');
    }

}

 
?>
 
<!---recent Product-->
<div class="checkout-container">

    <div class="row">
        <div class="col-1">
         <form>
             <input type="text" name="name" id="name" placeholder="First Name" value="<?php echo $user_detail_row['name'] ?>" required/>
             <input type="text" name="appartment" id="appartment" placeholder="Appartment/office" />
             <div class="flex"> 
                <input type="text" name="city" id="city" placeholder="city/state" requires/>
                <input type="text" name="post" id="post" placeholder="post Code" required/>
             </div>
             <div class="flex">
                <input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $user_detail_row['email'] ?>" required/>
                <input type="text" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $user_detail_row['phone'] ?>" required/>
             </div>
             <div class="flex">
                 <div class="cash"> 
                   <input type="radio" name="payment" value="cash" required/>
                   <label>Cash</label>
                 </div>
                 <div class="card">
                   <input type="radio" name="payment" value="card" required/>
                   <label>Card</label>
                 </div>
             </div>
             <button type="button" onclick="orderPlaced()">Save and Deliver</button>
         </form>
        </div>
        <div class="col-2">
            <h3>Your Order</h3>
            <?php 
             $checkout_res = mysqli_query($conn,"select cart.*,product.Product,product.image,product.price from cart,product where cart.userid = '$userid' and product.id = cart.productid");
             while($checkout_row = mysqli_fetch_assoc($checkout_res)){ ?>
            <div class="product">
                 <img src="../images/product/<?php echo $checkout_row['image'] ?>" />
                <div class="detail">
                        <div>
                          <h5><?php echo $checkout_row['Product'] ?></h5>
                          <p>size:<span id="size"><?php echo $checkout_row['productsize'] ?></span></p>
                          <p>$<?php echo $checkout_row['price'] ?>.00 X <?php echo $checkout_row['productqty'] ?></p> 
                       </div>
                   <div>
                     <a href="?type=delete&id=<?php echo $checkout_row['id'] ?>"><span class="ion-trash-a"></span></a>
                   </div>
                </div>
            </div>
                   <?php 
                    $subTotal = $subTotal+$checkout_row['price'] * $checkout_row['productqty'];
                    ?>
            <?php } ?>
         
            <div class="total">
                <div class="between">
                   
                    <p>subtotal:</p><p>$<?php echo $subTotal ?>.00</p>
                </div>
                <div class="between">
                    <p>Tex:</p><p>$10.00</p>
                </div>
                <div class="between Tol">
                    <p>Total:</p><p>$<span id="total"><?php echo $subTotal+10 ?></span>.00</p>
                </div>
                 
                   
                    
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script>
 function orderPlaced(userid){
    var name = $('#name').val()
   var appartment = $('#appartment').val()
   var city = $('#city').val()
   var post = $('#post').val()
   var email = $('#email').val()
   var phone = $('#phone').val()
   var payment  = $('input[name="payment"]:checked').val()
   var total  = $('#total').html()
   $.ajax({
       url:'Orderplaced.php',
       method:'POST',
       data:{userid:userid,total:total, name:name,appartment:appartment,city:city,post:post,email:email,phone:phone,payment:payment },
       success:function(data){
         alert(data)
       }
   })

 }
</script>
<?php require('Bottom.inc.php') ?>
