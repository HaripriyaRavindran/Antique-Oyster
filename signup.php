<?php
function test($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
    }

	
if($_SERVER['REQUEST_METHOD']=='POST'){
    if (!empty($_POST["email1"]) && !empty($_POST["password1"]) && !empty($_POST["fname1"]) && !empty($_POST["lname1"])) 
{ 
	$_fname = test($_POST["fname1"]);
	$_lname = test($_POST["lname1"]);
	$_email = test($_POST["email1"]);
    $_phone = test($_POST["phone1"]);
    $_pass = test($_POST["password1"]);
    $_date = date("Y-m-d");
    include 'database.php';
    $sql1="INSERT INTO `login`( `fname`, `lname`, `email`, `phone`, `password`) VALUES ('$_fname','$_lname','$_email','$_phone','$_pass')";
  //  $result=mysqli_query($conn,$sql1);
    if(mysqli_query($conn,$sql1)){
        $response['status']="Sign in Succesful";
    }
    else{
        $response['status']="Couldn't sign in. Please try again.";
    }
    mysqli_close($conn);
    
}

    else
    { 
        $response['status']='Please fillup all your detials.';
    } 
}
echo json_encode($response);
?>