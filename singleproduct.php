<?php
	include "header.php";
	include "database.php";
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	  }
	$y="";
	$id=$_GET["id"];
	echo "<script>console.log($id);</script>";
	$getpro= mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = $id")or die(mysqli_error($conn));
	$p= mysqli_fetch_array($getpro);
	$geti= mysqli_query($conn, "SELECT * FROM `productimages` WHERE product_id = $id")or die(mysqli_error($conn));
	$pi= mysqli_fetch_array($geti);
	
?>		

	
<section class="ftco-section bg-light">
    <div class="container">
		<div class="row justify-content-center mb-3 pb-3">
      		<div class="col-md-12 heading-section text-center ftco-animate">
        		<h1 class="big">Product</h1>
			  	<h2 class="mb-4">Product Details</h2>
			  	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="moreproducts.php">Products</a></span>
      		</div>
		</div>
	</div>
<!-- <script>
	function imageZoom(imgID, resultID) {
	var img, lens, result, cx, cy;
	img = document.getElementById(imgID);
	result = document.getElementById(resultID);
	/*create lens:*/
	lens = document.createElement("DIV");
	lens.setAttribute("class", "img-zoom-lens");
	/*insert lens:*/
	img.parentElement.insertBefore(lens, img);
	/*calculate the ratio between result DIV and lens:*/
	cx = result.offsetWidth / lens.offsetWidth;
	cy = result.offsetHeight / lens.offsetHeight;
	/*set background properties for the result DIV:*/
	result.style.backgroundImage = "url('" + img.src + "')";
	result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
	/*execute a function when someone moves the cursor over the image, or the lens:*/
	lens.addEventListener("mousemove", moveLens);
	img.addEventListener("mousemove", moveLens);
	/*and also for touch screens:*/
	lens.addEventListener("touchmove", moveLens);
	img.addEventListener("touchmove", moveLens);
	function moveLens(e) {
		var pos, x, y;
		/*prevent any other actions that may occur when moving over the image:*/
		e.preventDefault();
		/*get the cursor's x and y positions:*/
		pos = getCursorPos(e);
		/*calculate the position of the lens:*/
		x = pos.x - (lens.offsetWidth / 2);
		y = pos.y - (lens.offsetHeight / 2);
		/*prevent the lens from being positioned outside the image:*/
		if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
		if (x < 0) {x = 0;}
		if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
		if (y < 0) {y = 0;}
		/*set the position of the lens:*/
		lens.style.left = x + "px";
		lens.style.top = y + "px";
		/*display what the lens "sees":*/
		result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
	}
	function getCursorPos(e) {
		var a, x = 0, y = 0;
		e = e || window.event;
		/*get the x and y positions of the image:*/
		a = img.getBoundingClientRect();
		/*calculate the cursor's x and y coordinates, relative to the image:*/
		x = e.pageX - a.left;
		y = e.pageY - a.top;
		/*consider any page scrolling:*/
		x = x - window.pageXOffset;
		y = y - window.pageYOffset;
		return {x : x, y : y};
	}
	}
