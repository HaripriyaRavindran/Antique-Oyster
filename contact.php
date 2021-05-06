<?php
	include "header.php";
?>
	
	

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Contact</h1>
			  <h2 class="mb-4">Contact Us</h2>
			  <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact Us</span></p>
      </div>
    </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last ">
            <form action="userinfo.php" id="myform" class="bg-white p-5 contact-form" method="POST">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required> 
              </div>
              <div class="form-group">
                <textarea name="message" id="" rows="6" class="form-control" placeholder="Message" required></textarea>
              </div>
              <div class="form-group">
              <button id="sub"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Send Message</button>
              </div>
              <span id="result"></span>
            </form>

          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Message sent!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Thanks for contacting us.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
          </div>

          <script>
           $("#sub").click(function(){
             var data= $("#myform :input").serializeArray();
             $.post( $("#myform").attr("action"), data, function(info) {; })
            clearinput();
           });
           
           function clearinput(){
             $("#myform :input").each(function(){
               $(this).val('');
             });
           }
          </script>

          <div class="col-md-6 col-sm-8" style="padding:30px">
            <div id="googleMap" style="width:100%; height:100%"; ></div>
          </div>
          <script>
          function myMap() {
          var mapProp= {
              center:new google.maps.LatLng(19.39237,72.83990),
              zoom:5,
          };
          var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
          }
          </script>

          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
        
        </div>
        <div class="row d-flex mt-5 contact-info">
          <!-- <div class="w-100"></div> -->
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span>  92, Anand Bhuvan, Mangal Wadi, Girgaon, Mumbai - 400004</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>

<?php
	include "footer.php";
?>
    
  </body>
</html>