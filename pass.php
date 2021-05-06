<?php
include 'database.php';
$msg="";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  
$email = $_SESSION['email'];
$pold=$_GET['pold'];
$pnew =$_GET['pnew'];
$pconfirm =$_GET['pconfirm'];
$response = array();
if($pnew==$pconfirm){
    $res=mysqli_query($conn,"SELECT * FROM `login` WHERE `password`=$pold");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(mysqli_query($conn,"UPDATE `login` set `password`='$pnew' WHERE `email`='$email'")){               
                $response['status'] = 'success';
                $response['message'] = 'This was successful';
                
        }
        else {
            $response['status'] = 'error';
            $response['message'] = 'failed';
        }
    }
    else{
        $response['status']="Please enter your old password correctly";
    }
}
else{
    $response['status']="New passwords does not match";
}
// mysqli_free_result($response); 
echo json_encode($response);

?>

