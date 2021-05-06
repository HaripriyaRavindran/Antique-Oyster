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
	
	$add="ADD TO CART";

	if(isset($_SESSION["userid"]))
	{
		
		$userid=$_SESSION["userid"];
		$res=mysqli_query($conn,"SELECT * FROM `cart` WHERE `userID`= $userid && `productID` =$id " );
		$check=mysqli_num_rows($res);
		if($check>0){
			$add = "ADDED";
		}
		else{
			$add = "ADD TO CART";
		}
	}
	else {
		$userid=0;
	}
	
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
    		<div class="row d-flex justify-content-center py-5">
			    <div class="p-5 mb-5 col-lg-9 productsingle" >
				    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mb-5 ftco-animate">
                                <img src="images/products/<?php echo $pi['image'];?>" class="rounded float-left" width=450 height=450></a>	
				            </div>
                            <div class="col-lg-6 product-details pl-md-5 ftco-animate" style="text-align: left;">
                                <h3><?php echo $p['product_name']; ?></h3>
                                <p><?php echo $p['description']; ?></p>
                                <p class="price"><span>Rs.<?php echo $p['product_price']; ?></span></p>
                                <h6>Shippable : <?php if($p['shippable']==0){
                                    echo "No";
                                }
                                else{
                                    echo "Yes";
                                }
                                ?></h6>
                                <h6>Stocks left : <?php echo $p['stock']; ?></h6>
                                <h6>Weight : <?php echo $p['product_weight'];?></h6>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group d-flex">
                                                <div class="select-wrap">
                                                    
                                                    <label for="">Number of products you want : </label> 
                                                    <div class="select-wrap">
		                  								<div class="icon">
															<span class="ion-ios-arrow-down"></span>
														</div>
                                                    <select name="quantity" id="quantity" class="form-control">
                                                    
                                                    <?php
                                                            for ($x = 1; $x <= $p['stock'] ;$x++) {
                                                            echo "<option value=".$x.">".$x."</option>";
                                                            }
                                                        ?>
                                                    
                                                    </select>
												</div>
                                                    <!-- <i class="fa fa-caret-down"></i> -->
                                            </div>
                                        </div>
                                    </div>
                            </div>
													
							<input type="button" value="<?php echo $add;?>" id="insert" style="width:130px; margin-left:20px"  class="btn btn-success justify-content-center"/>
							<script>
								var value= document.getElementById("insert").value;
								if (value=="ADDED") {
									var button= document.getElementById("insert");
									button.disabled=true;
									button.classList.add("no-drop");
								}
							</script>							
                                    
                                    
							
								<!-- <form action='addtocart.php?quantity=&id=<?php //echo $id;?>' method='post'> -->
									
									
									<script>	
										var some =  document.getElementById("insert");
										some.onclick = function () {
											console.log("hello");
											var userid= "<?php echo $userid; ?>"
											console.log(userid);
											if (userid ==0) { 
												console.log("else");
												alert("Please login first");
												// $('#myModal')
												// document.getElementById("myModal").showModal();
												}
											
											else {
												console.log("here");
												var quantity = document.getElementById("quantity").value;
												// console.log("hello");
												$.ajax(
												{
													url:'addtocart.php?quantity='+quantity+'&id=<?php echo $id;?>',
													success: function(result){
														console.log(quantity);
														document.getElementById("insert").value = "ADDED";
														const button = document.getElementById('insert');
														button.disabled = true;
														button.classList.add("no-drop");
														var no= document.getElementById("cartno").textContent;
														document.getElementById("cartno").textContent = parseInt(no)+1;
													}
												});
												// alert("Please log in first");
											}
											
										}
										
										
									</script>
								<!-- </form> -->					
					
                        </div>
				  
          	        </div>
			  
				</div>
    		</div>
    	</div>
		<button name="more" id="more" class="btn morep" onclick="more()" >More Products</button>
			<script>
				function more() {
					window.location.href="moreproducts.php";	
				}
			</script>
    </div>
</section>


<!-- modal  -->
<!-- <div class="modal" tabindex="-1" id="myModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div> -->

<!-- reviews  -->
<!-- <section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
			<div class="comment-body">
			hjkl;         
			</div>
        	<div class="row d-flex justify-content-center py-5">
            	<div class="col-md-7 text-center heading-section ftco-animate">
            		<h1 class="big">Review</h1>
              		<div class="comment-form-wrap pt-5">
                		<h3 class="mb-5">Give reviews</h3>
                		<form action="single.php" class="p-5 bg-light" method="post">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> 
    <!-- <script>
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
	</script>      -->
<?php
	include "footer.php";d
?>

