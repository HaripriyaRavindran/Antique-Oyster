<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="DELETE FROM `login` WHERE `user_id`=$id";
        mysqli_query($conn,$delete_sql);
    }
}
$sql="SELECT * FROM `login` ORDER BY `fname` asc";
$res=mysqli_query($conn,$sql);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User Details</h4>
                          
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">ID</th>
                                       <th>Name</th>
                                       <th>Password</th>
                                       <th>E-mail ID</th>
                                       <th>Phone</th>
                                       <th>Options</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $i=1;
                                 while($row=mysqli_fetch_assoc($res)){   
                                     ?>
                                    <tr>
                                        <td><?php echo $row['user_id']?></td>
                                       <td> <?php echo $row['fname']."&nbsp;" .$row['lname'];?> </td>
                                       <td> <?php echo $row['password']?></td>
                                       <td> <?php if ($row['email']==NULL){
                                           echo "<i>No email provided</i>";
                                       }
                                       else{
                                           echo $row['email'];
                                       }?> </td>
                                       <td> <?php if ($row['phone']==0){
                                           echo "<i>No Contact provided</i>";
                                       }
                                       else{
                                           echo $row['phone'];
                                       }?> </td>
                                       <td>
                                       <?php
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['user_id']."'>Delete</a></span>&nbsp;";
                                       
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