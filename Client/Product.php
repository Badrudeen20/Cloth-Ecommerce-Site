<?php 
require('Top.inc.php');
$id=0;
$type = 0;
if(isset($_GET['id']) && $_GET['id'] >0){
     $id = $_GET['id'];
} 

if(isset($_GET['type']) && $_GET['type'] >0){
    $type = $_GET['type'];
} 
?>



<!--product page-->
<div class="product-container">
    <div class="top-fun">
        <select onchange="selectType('<?php echo $id ?>')" id="type">
            <option value="0">All Selected</option>
            <?php 
            $select_res = mysqli_query($conn,"select * from producttype where status = 1");
            while($select_row = mysqli_fetch_assoc($select_res)){ ?>

              <?php
              $check_res = mysqli_query($conn,"select id,type from Product where category = '$id' GROUP BY type");
              while($check_row = mysqli_fetch_assoc($check_res)){
                   if($select_row['id']==$check_row['type']){ ?>
                  <?php if($select_row['id'] == $type){ ?>
                    <option value="<?php echo $select_row['id'] ?>" selected><?php echo $select_row['Type'] ?></option>
                 <?php }else{ ?>   
                    <option value="<?php echo $select_row['id'] ?>" ><?php echo $select_row['Type'] ?></option>
                 <?php } ?>

                <?php }
                 }  
              ?>

            <?php } ?>
        </select>
        <div> 
            <span id="grid" class="ion-grid"></span>
            <span id="detail" class="ion-android-storage"></span>
        </div>
        
    </div>
    
    <div id="product" class="product"></div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script>
     let page  = 1
     let type = null
     let grid = null
    function checkqty(id){
        var qty = $('#qty'+id).val()
            if(qty < 1){
                $('#qty'+id).val(1)
            } 
    }

    // add cart
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
            success:function(data){  $('#cart').html(data) }
        })
    }

    //load data
    function load_data(page,id,grid,type){
        $.ajax({
          url:'pagination.php',
          method:'POST',
          data:{page:page,id:id,grid:grid,type:type},
          success:function(data){$('#product').html(data) }
        })
    }

    load_data(page,'<?php echo $id ?>',grid)

    $(document).on('click','.pagination a',function(){
        
       page =  $(this).data('page_no')
     console.log(grid)
      if(type>0){
         load_data(page,'<?php echo $id ?>',grid,type)
        }else{
         load_data(page,'<?php echo $id ?>',grid)
        }  
    })

    function selectType(id){
        type = $('#type').val()
        if(type>0){
         
         load_data(1,'<?php echo $id ?>',grid,type)
        }else{
            load_data(1,'<?php echo $id ?>',grid)
        } 
    }


    $('#grid').click(function(){
        grid = ''
      $(".products_container").removeClass("detailed");
      console.log(grid)
    })

    $('#detail').click(function(){
        grid = 'detailed'
      $(".products_container").addClass("detailed");
      console.log(grid)
    })

   
</script>


<?php require('Bottom.inc.php') ?>


