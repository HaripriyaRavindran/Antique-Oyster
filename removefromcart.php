<?php
    include "database.php";

    $id = $_GET['id'];
    $sql1 = "DELETE FROM `cart` WHERE `productID` = $id";
	if(mysqli_query($conn, $sql1)){
		header('cart.php');
    }
?>