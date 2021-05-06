<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="DELETE FROM `orders` WHERE `order_id`=$id";
        mysqli_query($conn,$delete_sql);
        $dsql="DELETE FROM `order_details` WHERE `order_id`=$id";
        mysqli_query($conn,$dsql);
    }
}
$sql="SELECT * FROM `orders` ORDER BY `order_date` asc";
$res=mysqli_query($conn,$sql);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Details</h4>
                          
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Order ID</th>
                                       <th>Product_ID</th>
                                       <th>Product Name</th>
                                       <th>Order Date</th>
                                       <th>Total Amount</th>
                                       <th>Payment method</th>
                                       <th>Status</th>
                                       <th>Options</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $i=1;
                                 while($row=mysqli_fetch_assoc($res)){   
                                     ?>
                                    <tr>
                                        <td><?php echo $row['order_id']?></td>
                                       <td> <?php 
                                       $oid=$row['order_id'];
                                       $psql="SELECT * FROM `order_details` where `order_id`= $oid ";
                                       $pr=mysqli_query($conn,$psql);
                                       $p=mysqli_fetch_assoc($pr);
                                       echo $p['product_id'];
                                       ?> </td>
                                       <td> <?php 
                                       $pid=$p['product_id'];
                                       $psql="SELECT * FROM `products` where `product_id`=$pid";
                                       $pno=mysqli_query($conn,$psql);
                                       $pn=mysqli_fetch_assoc($pno);
                                       echo $pn['product_name'];
                                       ?></td>
                                       <td><?php echo $row['order_date']?></td>
                                       <td><?php echo $row['total_amount']?></td>
                                       <td><?php echo $row['payment_option']?></td>
                                       <td><?php 
                                       if($row['status']==0){
                                           echo "Pending";
                                       }
                                       if($row['status']==1){
                                        echo "Successful";
                                    }
                                       ?></td>
                                       <td>
                                       <?php
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['order_id']."'>Cancel</a></span>&nbsp;";
                                       
                                       ?>
                                       </td>
                                    </tr>
                                 <?php $i=$i+1;} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>
<?php
require('bottom.inc.php');

?>