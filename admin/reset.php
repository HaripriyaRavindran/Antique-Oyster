<?php
require('top.inc.php');
$msg="";
if(isset($_POST['submit'])){
    $pold=get_safe_value($conn,$_POST['pold']);
    $pnew =get_safe_value($conn,$_POST['pnew']);
    $pconfirm =get_safe_value($conn,$_POST['pconfirm']);
    $name=$_SESSION['MAIL'];
    if($pnew==$pconfirm){
        $res=mysqli_query($conn,"SELECT * FROM `admin` WHERE `password`=$pold");
        $check=mysqli_num_rows($res);
        if($check>0){
            mysqli_query($conn,"UPDATE `admin` set `password`='$pnew' WHERE `email`='$name'");
        }
    }
    else{
        echo $msg="New password doesnot match";
    }

}
?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>RESET PASSWORD </strong><small>Admin</small>
                </div>
                <form method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="pname" class="form-control-label">Old Password</label>
                            <input type="password" name="pold" placeholder="Enter Old Password" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >New Password:</label>
                            <input type="password" name="pnew" placeholder="Enter New Password" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="form-control-label">Confirm New Password</label>
                            <input type="password" name="pconfirm" placeholder="Confirm New Password" class="form-control" required/>
				        </div>
                        
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30" >Change Password</button>
                        <div class="field_error"><?php echo $msg;?></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>

    <?php
require('bottom.inc.php');

?>