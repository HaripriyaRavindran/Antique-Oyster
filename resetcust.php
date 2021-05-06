
<?php
require "header.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$msg="";
?>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12" style="padding:0px; margin:0px">
            <div class="card" style="margin:100px;">
                <div class="card-header">
                    <strong>RESET PASSWORD </strong>
                </div>
                <!-- <form method="post"> -->
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="pname" class="form-control-label">Old Password</label>
                            <input type="password" name="pold" placeholder="Enter Old Password" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >New Password:</label>
                            <input type="password" name="pnew" placeholder="Enter New Password" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="form-control-label">Confirm New Password</label>
                            <input type="password" name="pconfirm" placeholder="Confirm New Password" class="form-control" required/>
				        </div>
                        
                        <button type="button" name="submit" onclick="checkDetail()" class="btn btn-success btn-flat m-b-30 m-t-30" >Change Password</button>
                        <div class="field_error" style="color: red; margin-top:5px; font-style:italic">
                        <p id="here"></p>
                        </div>
                        </div>
                    </div>
                <!-- </form> -->
                <script>
                    function checkDetail(){
                       var pold = document.querySelector("input[name=pold]").value ;
                       var pnew = document.querySelector("input[name=pnew]").value;
                       var pconfirm = document.querySelector("input[name=pconfirm]").value;
                    // window.location.href='pass.php?pold='+pold+'&pnew='+pnew+'&pconfirm='+pconfirm;
                    
                       $.ajax(
                            {
                                type: 'POST',
                                url:'pass.php?pold='+pold+'&pnew='+pnew+'&pconfirm='+pconfirm,
                                // dataType:'json',
                                success: function(data){
                                    console.log(data);
                                    var data = JSON.parse(data);
                                    if(data.status=='success'){
                                        alert("successfully changed");
                                        window.location.href="myprofile.php";
                                    }
                                    else{
                                        document.getElementById("here").innerHTML=data.status;
                                    }
                                    
                                }
							});
                    }
                </script>
            </div>
        </div>
    </div>
    </div>

    <?php
require "footer.php";

?>