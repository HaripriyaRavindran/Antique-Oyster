<?php

 
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
      if ( document.URL.includes("logsign.php") ) {
            document.getElementById("navid").style.backgroundColor="#ff9d3a";
            document.getElementById("menu").style.backgroundColor="#ff9d3a";
        }
        document.getElementById("SignUp")=formsubmit;
        document.getElementById("sign-up-btn")=addtransition;
        document.getElementById("sign-in-btn")=removetransition;
            function formsubmit(){
                    $.ajax({
                    type:'POST',
                    url:'signup.php',
                    data:$(".sign-up-form").serialize(),
                    success:function(response){
                    if(response.localeCompare("Success"))
                    {
                        $(".alert").removeClass("hide");
                        $(".alert").addClass("show");
                    }   
            }
            
        });
        }
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
                                <input type="text" name="email1" placeholder="Email ID" required/>
                            </div>
                            <div class="input-field">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                <input type="password" name="password1" placeholder="Password" id="lpassword" required/>
							</div>
                            <div class="group">
								<input type="checkbox" class="checkboxlogin" id="rememberme" />
								<label for="rememberme" class="labellog">Remember me</label>	
								<div class="forgot">
								    <a href="mail/email.php" data-toggle="modal" data-target="#exampleModal">Forgot password?</a>
							    </div>
							</div>
							
                            <button value="Login " name="submit" class="bttn solid" formaction="login.php">Login</button>                           
                    </form>
                    
                    
                    <form class="sign-up-form" action="signup.php" method="POST" >
                        <h2 class="login">Sign Up</h2>
                        <div><img src="images/ringspin.gif" width="50px" height="50px" class="center"/></div>
                        <div class="input-field">
                            <i class="fa fa-user" aria-hidden="true"></i>
				            <input type="text" name="fname1" placeholder="First name" required>
                        </div>
						<div class="input-field">
                            <i class="fa fa-user" aria-hidden="true"></i>
				            <input type="text" name="lname1" placeholder="Last name" required>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
				            <input type="text" name="email1" placeholder="E-mail/Phone" required>
                        </div>
                        <div class="input-field">
                            <i class="fa fa-lock" aria-hidden="true"></i> 
							
				            <input type="text" name="password1" placeholder="Password" required>
							
                        </div>
						<div class="input-field">
                            <i class="fa fa-lock" aria-hidden="true"></i>
				            <input type="text" name="password2" placeholder="Confirm Password" required>
                        </div>
                        <input type="button" name="submit" id="SignUp"  value="Sign Up" class="bttn solid" onclick="formsubmit()"/>
                    </form>
                  
                </div>
            
            </div>
            
            <div class="panels-logsigncontainer">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New Here?</h3>
                        <button class="bttn transparent" id="sign-up-btn" onclick="addtransition()">Sign Up</button>
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
                        <button class="bttn transparent" id="sign-in-btn" onclick="removetransition()">Log In</button>
                    </div>
                    <img class="image" src="images/double.png"/>
                    
                </div>
            </div>
        </div>

	<!-- modal  -->
                
    <div class="modal fade" id="exampleModal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Enter your email address:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </form>
            </div>
            <script>
                function forget() {
                    var mail = document.getElementById("recipient-name").value;
                    console.log(mail);
                    $.ajax(
                    {
                        url:'mail/email.php?mail='+mail,
                        success: function(data){
                            console.log(data);
                            var data = JSON.parse(data);
                            alert(data.status);
                        }
                    });
                }
            </script>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="forget()" data-dismiss="modal">Send message</button>
            </div>
            </div>
        </div>
    </div> 
    <!-- end    -->
<?php
	include "footer.php";
    }
}
?>