<?php require('Top.inc.php');
 
?>
    <!--Detail Table Show-->
    <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Customer Detail</h2>
                </div>

              
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $cus_res = mysqli_query($conn,"select * from users");
                          if(mysqli_num_rows($cus_res) >0){

                         $i=1;
                          while($cus_row  = mysqli_fetch_assoc($cus_res)){ ?>
                                 <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $cus_row['name'] ?></td>
                            <td><?php echo $cus_row['email'] ?></td>
                            <td><?php echo $cus_row['phone'] ?></td>
                        </tr>
                    
                        <?php $i++; } 
                           }else{ ?>
                              <td colspan="4">No customer yet</td>
                        
                       <?php } ?>
                      

                       
                        <!-- and so on... -->
                    </tbody>
                </table>


            </div>
        </div>
<?php require('Bottom.inc.php') ?>
