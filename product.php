<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Products</h1>
            <h2 class="mb-4">Our Products</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
		<div class="row">
		<?php 
		include "database.php";
                $ctr = 0;
                $cont = 1;
                $getcardtl = mysqli_query($conn, "SELECT * FROM `products`")or die(mysqli_error($conn));

                while ($fcar = mysqli_fetch_array($getcardtl)) {
					
                    $a = $fcar["product_id"];
                    $getimg = mysqli_query($conn, "SELECT * FROM `productimages` where product_id = $a")or die(mysqli_error($conn));
                    $pi = mysqli_fetch_array($getimg);                    
			?>
			
                <div class="col-sm col-md-3 ftco-animate">
                            <div class="product productsingle gap">
                                <a href="singleproduct.php?id=<?php echo $fcar["product_id"];?>" class="img-prod"><img class="img-fluid" src="images/products/<?php echo $pi["image"];?>" alt="Image"></a>
                                <div class="text py-3 px-3">
                                    <h3><a href="singleproduct.php?id=<?php echo $fcar["product_id"];?>"><?php echo $fcar['product_name'];?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span><?php echo $fcar["product_price"];?></span></p>
                                        </div>
                                        <div class="rating">
                                            <p class="text-right">
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                                <span class="ion-ios-star-outline"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="bottom-area d-flex">
                                        <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                        <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty" style="color:red;"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    

            
			<?php 
			$cont = $cont+1;
			if ($cont==5) {
				break;
			}
            }
			?>
            </div>
			
            <button name="more" id="more" class="moreproducts" onclick="more()" >More Products</button>
            <script>
                function more() {
                    window.location.href="moreproducts.php";
                    
                }
            </script>
    	</div>
</section>

<section class="ftco-section ftco-product bg-light">
    	<div class="container">
    		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big">Trending</h1>
            <h2 class="mb-4">Trending</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="product-slider owl-carousel ftco-animate">
    					<div class="item  productsingle">
		    				<div class="product ">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="products/1.jpg" alt="Image">
		    						<span class="status">30%</span>
		    					</a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#">Pendant</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
			    							<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
			    						</div>
			    						<div class="rating">
			    							<p class="text-right">
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    							</p>
			    						</div>
		    						</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item productsingle">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="products/2.jpg" alt="Image"></a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#">Ring</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span>$120.00</span></p>
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    							</p>
			    						</div>
			    					</div>
		    					</div>
		    				</div>
	    				</div>
						<div class="item productsingle">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img src="products/7.jpg" alt="Image"></a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#">Necklace</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span>$120.00</span></p>
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    							</p>
			    						</div>
			    					</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item productsingle">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="products/3.jpg" alt="Image"></a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#">Ring</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span>$120.00</span></p>
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    							</p>
			    						</div>
			    					</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item productsingle">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="products/5.jpg" alt="Image"></a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#">Ring</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
				    						<p class="price"><span>$120.00</span></p>
				    					</div>
				    					<div class="rating">
			    							<p class="text-right">
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    							</p>
			    						</div>
			    					</div>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item productsingle">
		    				<div class="product">
		    					<a href="#" class="img-prod"><img src="products/6.jpg" alt="Image">
			    					<span class="status">30%</span>
			    				</a>
		    					<div class="text pt-3 px-3">
		    						<h3><a href="#">Pendent</a></h3>
		    						<div class="d-flex">
		    							<div class="pricing">
			    							<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
			    						</div>
			    						<div class="rating">
			    							<p class="text-right">
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    								<span class="ion-ios-star-outline"></span>
			    							</p>
			    						</div>
		    						</div>
		    					</div>
		    				</div>
	    				</div>
	    				
    				</div>
    			</div>
    		</div>
    	</div>
</section>