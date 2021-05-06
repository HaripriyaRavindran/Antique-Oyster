<?php
session_start();
	include "header.php";
	include "database.php";
	
	
?>
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Your Orders</h1>
			  <h2 class="mb-4">Track your orders</h2>
			  <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>My orders</span></p>
      </div>
	</div>
	<?php
		if (isset($_SESSION["name"]) && isset($_SESSION["userid"])){
			$userid=$_SESSION["userid"];
			$result = mysqli_query($conn, "SELECT   `order_id`, `order_date`, `total_amount`, `payment_option`, `status` FROM `orders` WHERE `user_id` = '$userid' ");
			if(mysqli_num_rows($result)>0){
	?>		
	    				
						<table class="table padd">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
								<th>Image</th>
								<th>Product</th>
								<th>Quantity</th>
						        <th>Date</th>
						        <th>Amount</th>
						        <th>Payment Option</th>
						        <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php
					$i=1;
					$row = mysqli_fetch_array($result);
					$subtotal = 0;
					do{
						$oid=$row["order_id"];
						$prod = mysqli_query($conn, "SELECT `product_id`,`quantity` FROM `order_details` WHERE `order_id` = '$oid' ");
						while($pid = mysqli_fetch_array($prod)){
						$proid=$pid["product_id"];
						$image = mysqli_query($conn, "SELECT `image` FROM `productimages` WHERE `product_id` = '$proid' ");
						$path = mysqli_fetch_array($image);
						$name = mysqli_query($conn, "SELECT `product_name`,`product_price` FROM `products` WHERE `product_id` = '$proid' ");
						$namemain = mysqli_fetch_array($name);
				?> 
				<tr class="text-center text<?php echo $proid?>" id="text<?php echo $proid?>">
				<td>
				<?php echo $i?>
				</td>
				<td class="image-prod"><div class="img" style="background-image:url(images/products/<?php echo $path['image'];?>"></div></td>
				<td class="product-name">
				<h3><?php echo $namemain['product_name']?></h3>
				</td>
				<td class="quantity">
				<?php echo $pid['quantity']?>
				</td>
				<td>
				<?php echo $row['order_date']?>
				</td>
				<td>
				<?php echo $namemain['product_price']?>
				</td>
				<td>
				<?php echo $row['payment_option']?>
				</td>
				<td>
				<?php 
				$flag=$row['status'];
				if($flag==0){
					echo "Pending";
				}
				elseif($flag==1){
					echo "Shipped";
				}
				elseif($flag==2){
					echo "Placed successfully";
				}
				else{
					echo "Error!shop again";
				}
				?>
				</td>
				</tr>
				
				<?php
							$i++;
							
						}
							 }
							 while($row = mysqli_fetch_array($result));
							 ?>
				<?php	 
						}
						else {
							echo"<div class='text-center'>";
							echo "<h1 class='mb-0 bread'><b>No history found !!<b></h1>";
							echo "<a href= 'moreproducts.php'>Shop Now</a>";
							echo"</div>";
						}
					}
					else{
						echo"<div class='text-center'>";
							echo "<h1 class='mb-0 bread'><b>Login to see your order history<b></h1>";
							echo "<a href= 'logsign.php'>Login Now</a>";
							echo"</div>";
					}					
				?>
				</tbody>
				</table>  
</section>
<?php
	include "footer.php";
?>
