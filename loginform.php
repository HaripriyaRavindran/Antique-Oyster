
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
<link href="login/css/style.css" rel="stylesheet" >


	<section class="ftco-section log bg-light">
		<div class="wrapper bg-light">
		
			<div class="inner bg-light">
                <fieldset>
                    <legend class="logtitle bg-light">login</legend>
                    <form class="loginform bg-light" action="login.php" method="POST">
                        
                        <div class="formwrapper">
                            <input type="email" placeholder="Email" name="email1" class="formcontrol" required>
                        </div>
                        <!-- <div class="formwrapper">
                            <input type="number" placeholder="Phone" name="phone1" class="formcontrol" required>
                        </div> -->
                        <div class="formwrapper">
                            <input type="password" placeholder="Password" name="password1" class="formcontrol" required>
                        </div>
                        <div class="checkbox">
                            <label class="label1">
                                <input type="checkbox" name="rememberme"> Remember Me
                                <!-- <span class="checkmark"></span> -->
                            </label>
                            <label class="label2">
                                <a href="mail/email.php" data-toggle="modal" data-target="#exampleModal">Forgot password?</a>  
                            </label> 
                        </div>
                        <button value="Login" name="submit" class="logbutton" formaction="login.php">Login</button>
                        <label class="question">New Here?
                        <a href="signupform.php">Create an Account</a></label>
                    </form>
                </fieldset>
			</div>
		</div>
	</section>
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
                        <label>An email will be sent to you shortly.</label>
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