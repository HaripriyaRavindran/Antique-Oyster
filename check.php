<?php
	include "header.php";
	include "database.php";
	session_start();
	$proid=101;
?>
<!-- <div class = "notification" id= 'notification'>
    asjdhasd
    <br>
    <br>asjkdhaskhd
    <br>
    <br>
    <br>
    <br>
    asmdj
</div>
<script>
var some =  document.getElementById("notification");
some.onclick = function () {
    console.log("hello");
    $.ajax(
    {
        url:'removefromcart.php?id=<?php //echo $proid;?>',
        success: function(result){
        console.log(result);
        if(result >0){
            alert('Notification Seen');
        }
        }
    });
}
</script> -->
<img class="profile" id="output" src="images/profile.png">
<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
<p><label for="file" style="cursor: pointer;">Upload Image</label></p>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        console.log(event.target.files[0]);
    };
</script>
</body>
</html>