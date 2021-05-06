<?php 
    if (isset($_POST['addproduct'])) {
        // $target = "images/product/".basename($_FILES['image']['name']);

        $image = $_FILES['image']['name'];
        echo "<script>console.log('$image');</script>";
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
    <form method="post" action=""  enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="image">
        </div>
        <input type="submit" name="addproduct" value="Add Product" class="enter"/>
    </form>
    </body>
</html>