<?php
include "database.php";
if (isset($_POST['add'])) {
    $proid = $_POST["productid"];
    $target = "images/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];


    $sql1 = "INSERT INTO `productimages` (`product_id`,`image`) VALUES ('$proid','$image')";
    mysqli_query($conn, $sql1);
    
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        echo "<script>console.log('$msg');</script>";
    }
    else{
        $msg = "Failed to upload image";
        echo "<script>console.log('$msg');</script>";

    }
}
?>
<html>
    <body>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="text" name="productid" id="productid" placeholder="Product id">
            <div>    
                <!-- <input type="hidden" name="size" value="1000000"> -->
                <div>
                    <input type="file" id="image" name="image">
                </div>
            </div>
            <input type="submit" name="add" value="ADD IMAGE"/>
        </form>
    </body>
</html>