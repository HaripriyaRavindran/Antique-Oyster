<?php
require('top.inc.php');
if(isset($_GET['type']) &&$_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="DELETE FROM `contact` WHERE `srno`=$id";
        mysqli_query($conn,$delete_sql);
    }
}
$sql="SELECT * FROM `contact`";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Contact US </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>No.</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Subject</th>
                                       <th>Message</th>
                                       <th>&nbsp;</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $i=1;
                                 while($row=mysqli_fetch_array($res)){
                                    
                                     ?>
                                    <tr>
                                       <td><?php echo $row['srno']?></td>
                                       <td> <?php echo $row['name']?> </td>
                                       <td> <?php echo $row['email']?></td>
                                       <td> <?php echo $row['subject']?> </td>
                                       <td><?php echo $row['message']?></td>
                                       <td>
                                       <?php
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['srno']."'>Delete</a></span>";
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