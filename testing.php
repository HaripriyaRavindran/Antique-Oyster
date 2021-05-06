<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include "database.php";
$obj = json_decode($_GET["x"], false);

$sort="";
$pro = "";
$cat = "";
$query ="";
$sql = "SELECT * FROM `products`";

if( $obj -> clears == "1"){
    $sort = "";
    $pro = "";
    $cat = "";
}

if( $obj-> radio !=""){
    switch ($obj->radio) {
        case 'bestsellers':
            $sort="";
            break;
        case 'newarrivals':
            $sort="";
            break;
        case 'popularity':
            $sort="";
            break;
        case 'discount':
            $sort="";
            break;
        case 'lowtohigh':
            $sort = " ORDER BY product_price ASC";
            break;
        case 'hightolow':
            $sort = " ORDER BY product_price DESC";
            break;
        default:
            # code...
            break;
    }  
}
$where = "where ";
$and = " OR";
$condition = "";
if(sizeof($obj-> category) != 0){
    $or ="";
    $count = 1;
    foreach ($obj-> category as $value) {
        if($count == 1){
            $and = "";
            $or = "(";
        }
        else {
            $or = "";

            $and = " OR";
        }
        if($value == "Gold"){
            $condition = $condition.$and.$or."`sub-category` = 'Gold'";
            
        }
        if($value == "Silver"){
            $condition = $condition.$and.$or." `sub-category` = 'Silver'";
            
        }
        if($value == "Ceramic"){
            $condition =$condition.$and.$or." `sub-category` = 'Ceramic'";
            
        }
        if($value == "Platinum"){
            $condition = $condition.$and.$or." `sub-category` = 'Platinum'";
        }
        if($value == "Rose-gold"){
            $condition = $condition.$and.$or." `sub-category` = 'Rose-gold'";
        }
        if($value == "Oxidized"){
            $condition = $condition.$and.$or." `sub-category` = 'Oxidized'";
        }
        if($count == sizeof($obj-> category)){
            $or = ")";
            $condition = $condition.$or;
        }
        $count = $count +1;
        
    }
    $cat = strval($where.$condition);
} 

if(sizeof($obj-> product) != 0){

    $count = 1;
    $count2 = 0;
    $or = "";
    foreach ($obj-> product as $value) {
        if($count == 1 && $condition != ""){
            $or = "AND (";
            $and = "";
            $count2 = 1;
        }

        elseif($condition == "" and $count == 1) {
            $and = "";
            $or = "";
        }
        elseif ($count != 1) {
            $and = " OR";
            $or="";
        }
        if($value == "Rings"){
            $condition = $condition.$or.$and."`category` = 'Rings'";
            
        }
        if($value == "Silver"){
            $condition = $condition.$or.$and." `sub-category` = 'Silver'";
            
        }
        if($value == "Ceramic"){
            $condition =$condition.$or.$and." `sub-category` = 'Ceramic'";
            
        }
        if($value == "Pendant"){
            $condition = $condition.$or.$and." `category` = 'Pendant'";
        }
        if($value == "Rose-gold"){
            $condition = $condition.$or.$and." `sub-category` = 'Rose-gold'";
        }
        if($value == "Oxidized"){
            $condition = $condition.$or.$and." `sub-category` = 'Oxidized'";
        }
        if($count2 == 1 && $count == sizeof($obj-> product)){
            $or = ")";
            $condition = $condition.$or;
        }
        $count = $count +1;
        
    }
    $cat = strval($where.$condition);
} 

if(sizeof($obj-> price) != 0){

    $count = 1;
    $count2 = 0;
    $or = "";
    foreach ($obj-> price as $value) {
        if($count == 1 && $condition != ""){
            $or = "AND (";
            $and = "";
            $count2 = 1;
        }

        elseif($condition == "" and $count == 1) {
            $and = "";
            $or = "";
        }
        elseif ($count != 1) {
            $and = " OR";
            $or="";
        }
        if($value == "5000"){
            $condition = $condition.$or.$and."`product_price` < 5000";
            
        }
        if($value == "10000"){
            $condition = $condition.$or.$and." `product_price` BETWEEN 5000 AND 10000";
            
        }
        if($value == "20000"){
            $condition =$condition.$or.$and." `product_price` BETWEEN 10000 AND 20000";
            
        }
        if($value == "30000"){
            $condition = $condition.$or.$and." `product_price` BETWEEN 20000 AND 30000";
        }
        if($value == "40000"){
            $condition = $condition.$or.$and." `product_price` BETWEEN 30000 AND 40000";
        }
        if($value == "50000"){
            $condition = $condition.$or.$and." `product_price` BETWEEN 40000 AND 50000";
        }
        if($value == "MORE"){
            $condition = $condition.$or.$and." `product_price` >= 50000";
        }
        if($count2 == 1 && $count == sizeof($obj-> price)){
            $or = ")";
            $condition = $condition.$or;
        }
        $count = $count +1;
        
    }
    $cat = strval($where.$condition);
} 

// echo $sql.$cat.$sort;
// foreach ($obj -> price as $value) {
    // echo $value;
// }
$getcardtl = mysqli_query($conn,$sql.$cat.$sort)or die(mysqli_error($conn)); 
while ($fcar = mysqli_fetch_array($getcardtl)) { 
    $a = $fcar["product_id"];
    $getimg = mysqli_query($conn,"SELECT * FROM `productimages` where product_id = $a")or die(mysqli_error($conn));
    $pi = mysqli_fetch_array($getimg); 
?>
    <div class="col-sm-6 col-md-4 maingap">
        <div class="product productsingle gap">
            <a href="single.php?id=<?php echo $fcar["product_id"];?>" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi["image"];?>" alt="Image"></a>
            <div class="text py-3 px-3">
                <h3><a href="single.php?id=<?php echo $fcar["product_id"];?>" class="img-prod"><?php echo $fcar['product_name'];?></a></h3>
                <div class="d-flex">
                    <div class="pricing">
                        <p class="price"><span><?php echo $fcar["product_price"];?></span></p>
                    </div> 
                    <div class="rating">
                        <p class="text-right">
                            <span class="ion-ios-star-outline"></span>
                            <span class="ion-ios-star-outline"></span>
                            <span class="ion-ios-star-outline"></span>
                            <span class="ion-ios-star-outline"></span>
                            <span class="ion-ios-star-outline"></span>
                        </p>
                    </div>
                </div>
                <hr>
                <p class="bottom-area d-flex">
                    <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                    <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                </p>
            </div>
        </div>
    </div>
<?php
} 

mysqli_close($conn);
?>
</body>
</html>