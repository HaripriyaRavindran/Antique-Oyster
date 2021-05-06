
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/reset.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
        
                  
    $("#sub").click(function(){
        $.post( $("#myform").attr("action"), function(info) { alert("gvbhb"); })
    clearinput();
    });

    $("#myform").submit(function(){
             return false;
           });
   
    function clearinput(){
        $("#myform :input").each(function(){
        $(this).val('');
        });
    }

    
</script>   
</head>
<body>
<div class="card">
    <br>
    <H1 class="center already">RESET PASSWORD</H1>
    <div class="main" id="main">
        
        <form method="POST" action="pass.php" id="myform">
            <div class="center">
                <input class="maintext center" required="required" id="textpwd" type="password" name='curr' id="currentpassword" placeholder="Current Password">
                <input class="maintext center" required="required" id="textcfmpwd" type="password" name='new' id="password" placeholder="New Password"  onInput="check()">
                <input class="maintext center" required="required" type="password" name='conf'id="cnfpassword" placeholder="Confirm Password"><br>
                <button id="sub"  class="btn solid">Reset</button>              
            </div>   
        </form>
        
    </div>
    <br>
</div>

</body>
