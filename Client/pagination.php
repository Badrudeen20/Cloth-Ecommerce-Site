<?php 
include('Connection.inc.php');
$userid = 0;
if(isset($_SESSION['CUSTOMER'])){
    $userid = $_SESSION['CUSTOMER_ID'];
}
if(isset($_POST)){
    $limit = 5;
    $page = 1;
    $id = $_POST['id'];
    $typeCondition = "";
    $grid = ''; 
    if(isset($_POST['grid'])){
        $grid  = $_POST['grid'];
    }

   if(isset($_POST['page']) && $_POST['page'] > 1){
    $start = ($_POST['page'] - 1) * $limit;
    $page = $_POST['page'];
   }else{
    $start = 0;
   }

   if(isset($_POST['type'])){
       $type= $_POST['type'];
       $typeCondition = "and product.type = '$type' ";
   }
   $query = "select product.*,categories.Category,producttype.Type from product,categories,producttype
   where product.category = '$id' $typeCondition and categories.id = product.category and producttype.id = product.type and product.status = 1";
   $filter_query = $query . ' limit '.$start.', '.$limit.'';

 
  $statement = mysqli_query($conn,$filter_query);
  $total_data = mysqli_num_rows(mysqli_query($conn,$query));
  $output = '<div class="products_container '.$grid.'">';
  while($row = mysqli_fetch_assoc($statement)){
     $output .= '
     <div class="p">
                <div class="img">
                   <a href="Detail.php?id='.$row['id'].'"><img src="../images/product/'.$row['image'].'" /></a>
                </div> 
              
                <div class="desc">
                    <h4>'.$row['Product'].'</h4>
                    <small>'.$row['description'].'</small>
                    <div class="fix">
                        <strong>$'.$row['price'].'</strong>
                    </div>';
                
                        $product_size_res = mysqli_query($conn,"select * from productsize where category='$id' and type='".$row['type']."'");
                        $product_size_row = mysqli_fetch_assoc($product_size_res);
                        $size =  $product_size_row['size'];
                        $arr  = explode(',',$size);
                    
        $output .='<div class="flex">
                        <input type="number" value="1" id="qty'.$row['id'].'" onchange="checkqty('.$row['id'].')" />
                        <select class="size" id="size'.$row['id'].'">';
                              foreach ($arr as $s) {
                                $output .='<option>'.$s.'</option>';
                              }
            $output .='</select>
                    </div>
                    <button class="btn" onclick="addCart('.$row['id'].','.$userid.','.$row['price'].')">Add To Cart</button> 
                </div>
            </div>
     ';
  }

  $output .='</div>
<div class="pagination_container">
<div class="pagination">';
  $total_link = ceil($total_data/$limit);
  $previous_link = '';
  $next_link = '';
  $page_link = '';
  if($total_link > 4){





    if($page < 5){
       for($count = 1; $count<=5;$count++){
           $page_array[] = $count;
       }
       $page_array[] = '...';
       $page_array[] = $total_link;
    }else{



           $end_limit = $total_link - 5;
           if($page > $end_limit){
              $page_array[] = 1;
              $page_array[] = '...';
              for($count=$end_limit;$count<=$total_link;$count++){
                   $page_array[] = $count;
              }
           }else{
               $page_array = 1;
               $page_array = '...';
               for($count=$page-1;$count<=$page+1;$count++){
                   $page_array[] = $count;
              }
              $page_array = '...';
              $page_array = $total_link;
           }


    }







}else{
   for($count = 1; $count<= $total_link;$count++){
        $page_array[] = $count;
   }
}

for($count = 0;$count< count($page_array); $count++){
    if($page == $page_array[$count]){
   
           $page_link .='<a href="javascript:void(0)" class="active" data-page_no="'.$page_array[$count].'">'.$page_array[$count].'</a>';
         
           $previous_id = $page_array[$count] - 1;
           if($previous_id > 0){
               $previous_link = '<a href="javascript:void(0)" data-page_no="'.$previous_id.'" >Prev</a>';
           }else{
               $previous_link = '<a href="javascript:void(0)" disabled style="pointer-events:none;">Prev</a>';
           }


           $next_id = $page_array[$count] + 1;
           if($next_id == $total_link+1){
               $next_link = '<a href="javascript:void(0)" disabled style="pointer-events:none;">Next</a>';
           }else{
               $next_link = '<a href="javascript:void(0)" data-page_no="'.$next_id.'">Next</a>';
           }
       
    }else{
      if($page_array[$count] == '...'){
           $page_link .='<a href="javascript:void(0)" disabled style="pointer-events:none;">...</a>';
      }else{
           $page_link .='<a href="javascript:void(0)" data-page_no="'.$page_array[$count].'">'.$page_array[$count].'</a>';
      }
    }
}

$output .=$previous_link . $page_link . $next_link;
$output .='
</div>
</div>';
echo $output;


  
}

?>