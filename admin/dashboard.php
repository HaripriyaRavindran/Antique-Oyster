<?php
require('top.inc.php');
if(isset($_GET['type']) &&$_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='status'){
      $operation=get_safe_value($conn,$_GET['operation']);
      $id=get_safe_value($conn,$_GET['id']);
      if($operation=='active'){
         $status='1';
      }
      else{
         $status='0';
      }
      $update_sql="UPDATE `products` SET status='$status' WHERE `product_id`=$id";
      mysqli_query($conn,$update_sql);
  }
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="DELETE FROM `products` WHERE `product_id`=$id";
        mysqli_query($conn,$delete_sql);
    }
}
$sql="SELECT * FROM `products` ORDER BY `product_id` asc";
$res=mysqli_query($conn,$sql);
?>
<?php
   include "adminhead.php";
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products </h4>
                           <h4 class="box-link"><a href="manage-products.php">Add Products +</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">ID</th>
                                       <th>Product Name</th>
                                       <th>Description</th>
                                       <th>Stock</th>
                                       <th>Rating</th>
                                       <th>Supplier name</th>
                                       <th>Product Weight</th>
                                       <th>Category</th>
                                       <th>Sub Category</th>
                                       <th>Shippable</th>
                                       <th>Price</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $i=1;
                                 while($row=mysqli_fetch_assoc($res)){   
                                     ?>
                                    <tr>
               
                                       <td> <?php echo $row['product_id']?> </td>
                                       <td> <?php echo $row['product_name']?></td>
                                       <td> <?php echo $row['description']?> </td>
                                       <td><?php echo $row['stock']?></td>
                                       <td><?php echo $row['rating']?></td>
                                       <td><?php echo $row['supplier_name']?></td>
                                       <td><?php echo $row['product_weight']?></td>
                                       <td><?php echo $row['category']?></td>
                                       <td><?php echo $row['sub-category']?></td>
                                       <td><?php echo $row['shippable']?></td>
                                       <td><?php echo $row['product_price']?></td>
                                       <td>
                                       <?php
                                       if($row['status']==1){
                                          echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['product_id']."'>Active</a></span>";
                                       
                                       }
                                       else{
                                          echo "<span class='badge badge-deactive'><a href='?type=status&operation=active&id=".$row['product_id']."'>Deactive</a></span>";
                                       }
                                       echo "<span class='badge badge-pending'><a href='manage-products.php?id=".$row['product_id']."'>Modify</a></span>";
                                       
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['product_id']."'>Delete</a></span>";
                                       
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
include "adminhead.php";

?>