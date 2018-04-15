<?php
	
	session_start();
	// session_unset();
	// session_destroy();

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'Store';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die('Connection failed: ' . $conn->connect_error);
	}

	if($_POST){
		if(isset($_POST['checkoutBtn'])){



			//echo $_SESSION['quantity'];

			$dataIN = $_POST['checkoutBtn'];
			$itemQuant = $_POST['itemQuantity'];
			if(isset($_POST['itemSize'])){ 

				$itemSize = $_POST['itemSize']; 
				//Shipping Prices
				if($itemSize == '2oz' || $itemSize == '4oz' || $itemSize == '6oz'){

					$itemShipping = '15';

				}elseif($itemSize == '8oz' || $itemSize == '12oz' || $itemSize == '16oz'){

					$itemShipping = '20';

				}elseif($itemSize == '1 gallon'){

					$itemShipping = '25';
				}

			} else { 

				$itemSize = ''; 
				$itemShipping = '15';

			}
			if(isset($_POST['itemColor'])){ $itemColor = $_POST['itemColor']; } else { $itemColor = ''; }
			if(isset($_POST['itemScent'])){ $itemScent = $_POST['itemScent']; } else { $itemScent = ''; }

			//echo $itemQuant;




			$Store_product = "SELECT * FROM products WHERE ID = '$dataIN'";
			$Store_product_results = $conn->query($Store_product);


			if ($Store_product_results->num_rows > 0) {
				// output data of each row
				while($Store_product_row = $Store_product_results->fetch_assoc()) {
					$Store_product_itemID = $Store_product_row['ID'];
					$Store_product_itemName = $Store_product_row['itemName'];
					$Store_product_itemDesc = $Store_product_row['itemDesc'];
					$Store_product_itemCost = $Store_product_row['itemCost'];
				}
			}

			if(!isset($_SESSION['shop_cart'])){ 

				$product_array = array(
					'item_id' => $Store_product_itemID,
					'item_name' => $Store_product_itemName,
					'item_price' => $Store_product_itemCost,
					'item_quantity' => $itemQuant,
					'item_size' => $itemSize,
					'item_color' => $itemColor,
					'item_scent' => $itemScent,
					'item_shipping' => $itemShipping
				);

				$_SESSION['shop_cart'][0] = $product_array; 

			} else{ 

				$item_arrray_id = array_column($_SESSION['shop_cart'], "item_id");
				if(!in_array($Store_product_itemID, $item_arrray_id)){
					
					$count = count($_SESSION['shop_cart']);
					
					$product_array = array(
						'item_id' => $Store_product_itemID,
						'item_name' => $Store_product_itemName,
						'item_price' => $Store_product_itemCost,
						'item_quantity' => $itemQuant,
						'item_size' => $itemSize,
						'item_color' => $itemColor,
						'item_scent' => $itemScent,
						'item_shipping' => $itemShipping
					);
					$_SESSION['shop_cart'][$count] = $product_array;
				}else{

					//header('Location: cart.php');
				}

			}
		}
	}

	if(isset($_GET['action'])){

		if($_GET['action'] == 'delete'){

			foreach ($_SESSION['shop_cart'] as $key => $value) {
				
				if($value['item_id'] == $_GET['id']){
					unset($_SESSION['shop_cart'][$key]);
					header('Location: cart.php');
				}
			}
		}
	}
	

?>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>VILE PRODUCTIONS: Cart</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
		<link rel="stylesheet" href="CSS\index.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="JS\index.js"></script>
	</head>

	<body>
		<section class="hero is-dark is-medium">
			<div class="hero-body">
			    <div class="container">
			        <h1 class="title">
			        	VILE PRODUCTIONS SFX
			      	</h1>
			      	<h2 class="subtitle">
			        	Extremely Unpleasant
			      	</h2>
			    </div>
			</div>

		</section>

		<div class="" style="width: 100%; height: auto; margin-top: 1em;">
			<div style="float: right; padding: 0.5em;">
				<a href="cart.php" class="button is-primary">
				    <span class="icon">
				     <i class="fa fa-shopping-cart"></i>
				    </span>
				    <span>Cart</span>
				</a>
			</div>

			<div style="float: right; padding: 0.5em;">
				<a href="index.php" class="button is-info">
				    <span class="icon">
				     <i class="fa fa-home"></i>
				    </span>
				    <span>Home</span>
				</a>
			</div>
		</div>

		<div class="columns is-multiline" id="cont">
			
			<div class="column" style="margin: 0em 0.5em;">
				<table class="table is-fullwidth is-bordered is-striped is-hoverable is-narrow">
					<thead>
						<tr>
							<th>Product</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							if(!empty($_SESSION['shop_cart'])){
								$total = 0;
								foreach ($_SESSION['shop_cart'] as $key => $value) {

						?>
						<tr>
							<td style="padding: 2em 0.5em;"><?php  echo $value['item_name']; ?> (<?php  echo $value['item_size']; ?>) <?php  if($value['item_color'] == ''){}elseif(isset($value['item_color'])){ echo '('; echo $value['item_color']; echo ')'; }  ?> <?php  if($value['item_scent'] == ''){}elseif(isset($value['item_scent'])){ echo '('; echo $value['item_scent']; echo ')'; } ?></td>
							<td style="padding: 2em 0.5em;">$<?php  echo $value['item_price']; ?></td>
							<td style="padding: 2em 0.5em;"><?php echo $value['item_quantity']; ?></td>
							<td style="padding: 2em 0.5em;">$<?php  echo number_format($value['item_quantity'] * $value['item_price'], 2); ?></td>
							<td><a href="cart.php?action=delete&id=<?php echo $value['item_id']; ?>" class="button is-danger">x</a></td>
						</tr>
						<?php
								$total = $total + ($value['item_quantity'] * $value['item_price']);
							}
						?>
						<tr>
							<td></td>
							<td></td>
							<td class="subtitle" align="right"></td>
							<td style="padding: 3em 0.5em;" align="right">$<?php  echo number_format($total, 2); ?></td>
							<td></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				<div style="width: 100%;">
					<a class="button is-success" href="checkout.php" name="checkoutBtn" value="<?php echo $Store_products_itemID; ?>" style="float: right; margin-right: 1em;">Checkout</a>
					<a class="button is-info" style="float: right; margin-right: 1em;" href="index.php">Back to Shopping</a>
				</div>
			</div>
		<!-- Column Container end -->
		</div>
		




		<footer class="footer" id="foot">
	  		<div class="container">
	    		<div class="content has-text-centered has-text-white">
	      			<p>
	        			&#169;2018 <strong>VILE PRODUCTIONS SFX</strong> 	
	      			</p>
	      			<a class="" href="https://twitter.com/ProductionsVile" style="font-size: 1.5em;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	      			<a class="" href="https://www.instagram.com/productionsvile/" style="font-size: 1.5em;"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	      			<a class="" href="https://www.facebook.com/ProductionsVile" style="font-size: 1.5em;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	      			<a class="" href="mailto:productionsvile@gmail.com" style="font-size: 1.5em;"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
	      			<p style="font-size: 0.8em;">
	      				<i>Developed by Goonshark, Contact via Twitter @Goonshark_</i>
	      			</p>
	    		</div>
	  		</div>
		</footer>

	</body>
</html>