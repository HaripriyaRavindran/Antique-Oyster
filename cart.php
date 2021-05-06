<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
	include "header.php";
	include "database.php";
	
	
?>
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Cart</h1>
			  <h2 class="mb-4">Your Cart</h2>
			  <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
      </div>
	</div>
	<?php
		if (isset($_SESSION["name"]) && isset($_SESSION["userid"])){
			$userid=$_SESSION["userid"];
			$result = mysqli_query($conn, "SELECT `productID`,`quantity`,`price` FROM `cart` WHERE `userid` = '$userid' ");

			if(mysqli_num_rows($result)>0){
	?>		
	    				
						<table id="zerocart2" class="table padd">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Image</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
				<?php
					// $i=0;
					$row = mysqli_fetch_array($result);
					$subtotal = 0;
					do{
						$proid=$row["productID"];
						$image = mysqli_query($conn, "SELECT `image` FROM `productimages` WHERE `product_id` = '$proid' ");
						$path = mysqli_fetch_array($image);
						$name = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_id` = '$proid' ");
						$namemain = mysqli_fetch_array($name);
						$subtotal += $namemain['product_price']*$row['quantity'];
				?>

							
						    <tr class="text-center text<?php echo $proid?>" id="text<?php echo $proid?>">
						        <td class="product-remove"><div class="remove" id="remove<?php echo $proid?>" ><a><span class="ion-ios-close"></span></a></div></td>
						        <script langauge="javascript">
									
									var some =  document.getElementById("remove<?php echo $proid?>");
									some.onclick = function () {
										console.log("hello");
										$.ajax(
										{
											url:'removefromcart.php?id=<?php echo $proid;?>',
											success: function(result){
												
												document.getElementById("subtotal").textContent=<?php echo $subtotal-$namemain['product_price'];?>;
												document.getElementById("amount").textContent=document.getElementById("subtotal").textContent;
												var no= document.getElementById("cartno").textContent;
												document.getElementById("cartno").textContent = parseInt(no)-1;						

												$('tr.text<?php echo $proid?>').animate({
													padding: "0px",
													'margin-left':'-10px',
													'font-size': "0px"
												}, 500, function() {
														
													$('tr.text<?php echo $proid?>').remove();      
												});
												if(<?php echo $subtotal-$namemain['product_price'];?>==0){
													document.getElementById("zerocart").classList.add("mystyle");
													document.getElementById("zerocart2").classList.add("mystyle");
													document.getElementById("oops").classList.remove("mystyle");
												}
											
											}
										});
									}
							</script>
							
						        <td class="image-prod"><div class="img" style="background-image:url(images/products/<?php echo $path['image'];?>"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $namemain['product_name']?></h3>
						        	<p><?php echo $namemain['description']?></p>
						        </td>
						        
						        <td class="price">₹<?php echo $namemain['product_price']?></td>
						        
						        <td class="quantity">
									<?php echo $row['quantity']?>
					         	</td>
						        
						        <td id="total" class="total">₹<?php echo $namemain['product_price']*$row['quantity']?></td>
								  
							<?php
							// $i++;
							 }
							 while($row = mysqli_fetch_array($result));
							 ?>
						</tr><!-- END TR-->
							  </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div id="zerocart" class="row no-gutters slider-text align-items-center justify-content-center">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span id="subtotal">₹<?php echo $subtotal." /-";?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>₹0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>₹0.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span id="amount">₹<?php echo $subtotal." /-";?></span>
    					</p>
    				</div>
    				<p class="text-center"><a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a></p>
    			</div>	
    		</div>
			<div class='text-center'>
			<h1 class='mb-0 bread mystyle' id="oops"><b>Oops! Your cart is empty<b></h1>
			</div>
			<div class='text-center'>
				<h5 class='mb-0 bread'><a href= 'moreproducts.php'>Keep shoping!</a></h5>
			</div>						
						<?php	 
						}
						else {
							echo"<div class='text-center'>";
							echo "<h1 class='mb-0 bread'><b>Oops! Your cart is empty<b></h1>";
							echo "<a href= 'moreproducts.php'>Shop Now</a>";
							echo"</div>";
						}

					}
					else{
						echo"<div class='text-center'>";
							echo "<h1 class='mb-0 bread'><b>Login to see your cart<b></h1>";
							echo "<a href= 'logsign.php'>Login Now</a>";
							echo"</div>";
					}					
				?>
					
			</div>
</section>      			
  
<?php
	include "footer.php";
?>
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
	</script>    
  </body>
</html>