</script> -->
    		<div class="row">
			<div id="myresult"></div>
					<div class="col-md-12">
    					<div class="product-slider owl-carousel ftco-animate">
    						<div class="item">
		    					<div class="product ">
		    						<a href="#" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi['image'];?>" alt="Image">
		    							
		    						</a>
								</div>
							</div>
							<!-- <script>
								// Initiate zoom effect:
								imageZoom("myimage", "myresult");
							</script> -->
							<div class="item">
		    					<div class="product">
		    						<a href="#" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi["image"];?>" alt="Image">
		    							
		    						</a>
								</div>
							</div>
							<div class="item">
		    					<div class="product">
		    						<a href="#" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi['image'];?>" alt="Image">
		    							
		    						</a>
								</div>
							</div>
							<div class="item">
		    					<div class="product">
		    						<a href="#" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi['image'];?>" alt="Image">
		    							
		    						</a>
								</div>
							</div>
							<div class="item">
		    					<div class="product">
		    						<a href="#" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi['image'];?>" alt="Image">
		    							
		    						</a>
								</div>
							</div>
						</div>
					</div>
    				<!-- <img src="images/products/1.jpg" class="image-popup" ></a> -->

			</div>
    		<div class="row d-flex justify-content-center py-5" style="margin-left:0px; display:block;">
			
				<div class="p-5 mb-5 col-lg-9 productsingle" >
					
					<div class="row d-flex justify-content-center py-5">
					<div class="product" style="float: left; display: inline-block; width: 50%">
					<img class="rounded float-left" width=500 height=500 src="images/products/<?php echo $pi['image'];?>" alt="Image">
					</div>
						<div class="col-lg-9" style=" display: inline-block; float:right">
							<div class="col-lg-9 product-details pl-md-5 ftco-animate">
								<h3><?php echo $p["product_name"]?></h3>

							<p class="price"><span><?php echo $p["product_price"]?></span></p>
							<p><?php echo $p["description"]?></p>
							<h6>Shippable : <?php echo $p["shippable"]?></h6>
							<h6>Stocks left : <?php 
							if ($p["stock"]==1) {
								$y="YES";
							}
							else{
								$y="NO";
							}
							echo $y;
							?></h6>
							<h6>Weight : <?php echo $p["product_weight"]?></h6>
								<div class="row mt-4">
									<div class="col-md-6">
										<div class="form-group d-flex">
							<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<label for="">Number of products you want : </label> 
							<select name="quantity" id="quantity" class="form-control">
								<?php 
									for ($i=1; $i <= $p["stock"]; $i++) { 
										echo "<option value='$i'>$i</option>";
									}
								?>
							</select>
							</div>
							</div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
							</div>
						<div>
					<div>
					<div class="row  justify-content-center py-5">
						<div class="col-lg-9">
							<!-- <form action='addtocart.php?quantity=&id=<?php //echo $id;?>' method='post'> -->
								<input type="button" value="Add To Cart" id="insert"  class="probutton justify-content-center"/>
								<script>
									
									var some =  document.getElementById("insert");
									some.onclick = function () {
										var quantity = document.getElementById("quantity").value;
										console.log("hello");
										$.ajax(
										{
											url:'addtocart.php?quantity='+quantity+'&id=<?php echo $id;?>',
											success: function(result){
												console.log(quantity);
												document.getElementById("insert").value = "ADDED";
												const button = document.getElementById('insert');
												button.disabled = true;
											
											}
										});
									}
									
									
                            	</script>
							<!-- </form> -->
						<div>
					<div>
	  			<div>
				  <!-- <form action='addtocart.php?quantity=4&id=102' method='post' id='insertform' >
			  	<button class=" btn solid " id='insert'>Add to cart</button>
			  	<input type="submit" id="insert" class=" btn solid ">
			  </form> -->
    			<!-- <div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>ftghj</h3>
    				<p class="price"><span>Rs.140</span></p>
    				<p>fghjktyuivbnm</p>
					<h6>Shippable :NO</h6>
					 <h6>Stocks left : </h6>
					 <h6>Weight : </h6>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
					<div class="select-wrap">
					  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
					  <label for="">Number of products you want : </label> 
	                  <select name="" id="" class="form-control">
					  
	                  
	                  </select>
	                </div>
		            </div>
					</div>
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
	          	</div> -->
          	</div>
			  
			<!-- <button type="submit" onclick="addt"></button> --> 
			<!-- <p><a href="addtocart.php?id=<?php //echo $details['product_Id'];?>"  class="btn btn-primary py-3 " >Add to Cart</a></p> -->
    			</div>
    		</div>
    	</div>
    </section>
	<!-- <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
		<div class="comment-body">
			         
		</div>
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h1 class="big">Review</h1>
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Give reviews</h3>
                <form action="product-single.php" class="p-5 bg-light" method="post">
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
				  </div>
				  Rate:
				  <div class="rateyo" id= "rating"
         			data-rateyo-rating="3"
         			data-rateyo-num-stars="5"
         			data-rateyo-score="3">
         			</div>
    				<span class='result'>0</span>
    				<input type="hidden" name="rating">
                  <div class="form-group">
                    <input type="submit" value="POST" class="btn py-3 px-4 btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</section> -->
<?php
	include "footer.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> 
<script> 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating);  //add rating value to input field
        });
    }); 
</script>
  <script>
		$(document).ready(function(){
		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined		            
		            $('#quantity').val(quantity + 1);

		            // Increment		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });		    
		});
		let thumbnails=document.getElementsByClassName("thumbnail");
		let activeImages=document.getElementsByClassName("active");
		
		for(var i=0; i< thumbnails.length;i++)
		{
			thumbnails[i].addEventListener("mouseover",function(){
				if(activeImages.length>0){
					activeImages[0].classList.remove("active");
				}
				this.classList.add("active");
				document.querySelector('.img-fluid').setAttribute('src',this.src);
				/*document.getElementsByClassName('img-fluid').src=;*/
			}	);
		}
				
		const buttonRight=document.getElementsById("slideRight");
		const buttonLeft=document.getElementsById("slideLeft");
		buttonLeft.addEventListener('mouseover',function(){
			//document.getElementsById('slider').scrollRight +=100;
			$('.slider').scrollRight(100);
			//document.getElementById('content').scrollBy(-180, 0);
		});
		buttonRight.addEventListener('click',function(){
			//document.getElementsById('slider').scrollLeft +=100;
			$('.slider').scrollLeft(-100);
			//document.getElementById('content').scrollBy(180, 0); // for right scroll
		});		
	</script>    
  </body>
</html>