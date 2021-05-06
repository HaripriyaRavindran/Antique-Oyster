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
      $update_sql="UPDATE `category` SET status='$status' WHERE `cid`=$id";
      mysqli_query($conn,$update_sql);
  }
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="DELETE FROM `category` WHERE `cid`=$id";
        mysqli_query($conn,$delete_sql);
    }
}
$sql="SELECT * FROM `category` ORDER BY `cid` asc";
$res=mysqli_query($conn,$sql);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <h4 class="box-link"><a href="manage-categories.php">Add Categories +</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">ID</th>
                                       <th>Type</th>
                                       <th>Category Name</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $i=1;
                                 while($row=mysqli_fetch_assoc($res)){   
                                     ?>
                                    <tr>
               
                                       <td> <?php echo $row['cid']?> </td>
                                       <td> <?php echo $row['type']?></td>
                                       <td> <?php echo $row['cname']?> </td>
                                       <td>
                                       <?php
                                       if($row['status']==1){
                                          echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['cid']."'>Active</a></span>&nbsp;";
                                       
                                       }
                                       else{
                                          echo "<span class='badge badge-deactive'><a href='?type=status&operation=active&id=".$row['cid']."'>Deactive</a></span>&nbsp;";
                                       }
                                       echo "<span class='badge badge-pending'><a href='manage-categories.php?id=".$row['cid']."'>Modify</a></span>&nbsp;";
                                       
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['cid']."'>Delete</a></span>&nbsp;";
                                       
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