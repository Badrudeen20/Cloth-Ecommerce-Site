<?php 
require('Top.inc.php'); 
$id = 0;

if(isset($_GET['id']) && $_GET['id'] > 0){
     $id = $_GET['id'];
     $detail_res = mysqli_query($conn,"select product.*,categories.Category,producttype.Type from product,categories,producttype
      where product.id = '$id' and categories.id = product.category and producttype.id = product.type");
     $detail_row = mysqli_fetch_assoc($detail_res);
} 

?>
<!--Detail Product-->
<div class="detail-container">
    <div class="row">
        <div class="col-2">
          <img id="product_image" src="../images/product/<?php  echo $detail_row['image']?>" />
            <div class="img-container">
                <div class="img">
                  <img src="../images/product/<?php  echo $detail_row['image']?>" />
                </div>
                <?php 
                $detailimg_res = mysqli_query($conn,"select * from productimage where product_id = '$id'");
                $detailimg_row = mysqli_fetch_assoc($detailimg_res);?>
                <div class="img">
                   <img src="../images/detail/<?php  echo $detailimg_row['img1']?>" />
                </div>
                <div class="img">
                    <?php if($detailimg_row['img2']!=""){ ?>
                        <img src="../images/detail/<?php  echo $detailimg_row['img2']?>" />
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-2">
            <p><?php echo $detail_row['Category'] ?>/<?php echo $detail_row['Type'] ?></p>
            <h2><?php echo $detail_row['Product'] ?></h2>
            <h4>$<?php echo $detail_row['price'] ?>.00</h4>
            <h3>Product Detail</h3>
            <p class="short_desc"><?php echo $detail_row['description'] ?></p>
            <?php
                $product_size_res = mysqli_query($conn,"select * from productsize where category='".$detail_row['category']."' and type='".$detail_row['type']."'");
                $product_size_row = mysqli_fetch_assoc($product_size_res);
                $size =  $product_size_row['size'];
                $arr  = explode(',',$size);
            ?>
            <input type="number"  id="qty<?php echo $detail_row['id'] ?>" onchange="checkqty('<?php echo $detail_row['id'] ?>')" value="1" />
            <select class="size" id="size<?php echo $detail_row['id'] ?>">
                <?php 
                    foreach ($arr as $s) {
                    echo '<option>'.$s.'</option>';
                    }
                ?>
            </select>
            <br/>
            <button type="button" onclick="addCart('<?php echo $detail_row['id'] ?>','<?php echo $userid ?>','<?php echo $detail_row['price'] ?>')" class="btn">Add To Cart</button>
            
        </div>
    </div>
</div>

<div class="container">
 <div class="big-img">
     <img src="" />
     <div class="img-container">
         <img src=""/>
     </div>
 </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script>
    var productImg =  $('#product_image')[0]
     function checkqty(id){
        var qty = $('#qty'+id).val()
            if(qty < 1){
                $('#qty'+id).val(1)
            } 
         }
        $('.img').each(function(ind,ele){
            ele.addEventListener('click',function(){
                productImg.src = this.querySelector('img').src
             })
        })


    function addCart(id,userId,price){
        if(userId <= 0){
        window.location.href ='Login.php'  
        return
        }
        var size = $('#size'+id).val()
        var qty = $('#qty'+id).val()
        if(size==0 || userId==0) return
        $.ajax({
            url:'Addcart.php',
            method:'POST',
            data:{id:id,userId:userId,size:size,qty:qty,price:price},
            success:function(data){ $('#cart').html(data) }
        })
    }

</script>
<?php require('Bottom.inc.php') ?>