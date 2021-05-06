
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
					<legend class="logtitle bg-light">Sign up</legend>
					<form class="loginform bg-light" method="POST" onsubmit="sign(this)">
						
						<div class="formgroup">
							<div class="formwrapper">
								<input type="text" name="fname1" class="formcontrol" placeholder="First Name" required>
							</div>
							<div class="formwrapper">
								<input type="text" placeholder="Last Name" name="lname1" class="formcontrol" required>
							</div>
						</div>
						<div class="formwrapper">
							<input type="email" placeholder="Email" name="email1" class="formcontrol" >
						</div>
						<div class="formwrapper">
							<input type="tel" placeholder="Phone" name="phone1" class="formcontrol" pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
						</div>
						<div class="formwrapper">
							<input type="password" placeholder="Password" name="password1" class="formcontrol" required>
						</div>
						<div class="formwrapper">
							<input type="password" placeholder="Confirm Password" name="password2" class="formcontrol" required>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" required> I caccept the Terms of Use & Privacy Policy.
								<!-- <span class="checkmark"></span> -->
							</label>
						</div>
						<input type="submit" class="logbutton" value="Register Now" name="submit"/>
						<label class="question">Already having an Account?
						<a href="loginform.php">Login</a></label>
						<script>
							function sign(form){
								$.ajax({
									type:'POST',
									url:'signup.php',
									data:$(".loginform").serializeArray(),
									success:function(data){
										console.log("hii");
										var data = JSON.parse(data);
										alert(data.status);
										if(data.status=='Sign in Succesful'){
										window.location.href="loginform.php";}
										else{
											window.location.href="signupform.php";
										}
									}
							
								});
							}
						</script>
					</form>
				</fieldset>
			</div>
		</div>
	</section>

		


<?php 
	include "footer.php";
	}
}
?>