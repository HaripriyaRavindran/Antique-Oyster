<?php
require('top.inc.php');
$msg="";
$cat=mysqli_query($conn, "SELECT `cname` FROM `category` WHERE `type`='main'");
$scat=mysqli_query($conn, "SELECT `cname` FROM `category` WHERE `type`='sub'");

$pro=mysqli_query($conn,"SELECT max(product_id) FROM `products`");
$prodid=mysqli_fetch_array($pro);

if(isset($_POST['submit'])){
    $pname=get_safe_value($conn,$_POST['pname']);
    $prid=$_POST['pid'];
    $desc =get_safe_value($conn,$_POST['desc']);
    $stock =get_safe_value($conn,$_POST['stock']);
    $sname =get_safe_value($conn,$_POST['sname']);
    $weight =get_safe_value($conn,$_POST['weight']);
    $category =get_safe_value($conn,$_POST['category']);
    $subcat =get_safe_value($conn,$_POST['subcat']);
    $ship =get_safe_value($conn,$_POST['ship']);
    $price =get_safe_value($conn,$_POST['price']);
    $status=get_safe_value($conn,$_POST['status']);
    if($pname=='' || $desc==''|| $stock==''|| $sname=='' ||$weight==''|| $category=='' ||$subcat==''|| $price=='' ||$status==''){
        $msg=$msg.' Please fill all the details';
    }
    
    
    if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($conn,"UPDATE `category` set `cname`='$categories',`type`='$ctype' WHERE `cid`=$id");
    }
    else{
        
        
        $maxid="SELECT max(`image_no`) FROM `image`";
        $data=$conn->query($maxid);
        $idata=mysqli_fetch_array($data);
        if(mysqli_query($conn,"INSERT INTO `products`(`product_id`, `product_name`, `description`, `stock`, `supplier_name`,
         `product_weight`, `category`, `sub-category`, `shippable`, `product_price`, `status`) VALUES($prid,'$pname','$desc',
         $stock,'$sname' ,$weight, '$category','$subcat',$ship ,$price, $status)"))
         {
            echo "<script>console.log($prid)</script>";
            
         }
        /*Image uupload */
        $target = "../images/products/".basename($_FILES['image']['name']);

        $image = $_FILES['image']['name'];


        $sql1 = "INSERT INTO `productimages` (`product_id`,`image`) VALUES ($prid,'$image')";
        mysqli_query($conn, $sql1);
        
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            echo "<script>console.log('$msg');</script>";
        }
        else{
            $msg = "Failed to upload image";
            echo "<script>console.log('$msg');</script>";

        }
        /* Image upload complete*/
        header("Location:dashboard.php");
    }
    

    die();
    
}
if(isset($_GET['id']) && $_GET['id']!=''){
    $pid=get_safe_value($conn,$_GET['id']);
    $res=mysqli_query($conn,"SELECT * FROM `products` WHERE `product_id`=$pid");
    $row=mysqli_fetch_assoc($res);
}

?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Product </strong><small>Form</small>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body card-block">
                            
                        <div class="form-group">
                            <label for="pid" class="form-control-label">Product ID</label>
                            <input type="text" name="pid" value="<?php
                                   
                                    if($prodid[0] != Null){
                                        echo $prodid[0]+1;
                                    }
                                    
                            ?>" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="pname" class="form-control-label">Product Name</label>
                            <input type="text" name="pname" placeholder="Enter Product Name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >Choose a product image:</label>
                            <!-- <input type="file"    name="pimage"  required/> -->
                            <!-- <input type="text" class="form-control" name="productid" id="productid" placeholder="Product id"> -->
                            <div>    
                                <input type="hidden" name="size" value="1000000">
                                <div>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="form-control-label">Description</label>
                            <textarea name="desc" id="desc"  rows="3" class="form-control"></textarea>
				        </div>
                        <div class="form-group">
                            <label for="stock" class="form-control-label">Stocks</label>
                            <input type="number" name="stock" placeholder="Enter Number of stocks available " class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="sname" class="form-control-label">Supplier name</label>
                            <input type="text" name="sname" placeholder="Enter Supplier Name " class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="weight" class="form-control-label">Weight</label>
                            <input type="text" name="weight" placeholder="Enter the weight of the product " class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-control-label">Category</label>
                            <select name="category" id="" class="form-control">
                                <option disabled selected>Select Category</option>
                                <?php 
                                while($r=mysqli_fetch_assoc($cat)){
                                ?>
                                <option value='<?php echo $r['cname']?>'><?php echo $r['cname']?></option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcat" class="form-control-label">Sub Category</label>
                            <select name="subcat" id="" class="form-control">
                            <option disabled selected>Select Sub Category</option>
                                <?php 
                                while($ro=mysqli_fetch_assoc($scat)){
                                ?>
                                <option value='<?php echo $ro['cname']?>'><?php echo $ro['cname']?></option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ship" class="form-control-label">Is the product shippable?</label>
                            <select name="ship" id="" class="form-control">
                                <option value=1>Yes</option>
                                <option value=0>No</option>
                            </select>
                         </div>
                        <div class="form-group">
                            <label for="price" class="form-control-label">Price</label>
                            <input type="tel" name="price" placeholder="Enter the price " class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-control-label">Do you want the product to be available in the catalog for customers?</label>
                            <select name="status" id="" class="form-control">
                                <option value=1>Yes</option>
                                <option value=0>No</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30" >Submit</button>
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