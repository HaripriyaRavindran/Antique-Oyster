<?php
    include "database.php";
    $userid=$_SESSION["userid"];
    $id = $_GET['id'];
    $quantity = $_GET['quantity'];
    
    $sql123 = "INSERT INTO `cart` (`userID`, `productID`, `quantity`, `price`) VALUES ('$userid', '$id', '$quantity', '10000');";
    
	if(mysqli_query($conn, $sql123)){
        // header("Location: cart.php");
    }
    // mysqli_close($conn);
?>