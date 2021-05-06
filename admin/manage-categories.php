<?php
require('top.inc.php');
$categories='';$msg='';$main='';$sub='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($conn,$_GET['id']);
    $res=mysqli_query($conn,"SELECT * FROM `category` WHERE `cid`=$id");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories=$row['cname'];
        $ctype=$row['type'];
        if($ctype=='main'){
            $main='selected'; 
        }
        if($ctype=='type'){
            $sub='selected';
        }
    }
    else{
        header('location:categories.php');
        die();
    }
    
}
if(isset($_POST['submit'])){
    $categories=get_safe_value($conn,$_POST['cname']);
    $ctype=get_safe_value($conn,$_POST['category']);
    if($ctype=='default'){
        echo "<script>alert('Please choose a category type')</script>";
    }

    $res=mysqli_query($conn,"SELECT * FROM `category` WHERE `cname`='$categories'");
    $check=mysqli_num_rows($res);
    
    if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($conn,"UPDATE `category` set `cname`='$categories',`type`='$ctype' WHERE `cid`=$id");
    }
    else{
        if($check>0){
            $msg='Category already exists';
        }
        else{
        $maxid="SELECT max(`cid`) FROM `category`";
        $data=$conn->query($maxid);
        $result=mysqli_fetch_array($data);
        mysqli_query($conn,"INSERT INTO `category`(`cid`,`type`,`cname`,`status`) VALUES($result[0]+1,'$ctype','$categories',1)");
        }
    }
    header("location:categories.php");
    die();

}

?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Category </strong><small>Form</small>
                </div>
                <form method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="cname" class="form-control-label">Category Name</label>
                            <input type="text" name="cname" placeholder="Enter Category Name" class="form-control" value="<?php echo $categories;?>" required/>
                        </div>
                        
                        <div class="form-group">
                            <label for="category" class="form-control-label">Category Type</label>
                            <select name="category"  id="" class="form-control">
                           
                            
                                <option value="default" disabled selected>Select Category</option>
                                <option value="main" <?php echo $main;?>>Main Category</option>
                                <option value="sub" <?php echo $sub;?>>Sub Category</option>
                            

                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30" >Submit</button>
                        <div class="field_error"><?php echo $msg;?></div>
         </div>
                </form>

            </div>
        </div>
    </div>
    </div>
<?php
require('bottom.inc.php');

?>