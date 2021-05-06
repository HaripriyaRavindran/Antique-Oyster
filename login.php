<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

	
if (!empty($_POST["email1"]) && !empty($_POST["password1"])) 
{ 	
echo "<script>console.log('hii');</script>"; 
    $_email = $_POST["email1"];
    $_pass = $_POST["password1"];
    $_date = date("Y-m-d");
    include 'database.php';
    $sql1="SELECT user_id, fname, password, email FROM `login` WHERE email='".$_email."' AND password='".$_pass."' ";
    $result=mysqli_query($conn,$sql1);
    $num_rows=mysqli_num_rows($result);
	if($num_rows !=0)
	{
        $row = mysqli_fetch_row($result);
        $dbuserid = $row[0];
		$dbfname = $row[1];
		$dbemail = $row[3];
		$dbpass = $row[2];  
	         
	    if (!empty($_POST["rememberme"])) 
        { 
            
			setcookie("user_login", $dbfname, time() + 
                                    (10 * 365 * 24 * 60 * 60)); 

            setcookie("user_password", $dbpass, time() + 
                                    (10 * 365 * 24 * 60 * 60)); 

             
				
  
        } 
        else
        { 
        if (isset($_COOKIE["user_login"])) 
        { 
            setcookie("user_login", ""); 
        } 
        if (isset($_COOKIE["user_password"])) 
        { 
            setcookie("user_password", ""); 
        } 
				
		
				
        } 
        session_start();
        $_SESSION["name"] = $dbfname;
        $_SESSION["userid"] = $dbuserid;
        $_SESSION["email"] = $dbemail;	
		header('Location: index.php'); 

	}	
    else
   {
       echo"<script>alert('invalid detail');</script>";
       echo "<script>window.location.href = 'loginform.php';</script>";
   }    
}
else
    { 
        echo"<script>alert('Both feilds are required');</script>";
    } 
}
?>

