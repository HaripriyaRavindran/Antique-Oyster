<?php
	include "header.php";
	include "database.php";
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	  }
	
	// $user_id=$_SESSION["userid"];
	// $pid=101;
	// if ($_SERVER["REQUEST_METHOD"] == "POST")
	// {
	// 	$message = $_POST["message"];
	// 	$rating = $_POST["rating"];

	// 	$sql = "INSERT INTO `feedback`(`user_id`, `product_id`, `rating`,  `feedback`) VALUES ($user_id,$pid,$rating,'$message')";
	// 	if (mysqli_query($conn, $sql))
	// 	{
	// 		echo "<script>alert('Posted successfully')</script>";
	// 	}
	// 	else
	// 	{
	// 		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	// 	}
	// }
?>		
	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Product Details</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Details</span></p>
          </div>
        </div>
      </div>
    </div>
<?php
 
$sql="SELECT `image` FROM `productimages` WHERE `product_id`=$pid";
$data=$conn->query($sql);
$result=mysqli_fetch_array($data);
$sql="SELECT * FROM `products` WHERE `product_id`=$pid";
$data=$conn->query($sql);
$details=mysqli_fetch_array($data);
?>		
		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<img src="images/products/4.jpg" class=" image-popup"></a>
					<!--<div id="slide-wrapper">
						<img id="slideLeft" class="arrow" src="images/leftarrow.png">
						<div id="slider">
							<img class="thumbnail" src="images/r.png">
							<img class="thumbnail" src="images/ring.png">
							<img class="thumbnail active" src="images/product-1.jpg">
							<img class="thumbnail" src="images/image_2.jpg">
							<img class="thumbnail" src="images/r.png">
							<img class="thumbnail" src="images/ring.png"> 
							<img class="thumbnail" src="images/image_2.jpg">
							<img class="thumbnail" src="images/image_2.jpg">
							<img class="thumbnail" src="images/r.png">
							<img class="thumbnail" src="images/ring.png">
							<img class="thumbnail" src="images/image_2.jpg">
						</div>muje ab ye product ka id chahaiiye
						<img id="slideRight" class="arrow" src="images/rightarrow.png">
					</div>-->
				</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $details['product_name']; ?></h3>
    				<p class="price"><span>Rs.<?php echo $details['product_price']; ?></span></p>
    				<p><?php echo $details['description']; ?></p>
					<h6>Shippable : <?php if($details['shippable']==0){
						echo "No";
					 }
					 else{
						echo "Yes";
					 }
					  ?></h6>
					 <h6>Stocks left : <?php echo $details['stock']; ?></h6>
					 <h6>Weight : <?php echo $details['product_weight'];?></h6>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
					<div class="select-wrap">
					  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
					  <label for="">Number of products you want : </label> 
	                  <select name="" id="" class="form-control">
					  <?php
							for ($x = 1; $x <= $details['stock'] ;$x++) {
  							echo "<option value=".$x.">".$x."</option>";
							}
						?>
	                  
	                  </select>
	                </div>
		            </div>
					</div>
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
	          	</div>
          	</div>
			  <form action='addtocart.php?quantity=4&id=102' method='post' id='insertform' >
			  	<!-- <button class=" btn solid " id='insert'>Add to cart</button> -->
			  	<input type="submit" id="insert" class=" btn solid ">
			  </form>
			<!-- <button type="submit" onclick="addt"></button> --> 
			<!-- <p><a href="addtocart.php?id=<?php //echo $details['product_Id'];?>"  class="btn btn-primary py-3 " >Add to Cart</a></p> -->
    			</div>
    		</div>
    	</div>
    </section>
	<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
		<div class="comment-body">
			<?php			
			$sql="SELECT * FROM `feedback` WHERE `product_id`=$pid";
			$val=mysqli_query($conn,$sql);
			$sqlc="SELECT count(*) FROM `feedback` WHERE `product_id`=$pid";
			$value=mysqli_query($conn,$sqlc);
			$num=mysqli_fetch_array($value);
			echo "<h3>$num[0] reviews</h3><br><hr>";			
			while($r=mysqli_fetch_array($val))
			{
			$sqls="SELECT fname,lname FROM `login` WHERE `user_id`=$r[0]";
			$data=$conn->query($sqls);
			// $name=mysqli_fetch_array($data);
			// 	echo "<h4 style='float:left'> $name[0]  $name[1]</h4>";
			// 	echo "<div style='float:left' class='rateyo' id= 'rating' data-rateyo-rating='$r[2]'></div><br>";
			// 	echo "<br><div  class='meta'>$r[5]</div>";			 
			// 	echo "<p>$r[4]</p>";
			} 
			?>         
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
    </section>
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