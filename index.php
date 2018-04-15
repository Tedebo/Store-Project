<?php
	
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


?>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	    <title>VILE PRODUCTIONS: Home</title>
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
			      	<!-- <figure class="image is-1by1">
					  <img src="https://bulma.io/images/placeholders/256x256.png">
					</figure> -->
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
		
			<?php 

				$Store_products = "SELECT * FROM products ORDER BY ID DESC";
				$Store_products_results = $conn->query($Store_products);


				if ($Store_products_results->num_rows > 0) {
					    // output data of each row
					while($Store_products_row = $Store_products_results->fetch_assoc()) {
						$Store_products_itemID = $Store_products_row['ID'];
					    $Store_products_itemName = $Store_products_row['itemName'];
					    $Store_products_itemDesc = $Store_products_row['itemDesc'];
					    $Store_products_itemCost = $Store_products_row['itemCost'];

					    $Store_products_size2oz = $Store_products_row['size2oz'];
					    $Store_products_size4oz = $Store_products_row['size4oz'];
					    $Store_products_size6oz = $Store_products_row['size6oz'];
					    $Store_products_size8oz = $Store_products_row['size8oz'];
					    $Store_products_size12oz = $Store_products_row['size12oz'];
					    $Store_products_size16oz = $Store_products_row['size16oz'];
					    $Store_products_size1gallon = $Store_products_row['size1gallon'];

					    $Store_products_colorBlack = $Store_products_row['colorBlack'];
					    $Store_products_colorBlue = $Store_products_row['colorBlue'];
					    $Store_products_colorBrown = $Store_products_row['colorBrown'];
					    $Store_products_colorGreen = $Store_products_row['colorGreen'];
					    $Store_products_colorRed = $Store_products_row['colorRed'];
					    $Store_products_colorYellow = $Store_products_row['colorYellow'];
					    $Store_products_colorPurple = $Store_products_row['colorPurple'];
					    $Store_products_colorAlienGreen = $Store_products_row['colorAlienGreen'];
					    $Store_products_colorBloodRed = $Store_products_row['colorBloodRed'];
					    $Store_products_colorZombieBlack = $Store_products_row['colorZombieBlack'];

					    $Store_products_scentBloodyHell = $Store_products_row['scentBloodyHell'];
					    $Store_products_scentCottonCandy = $Store_products_row['scentCottonCandy'];

					    $Store_products_image = $Store_products_row['image'];

					    //echo $usernameGet;
						
						$proID = $Store_products_itemID;


						// Make sure to add any new Sizes to the if statement to check if it should display or not.
						if($Store_products_size2oz === 'true' || $Store_products_size4oz === 'true' || $Store_products_size6oz === 'true' || $Store_products_size8oz === 'true' || $Store_products_size12oz === 'true' || $Store_products_size16oz === 'true' || $Store_products_size1gallon === 'true'){ 
							
							$sizeActive = true;

						}else{ 

							$sizeActive = false; 
						}

						// Make sure to add any new Colors to the if statement to check if it should display or not.
						if($Store_products_colorBlack === 'true' || $Store_products_colorBlue === 'true' || $Store_products_colorBrown === 'true' || $Store_products_colorGreen === 'true' || $Store_products_colorRed === 'true' || $Store_products_colorYellow === 'true' || $Store_products_colorPurple === 'true' || $Store_products_colorAlienGreen === 'true' || $Store_products_colorBloodRed === 'true' || $Store_products_colorZombieBlack === 'true'){ 
							
							$colorActive = true;

						}else{ 

							$colorActive = false; 
						}

						// Make sure to add any new Scents to the if statement to check if it should display or not.
						if($Store_products_scentBloodyHell === 'true' || $Store_products_scentCottonCandy === 'true'){ 
							
							$scentActive = true;

						}else{ 

							$scentActive = false; 
						}


			?>
			<!-- Seperate Column -->
			<div class="column is-four-fifths-mobile is-one-third-tablet is-one-quarter-desktop" id="size">
						<div class="card <?php echo $Store_products_itemID; ?>" id="productCont">
							<div id="productHide">
								<div class="card-image">
									   <figure class="image is-1by1">
									       <img src="<?php if($Store_products_image == ''){ echo 'https://bulma.io/images/placeholders/1280x960.png'; }elseif(isset($Store_products_image)){ echo 'uploads/'; echo $Store_products_image; } ?>" alt="Placeholder image">
									   </figure>
								</div>
								<div class="card-content">
									   <div class="media">

									       <div class="media-content">
									        <p class="title is-4" title="<?php echo $Store_products_itemName; ?>" id="textover"><?php echo $Store_products_itemName; ?></p>
									        <p class="subtitle is-6 is-text-centered"><i class="fa fa-usd" aria-hidden="true"></i><?php echo $Store_products_itemCost; ?></p>
									      </div>
									   </div>
								</div>
								 
							</div>
						</div>
			</div>
			<!-- Card modal -->
										<div class="modal item<?php echo $Store_products_itemID; ?>" id="item<?php echo $Store_products_itemID; ?>">
										  <div class="modal-background"></div>
										  <div class="modal-card" id="maxsize">
										    <header class="modal-card-head">
										        <p class="modal-card-title" id="textover"><?php echo $Store_products_itemName; ?></p>
										        <button class="delete cancelBtn<?php echo $Store_products_itemID; ?>" aria-label="close"></button>
										    </header>
										    <section class="modal-card-body">
										      <!-- Content ... -->
												<div class="columns is-multiline">
										      	<?php
										    		$Store_products2 = "SELECT * FROM productImages WHERE productID = '$proID' ORDER BY ID DESC LIMIT 2";
													$Store_products_results2 = $conn->query($Store_products2);


													if ($Store_products_results2->num_rows > 0) {
														    // output data of each row
														while($Store_products_row2 = $Store_products_results2->fetch_assoc()) {

															$Store_products_image2 = $Store_products_row2['image'];
										    	?>
										    	
										    		<div class="column">
												     	<figure class="image is-1by1" style="width: 258px; margin: 0px !important;">
														  <img src="<?php echo 'uploads/showcase/'; echo $Store_products_image2; ?>" style="height: 100%;" class="button">
														</figure>
													</div>
												
												
												<?php }}?>
												</div>

										    <form method="post" action="cart.php">
										      <p><?php echo $Store_products_itemDesc; ?></p>			      
										     <hr>
										     <!-- SIZES -->
										     <div style="display: <?php if($sizeActive == true) { echo 'inline-block'; } else{ echo 'none'; }?>;">
											     <p>Size: </p>
											      <select class="select" name="itemSize">
											      		<?php 
											      			
											      			if($Store_products_size2oz === 'true'){ 

											      				$Store_products_size2oz = '2oz'; 
											      				echo "<option value='"; echo $Store_products_size2oz; echo "'>"; echo $Store_products_size2oz; echo "</option>";

											      			}

											      			if($Store_products_size4oz === 'true'){ 

											      				$Store_products_size4oz = '4oz'; 
											      				echo "<option value='"; echo $Store_products_size4oz; echo "'>"; echo $Store_products_size4oz; echo "</option>";

											      			}

											      			if($Store_products_size6oz === 'true'){ 

											      				$Store_products_size6oz = '6oz'; 
											      				echo "<option value='"; echo $Store_products_size6oz; echo "'>"; echo $Store_products_size6oz; echo "</option>";

											      			}

											      			if($Store_products_size8oz === 'true'){ 

											      				$Store_products_size8oz = '8oz'; 
											      				echo "<option value='"; echo $Store_products_size8oz; echo "'>"; echo $Store_products_size8oz; echo "</option>";

											      			}

											      			if($Store_products_size12oz === 'true'){ 

											      				$Store_products_size12oz = '12oz'; 
											      				echo "<option value='"; echo $Store_products_size12oz; echo "'>"; echo $Store_products_size12oz; echo "</option>";

											      			}

											      			if($Store_products_size16oz === 'true'){ 

											      				$Store_products_size16oz = '16oz'; 
											      				echo "<option value='"; echo $Store_products_size16oz; echo "'>"; echo $Store_products_size16oz; echo "</option>";

											      			}

											      			if($Store_products_size1gallon === 'true'){ 

											      				$Store_products_size1gallon = '1 gallon'; 
											      				echo "<option value='"; echo $Store_products_size1gallon; echo "'>"; echo $Store_products_size1gallon; echo "</option>";

											      			}
											      			
											      		?>
											      </select>
											  </div>
											  <!-- COLORS -->
										      <div style="display: <?php if($colorActive == true) { echo 'inline-block'; } else{ echo 'none'; }?>;">
											      <p>Color: </p>
											      <select class="select" name="itemColor">
											      		<?php 
											      			
											      			if($Store_products_colorBlack === 'true'){ 

											      				$Store_products_colorBlack = 'Black'; 
											      				echo "<option value='"; echo $Store_products_colorBlack; echo "'>"; echo $Store_products_colorBlack; echo "</option>";

											      			}

											      			if($Store_products_colorBlue === 'true'){ 

											      				$Store_products_colorBlue = 'Blue'; 
											      				echo "<option value='"; echo $Store_products_colorBlue; echo "'>"; echo $Store_products_colorBlue; echo "</option>";

											      			}

											      			if($Store_products_colorBrown === 'true'){ 

											      				$Store_products_colorBrown = 'Brown'; 
											      				echo "<option value='"; echo $Store_products_colorBrown; echo "'>"; echo $Store_products_colorBrown; echo "</option>";

											      			}

											      			if($Store_products_colorGreen === 'true'){ 

											      				$Store_products_colorGreen = 'Green'; 
											      				echo "<option value='"; echo $Store_products_colorGreen; echo "'>"; echo $Store_products_colorGreen; echo "</option>";

											      			}

											      			if($Store_products_colorRed === 'true'){ 

											      				$Store_products_colorRed = 'Red'; 
											      				echo "<option value='"; echo $Store_products_colorRed; echo "'>"; echo $Store_products_colorRed; echo "</option>";

											      			}

											      			if($Store_products_colorYellow === 'true'){ 

											      				$Store_products_colorYellow = 'Yellow'; 
											      				echo "<option value='"; echo $Store_products_colorYellow; echo "'>"; echo $Store_products_colorYellow; echo "</option>";

											      			}

											      			if($Store_products_colorPurple === 'true'){ 

											      				$Store_products_colorPurple = 'Purple'; 
											      				echo "<option value='"; echo $Store_products_colorPurple; echo "'>"; echo $Store_products_colorPurple; echo "</option>";

											      			}

											      			if($Store_products_colorAlienGreen === 'true'){ 

											      				$Store_products_colorAlienGreen = 'Alien Green'; 
											      				echo "<option value='"; echo $Store_products_colorAlienGreen; echo "'>"; echo $Store_products_colorAlienGreen; echo "</option>";

											      			}

											      			if($Store_products_colorBloodRed === 'true'){ 

											      				$Store_products_colorBloodRed = 'Blood Red'; 
											      				echo "<option value='"; echo $Store_products_colorBloodRed; echo "'>"; echo $Store_products_colorBloodRed; echo "</option>";

											      			}

											      			if($Store_products_colorZombieBlack === 'true'){ 

											      				$Store_products_colorZombieBlack = 'Zombie Black'; 
											      				echo "<option value='"; echo $Store_products_colorZombieBlack; echo "'>"; echo $Store_products_colorZombieBlack; echo "</option>";

											      			}
											      			
											      		?>
											      </select>
											  </div>
											  <!-- SCENTS -->
											  <div style="display: <?php if($scentActive == true) { echo 'inline-block'; } else{ echo 'none'; }?>;">
											      <p>Scent: </p>
											      <select class="select" name="itemScent">
											      		<?php 
											      			
											      			if($Store_products_scentBloodyHell === 'true'){ 

											      				$Store_products_scentBloodyHell = 'Bloody Hell'; 
											      				echo "<option value='"; echo $Store_products_scentBloodyHell; echo "'>"; echo $Store_products_scentBloodyHell; echo "</option>";

											      			}

											      			if($Store_products_scentCottonCandy === 'true'){ 

											      				$Store_products_scentCottonCandy = 'Cotton Candy'; 
											      				echo "<option value='"; echo $Store_products_scentCottonCandy; echo "'>"; echo $Store_products_scentCottonCandy; echo "</option>";

											      			}
											      			
											      		?>
											      </select>
											  </div>

										      <p>Qty:</p>
										      <select class="select" name="itemQuantity">
										      		<option value="1">1</option>
										      		<option value="2">2</option>
										      		<option value="3">3</option>
										      		<option value="4">4</option>
										      		<option value="5">5</option>
										      		<option value="6">6</option>
										      		<option value="7">7</option>
										      		<option value="8">8</option>
										      		<option value="9">9</option>
										      		<option value="10">10</option>
										      		<option value="11">11</option>
										      		<option value="12">12</option>
										      		<option value="13">13</option>
										      		<option value="14">14</option>
										      		<option value="15">15</option>
										      		<option value="16">16</option>
										      		<option value="17">17</option>
										      		<option value="18">18</option>
										      		<option value="19">19</option>
										      		<option value="20">20</option>
										      </select>

										      
										    </section>
										    <footer class="modal-card-foot">
										      <button class="button is-success" name="checkoutBtn" value="<?php echo $Store_products_itemID; ?>" >Add To Cart</button>
										      </form>
										      <button class="button cancelBtn<?php echo $Store_products_itemID; ?>">Cancel</button>
										    </footer>
											
										  </div>
										</div>
										<script>
									   		$(document).ready(function(){
												//$('#itemAdd').addClass('is-active');
												$('.<?php echo $Store_products_itemID; ?>').click(function(){

													$('.item<?php echo $Store_products_itemID; ?>').addClass('is-active');
												});

												$('.cancelBtn<?php echo $Store_products_itemID; ?>').click(function(){

													$('.item<?php echo $Store_products_itemID; ?>').removeClass('is-active');
												});

											});
								   		</script>
			<?php


				}}
			?>

			
		

		<!-- Column Container end -->
		</div>
		




		<footer class="footer" id="foot">
	  		<div class="container">
	    		<div class="content has-text-centered">
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