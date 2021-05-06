<?php
function test($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
function checkemail($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
function checkphone($str) {
    return (!preg_match("/^[0-9]{10}$/ix", $str)) ? FALSE : TRUE;
}
if(isset($_GET['msg']) && $_GET['msg']!=''){
    $msg=test($_GET['msg']);
    echo '<script> alert("'.$msg.'");</script>';
}
if(isset($_POST['SignUp'])){
	$_fname = test($_POST["fname1"]);
	$_lname = test($_POST["lname1"]);
	$_email = test($_POST["email1"]);
    $_pass = test($_POST["password1"]);
    $_date = date("Y-m-d");
    include 'database.php';
   
   if(checkemail($_email)){
    $sql1="INSERT INTO `login`( `fname`, `lname`, `email`, `password`) VALUES ('$_fname','$_lname','$_email','$_pass')";
   }
   if(checkphone($_email)){
    $sql1="INSERT INTO `login`( `fname`, `lname`, `phone`, `password`) VALUES ('$_fname','$_lname','$_email','$_pass')";
  
   }
 //  $result=mysqli_query($conn,$sql1);
    if(mysqli_query($conn,$sql1)){
        header('Location: logsign.php?msg="Successful registration"');  
    }
    else{
        echo " <script> alert('" .$sql1 .$mysqli_error($conn)."'); </script>";
        
    }
    mysqli_close($conn);
	
    
    
    
}
 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
if (isset($_SESSION["name"])) 
{ 
header('Location: index.php');
} 
elseif (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])) {
    header('Location: index.php');
} 
 
else
{   
    include 'header.php';
?>

<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/check.css">

  <script>
        document.getElementById("SignUp")=formsubmit;
        document.getElementById("sign-up-btn")=addtransition;
        document.getElementById("sign-in-btn")=removetransition;
            
        function addtransition(){
            $(".logsigncontainer").addClass("sign-up-mode");
        }
        function removetransition(){
            $(".logsigncontainer").removeClass("sign-up-mode");
        }
        function removetransition(){
            $(".logsigncontainer").removeClass("sign-up-mode");
        }
        function bringforgot(){
            $(".login").addClass("hide");
            $(".forgot-form").removeClass("hide");
            
        }
        function showpassword(){
            var x=document.getElementById("lpassword");
            if(x.type==="password"){
                x.type="text";
            }
            else{
                x.type="password";
            }
        }
</script>

        <div class="logsigncontainer">
			
            <div class="forms-logsigncontainer">
                <div class="signin-signup">
                    <form class="sign-in-form" action="login.php" method="POST">
                        
							<h2 class="login" >Login</h2>
                            <div><img src="images/ringspin.gif"  width="50px" class="center" height="50px"/></div>
                            <div class="input-field">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" name="email1" placeholder="Email ID"/>
                            </div>
                            <div class="input-field">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                <input type="password" name="password1" placeholder="Password" id="lpassword"/>
							</div>
                            <div class="group">
								<input type="checkbox" class="checkboxlogin" id="rememberme" />
								<label for="rememberme" class="labellog">Remember me</label>	
								<div class="forgot">
								<a href="mail/email.php">Forgot password?</a>
							</div>
							</div>
							
                            <button value="Login" name="submit" class="btn solid" formaction="login.php">Login</button>
                            
                    </form>
                    
                    <form class="sign-up-form" action="logsign.php" method="POST" >
                        <h2 class="login">Sign Up</h2>
                        <div><img src="images/ringspin.gif" width="50px" height="50px" class="center"/></div>
                        <div class="input-field">
                            <i class="fa fa-user" aria-hidden="true"></i>
				            <input type="text" name="fname1" placeholder="First name" required />
                        </div>
						<div class="input-field">
                            <i class="fa fa-user" aria-hidden="true"></i>
				            <input type="text" name="lname1" placeholder="Last name" required/>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
				            <input type="text" name="email1" placeholder="E-mail/Phone" required/>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-lock" aria-hidden="true"></i> 
							
				            <input type="text" name="password1" placeholder="Password" required/>
							
                        </div>
						<div class="input-field">
                            <i class="fa fa-lock" aria-hidden="true"></i>
				            <input type="text" name="password2" placeholder="Confirm Password" required/>
                        </div>
                        <button type="submit " name="SignUp"id="SignUp"  value="Sign Up" class="btn solid">Sign Up</button>
                    </form>
                  
                </div>
            
            </div>
            
            <div class="panels-logsigncontainer">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New Here?</h3>
                        <button class="btn transparent" id="sign-up-btn" onclick="addtransition()">Sign Up</button>
                    </div>
                    <img class="image" src="images/ear.png"/>
                </div>
                <div class="panel right-panel">
                <div class="alert hide">
                        <span class="fa fa-check-circle">
                        </span>
                        <span class="msg">Success:Registration successfull</span>
                        <span class="close-btn">
                        <span class="fa fa-times"></span>
                        </span>
                </div>
                    <div class="content">
                        <h3>One of us?</h3>
                        <button class="btn transparent" id="sign-in-btn" onclick="removetransition()">Log In</button>
                    </div>
                    <img class="image" src="images/double.png"/>
                    
                </div>
            </div>
        </div>

		
<?php
	include "footer.php";
    }
}
?>
    </body>

