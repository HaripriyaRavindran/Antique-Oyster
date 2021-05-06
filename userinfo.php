<?php
include 'database.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$name = $_POST["name"];
	$email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $sql1="INSERT INTO `contact` ( `name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
  //  $result=mysqli_query($conn,$sql1);
    if(mysqli_query($conn,$sql1)){
        echo "YOUR MESSAGE IS SENT SUCCESFULLY";
    }
    else{
        echo "unsuccess";
    }
}
?>