<?php
require('database.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
   $mail=get_safe_value($conn,$_POST['email']);
   $password=get_safe_value($conn,$_POST['password']);
   $sql="SELECT * FROM `admin` WHERE `email`='$mail' and `password`='$password' ";
   $res=mysqli_query($conn,$sql);
   $count=mysqli_num_rows($res);
   if($count>0){
      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=strval($username);
      $_SESSION['MAIL']=strval($mail);
      header('location:dashboard.php');
      die();
   }
   else{
      $msg="Please enter correct login details";
   }

}

?>
<?php
   include "adminhead.php";
?>

   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <h2>ADMIN LOGIN</h2>
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password"class="form-control" placeholder="Password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30" >Sign in</button>
               </form>
               <div class="field_error"><?php echo $msg;?></div>
               </div>
            </div>
         </div>
      </div>
<?php
   include "adminfoot.php";
?>