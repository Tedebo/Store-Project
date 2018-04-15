<?php
	
	session_start();

if($_SESSION['Store_con_user'] == 'Store_con_user_true'){

	if($_POST){

		if(isset($_POST['logoutbtn'])){
			session_unset();
			session_destroy();
			header('Location: login.php');
		}
	}

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'Store';
	if(isset($_SESSION['Store_con_user_email'])){
		$userlogged = $_SESSION['Store_con_user_email'];
	}

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die('Connection failed: ' . $conn->connect_error);
	}

	$Store_users = "SELECT fname, lname, email FROM users WHERE email='$userlogged'";
	$Store_users_results = $conn->query($Store_users);


	if ($Store_users_results->num_rows > 0) {
		    // output data of each row
		while($Store_users_row = $Store_users_results->fetch_assoc()) {
		    $Store_users_fname = $Store_users_row['fname'];
		    $Store_users_lname = $Store_users_row['lname'];
		    $Store_users_email = $Store_users_row['email'];
		    //echo $usernameGet;
		}
	}


	if($_POST){



		if(isset($_POST['postBtn'])){

			if(isset($_POST['itemNameIn'])){ $itemName = $_POST['itemNameIn']; } 
			if(isset($_POST['itemDescIn'])){ $itemDesc = $_POST['itemDescIn']; }
			if(isset($_POST['itemCostIn'])){ $itemCost = $_POST['itemCostIn']; }

			// Sizes
			if(isset($_POST['size2oz'])){ $size2oz = 'true'; }else{ $size2oz = 'false'; }
			if(isset($_POST['size4oz'])){ $size4oz = 'true'; }else{ $size4oz = 'false'; }
			if(isset($_POST['size6oz'])){ $size6oz = 'true'; }else{ $size6oz = 'false'; }
			if(isset($_POST['size8oz'])){ $size8oz = 'true'; }else{ $size8oz = 'false'; }
			if(isset($_POST['size12oz'])){ $size12oz = 'true'; }else{ $size12oz = 'false'; }
			if(isset($_POST['size16oz'])){ $size16oz = 'true'; }else{ $size16oz = 'false'; }
			if(isset($_POST['size1gallon'])){ $size1gallon = 'true'; }else{ $size1gallon = 'false'; }

			//Colors
			if(isset($_POST['colorBlack'])){ $colorBlack = 'true'; }else{ $colorBlack = 'false'; }
			if(isset($_POST['colorBlue'])){ $colorBlue = 'true'; }else{ $colorBlue = 'false'; }
			if(isset($_POST['colorBrown'])){ $colorBrown = 'true'; }else{ $colorBrown = 'false'; }
			if(isset($_POST['colorGreen'])){ $colorGreen = 'true'; }else{ $colorGreen = 'false'; }
			if(isset($_POST['colorRed'])){ $colorRed = 'true'; }else{ $colorRed = 'false'; }
			if(isset($_POST['colorYellow'])){ $colorYellow = 'true'; }else{ $colorYellow = 'false'; }
			if(isset($_POST['colorPurple'])){ $colorPurple = 'true'; }else{ $colorPurple = 'false'; }
			if(isset($_POST['colorAlienGreen'])){ $colorAlienGreen = 'true'; }else{ $colorAlienGreen = 'false'; }
			if(isset($_POST['colorBloodRed'])){ $colorBloodRed = 'true'; }else{ $colorBloodRed = 'false'; }
			if(isset($_POST['colorZombieBlack'])){ $colorZombieBlack = 'true'; }else{ $colorZombieBlack = 'false'; }

			//Scents
			if(isset($_POST['scentBloodyHell'])){ $scentBloodyHell = 'true'; }else{ $scentBloodyHell = 'false'; }
			if(isset($_POST['scentCottonCandy'])){ $scentCottonCandy = 'true'; }else{ $scentCottonCandy = 'false'; }


			$Store_product_insert = "INSERT INTO products (itemName, itemDesc, size2oz, size4oz, size6oz, size8oz, size12oz, size16oz, size1gallon, colorBlack, colorBlue, colorBrown, colorGreen, colorRed, colorYellow, colorPurple, colorAlienGreen, colorBloodRed, colorZombieBlack, scentBloodyHell, scentCottonCandy, itemCost) VALUES ('$itemName', '$itemDesc', '$size2oz', '$size4oz', '$size6oz', '$size8oz', '$size12oz', '$size16oz', '$size1gallon', '$colorBlack', '$colorBlue', '$colorBrown', '$colorGreen', '$colorRed', '$colorYellow', '$colorPurple', '$colorAlienGreen', '$colorBloodRed', '$colorZombieBlack', '$scentBloodyHell', '$scentCottonCandy', '$itemCost')";

			if ($conn->query($Store_product_insert) === TRUE) {
				echo "New record created successfully";
				header('Location: hub.php');
			} else {
				//echo "Error: " . $SEDit_users_insert . "<br>" . $conn->error;
			}
		}

	if(isset($_POST['updateBtn'])){

			$proID = $_POST['updateBtn'];

			if(isset($_POST['itemNameIn'])){ $itemName = $_POST['itemNameIn']; } 
			if(isset($_POST['itemDescIn'])){ $itemDesc = $_POST['itemDescIn']; }
			if(isset($_POST['itemCostIn'])){ $itemCost = $_POST['itemCostIn']; }

			// Sizes
			if(isset($_POST['size2oz'])){ $size2oz = 'true'; }else{ $size2oz = 'false'; }
			if(isset($_POST['size4oz'])){ $size4oz = 'true'; }else{ $size4oz = 'false'; }
			if(isset($_POST['size6oz'])){ $size6oz = 'true'; }else{ $size6oz = 'false'; }
			if(isset($_POST['size8oz'])){ $size8oz = 'true'; }else{ $size8oz = 'false'; }
			if(isset($_POST['size12oz'])){ $size12oz = 'true'; }else{ $size12oz = 'false'; }
			if(isset($_POST['size16oz'])){ $size16oz = 'true'; }else{ $size16oz = 'false'; }
			if(isset($_POST['size1gallon'])){ $size1gallon = 'true'; }else{ $size1gallon = 'false'; }

			//Colors
			if(isset($_POST['colorBlack'])){ $colorBlack = 'true'; }else{ $colorBlack = 'false'; }
			if(isset($_POST['colorBlue'])){ $colorBlue = 'true'; }else{ $colorBlue = 'false'; }
			if(isset($_POST['colorBrown'])){ $colorBrown = 'true'; }else{ $colorBrown = 'false'; }
			if(isset($_POST['colorGreen'])){ $colorGreen = 'true'; }else{ $colorGreen = 'false'; }
			if(isset($_POST['colorRed'])){ $colorRed = 'true'; }else{ $colorRed = 'false'; }
			if(isset($_POST['colorYellow'])){ $colorYellow = 'true'; }else{ $colorYellow = 'false'; }
			if(isset($_POST['colorPurple'])){ $colorPurple = 'true'; }else{ $colorPurple = 'false'; }
			if(isset($_POST['colorAlienGreen'])){ $colorAlienGreen = 'true'; }else{ $colorAlienGreen = 'false'; }
			if(isset($_POST['colorBloodRed'])){ $colorBloodRed = 'true'; }else{ $colorBloodRed = 'false'; }
			if(isset($_POST['colorZombieBlack'])){ $colorZombieBlack = 'true'; }else{ $colorZombieBlack = 'false'; }

			//Scents
			if(isset($_POST['scentBloodyHell'])){ $scentBloodyHell = 'true'; }else{ $scentBloodyHell = 'false'; }
			if(isset($_POST['scentCottonCandy'])){ $scentCottonCandy = 'true'; }else{ $scentCottonCandy = 'false'; }


			$Store_product_update = "UPDATE products SET itemName = '$itemName', itemDesc = '$itemDesc', size2oz = '$size2oz', size4oz = '$size4oz', size6oz = '$size6oz', size8oz = '$size8oz', size12oz = '$size12oz', size16oz = '$size16oz', size1gallon = '$size1gallon', colorBlack = '$colorBlack', colorBlue = '$colorBlue', colorBrown = '$colorBrown', colorGreen = '$colorGreen', colorRed = '$colorRed', colorYellow = '$colorYellow', colorPurple = '$colorPurple', colorAlienGreen = '$colorAlienGreen', colorBloodRed = '$colorBloodRed', colorZombieBlack = '$colorZombieBlack', scentBloodyHell = '$scentBloodyHell', scentCottonCandy = '$scentCottonCandy', itemCost = '$itemCost' WHERE ID = '$proID'";

			if ($conn->query($Store_product_update) === TRUE) {
				echo "New record created successfully";
				header('Location: hub.php');
			} else {
				//echo "Error: " . $SEDit_users_insert . "<br>" . $conn->error;
			}

		}	
	

	}


	if(isset($_POST['removeBtn'])){

		$delID = $_POST['removeBtn'];

		if(isset($_POST['itemRemove'])){

			$Store_product_delete = "DELETE FROM products WHERE ID = '$delID'";

			if ($conn->query($Store_product_delete) === TRUE) {
				echo "New record removed successfully";
				header('Location: hub.php');
			} else {
				//echo "Error: " . $SEDit_users_insert . "<br>" . $conn->error;
			}
		}
	}

	if(isset($_POST['removeImage'])){

		$delImage = $_POST['removeImage'];

		$Store_product_delete_image = "DELETE FROM productImages WHERE ID = '$delImage'";

		if ($conn->query($Store_product_delete_image) === TRUE) {
			echo "New record removed successfully";
			header('Location: hub.php');
		} else {
				//echo "Error: " . $SEDit_users_insert . "<br>" . $conn->error;
		}

	}

	

}else{

	header('Location: login.php');

}


?>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"">
	    <title>VILE PRODUCTIONS: Hub</title>
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

			      	<div style="float: right;">
				    <form method="post">
						<div class="field">
							<p class="control">
								<button class="button is-danger" type="submit" name="logoutbtn">
									Logout
								</button>
							</p>
						</div>
					</form>
				</div>
			    </div>

			</div>

		</section>


		<div class="columns is-multiline" id="cont">
		
			<!-- ADD BUTTON -->
			<div class="column is-one-third-tablet is-one-quarter-desktop">
				
					<div class="tile">
								   <div class="media">

								       <div class="media-content">
								        <p class="title button is-info" id="addBtn"> + </p>
								        <p class="subtitle is-6 is-text-centered"></p>
								      </div>
					</div>
				</div>
				
			</div>

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
										    <!-- <form method="post" action="upload.php" enctype="multipart/form-data"> -->
										    	
												<!-- <input type="submit" value="Upload Image" name="submit"> -->
										    <!-- </form> -->
										    <form method="post" action="upload.php" enctype="multipart/form-data">
										    	<div style="padding-bottom: 4em;">
											    	
											    	<div class="file is-small has-name is-boxed" style="float: left;">
													  <label class="file-label">
													    <input class="file-input" type="file" name="fileToUpload">
													    <input type="hidden" name="prodID" value="<?php echo $Store_products_itemID; ?>">
													    <span class="file-cta">
													      <span class="file-icon">
													        <i class="fas fa-upload"></i>
													      </span>
													      <span class="file-label">
													        Choose a file…
													      </span>
													    </span>
													    <span class="file-name">
													      Product Image
													    </span>
													  </label>
													</div>

													<div class="file is-small has-name is-boxed" style="float: left;">
													  <label class="file-label">
													    <input class="file-input" type="file" name="showcaseImage">
													    <input type="hidden" name="prodID" value="<?php echo $Store_products_itemID; ?>">
													    <span class="file-cta">
													      <span class="file-icon">
													        <i class="fas fa-upload"></i>
													      </span>
													      <span class="file-label">
													        Choose a file…
													      </span>
													    </span>
													    <span class="file-name">
													      Showcase Image(s)
													    </span>
													    
													  </label>
													  
													</div>

												</div>
												<br><br><br>
												<buttton class="button is-primary is-medium" id="viewImage<?php echo $Store_products_itemID; ?>" style="margin-top: 1em; float: right;"><i class="fa fa-picture-o" aria-hidden="true"></i></buttton>

											<div style="padding-top: 4em;">

										      <p>Item Name</p>
										      <input class="input" type="text" name="itemNameIn" placeholder="<?php echo $Store_products_itemName; ?>" value="<?php echo $Store_products_itemName; ?>" required>
										      <hr>

										      <p>Item Description</p>
										      <textarea class="textarea" name="itemDescIn" placeholder=""><?php echo $Store_products_itemDesc; ?></textarea>			      
										      <hr>

										      <p>Sizes</p>
										      <label>
										      		<input class="" type="checkbox" name="size2oz" placeholder="2oz" <?php if($Store_products_size2oz == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		2oz
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="size4oz" placeholder="4oz" <?php if($Store_products_size4oz == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		4oz
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="size6oz" placeholder="6oz" <?php if($Store_products_size6oz == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		6oz
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="size8oz" placeholder="8oz" <?php if($Store_products_size8oz == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		8oz
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="size12oz" placeholder="12oz" <?php if($Store_products_size12oz == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		12oz
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="size16oz" placeholder="16oz" <?php if($Store_products_size16oz == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		16oz
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="size1gallon" placeholder="1gallon" <?php if($Store_products_size1gallon == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		1 gallon
										  	  </label>
										      <hr>

										      <p>Colors</p>
										      <label>
										      		<input class="" type="checkbox" name="colorBlack" placeholder="Black" <?php if($Store_products_colorBlack == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Black
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorBlue" placeholder="Blue" <?php if($Store_products_colorBlue == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Blue
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorBrown" placeholder="Brown" <?php if($Store_products_colorBrown == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Brown
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorGreen" placeholder="Green" <?php if($Store_products_colorGreen == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Green
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorRed" placeholder="Red" <?php if($Store_products_colorRed == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Red
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorYellow" placeholder="Yellow" <?php if($Store_products_colorYellow == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Yellow
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorPurple" placeholder="Purple" <?php if($Store_products_colorPurple == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Purple
										  	  </label>
										  	  <br>
										  	  <label>
										      		<input class="" type="checkbox" name="colorAlienGreen" placeholder="Aliengreen" <?php if($Store_products_colorAlienGreen == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Alien Green
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorBloodRed" placeholder="Bloodred" <?php if($Store_products_colorBloodRed == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Blood Red
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="colorZombieBlack" placeholder="Zombieblack" <?php if($Store_products_colorZombieBlack == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Zombie Black
										  	  </label>
										      <hr>

										      <p>Scents</p>
										      <label>
										      		<input class="" type="checkbox" name="scentBloodyHell" placeholder="scentBloodyHell" <?php if($Store_products_scentBloodyHell == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Bloody Hell
										  	  </label>
										  	  <label>
										      		<input class="" type="checkbox" name="scentCottonCandy" placeholder="scentCottonCandy" <?php if($Store_products_scentCottonCandy == 'true'){ echo 'checked'; } else { echo '';}?>>
										      		Cotton Candy
										  	  </label>
										      <hr>
										      <p>Item Cost</p>
										      <input class="input" type="number" name="itemCostIn" placeholder="$<?php echo $Store_products_itemCost; ?>" value="<?php echo $Store_products_itemCost; ?>" required>
										  </div>
										      
										    </section>
										    <footer class="modal-card-foot">
										      <button class="button is-success" name="updateBtn" value="<?php echo $Store_products_itemID; ?>" >Update</button>
										      </form>
										      <button class="button cancelBtn<?php echo $Store_products_itemID; ?>">Cancel</button>

										        <form method="post" style="margin-left: 1em;">
											      <label> 
											      		<input class="" type="checkbox" name="itemRemove" placeholder="itemRemove" style="display: inline-block;" required>
											      		Agree
											      		
											      		<button class="button is-danger" name="removeBtn" value="<?php echo $Store_products_itemID; ?>" style="display: inline-block; margin-top: 0em;">X</button>
											  	  </label>
										  		</form>
										    </footer>
											
										  </div>
										</div>

										<!-- Card modal -->
										<div class="modal item2<?php echo $Store_products_itemID; ?>" id="imageView">
										  <div class="modal-background"></div>
										  <div class="modal-card" id="maxsize">
										    <header class="modal-card-head">
										      <p class="modal-card-title">Images</p>
										      <button class="delete cancelBtn2<?php echo $Store_products_itemID; ?>" aria-label="close"></button>
										    </header>
										    <section class="modal-card-body">
										      <!-- Content ... -->
										      <p class="subtitle"></p>
										    <form method="post">
										    	<div class="columns is-multiline">
										      	<?php
										    		$Store_products2 = "SELECT * FROM productImages WHERE productID = '$proID' ORDER BY ID DESC LIMIT 6";
													$Store_products_results2 = $conn->query($Store_products2);


													if ($Store_products_results2->num_rows > 0) {
														    // output data of each row
														while($Store_products_row2 = $Store_products_results2->fetch_assoc()) {

															$Store_products_ID2 = $Store_products_row2['ID'];
															// $Store_products_productID2 = $Store_products_row2['productID'];
															$Store_products_image2 = $Store_products_row2['image'];
										    	?>
										    	
										    		<div class="column">
										    			
													    <figure class="image is-1by1" style="width: 258px !important; height: 258px !important; margin: 0px !important; border: 1px solid black; padding: 0em;">
													     	
															  	<img src="<?php echo 'uploads/showcase/'; echo $Store_products_image2; ?>" style="">
															<button name="removeImage" value="<?php echo $Store_products_ID2; ?>" class="button is-danger" style="position: relative; top: 0px; left: 0px; float: right; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-top-left-radius: 0px;">X</button>
														</figure>
														

													</div>
												
												
												<?php }}?>
												</div>

										    </section>
										    <footer class="modal-card-foot">
										  	</form>
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


												$('#viewImage<?php echo $Store_products_itemID; ?>').click(function(){

													$('.item2<?php echo $Store_products_itemID; ?>').addClass('is-active');
												});

												$('.cancelBtn2<?php echo $Store_products_itemID; ?>').click(function(){

													$('.item2<?php echo $Store_products_itemID; ?>').removeClass('is-active');
												});

											});
								   		</script>
			<?php


				}}
			?>




			<!-- Card modal -->
			<div class="modal" id="itemAdd">
			  <div class="modal-background"></div>
			  <div class="modal-card" id="maxsize">
			    <header class="modal-card-head">
			      <p class="modal-card-title">Add New Item</p>
			      <button class="delete cancelBtn" aria-label="close"></button>
			    </header>
			    <section class="modal-card-body">
			      <!-- Content ... -->
			    <form method="post">

			      <p>Item Name</p>
			      <input class="input" type="text" name="itemNameIn" placeholder="Item Name" required>
			      <hr>

			      <p>Item Description</p>
			      <textarea class="textarea" name="itemDescIn"></textarea>			      
			      <hr>

			      <p>Sizes</p>
			      <label>
			      		<input class="" type="checkbox" name="size2oz" placeholder="2oz">
			      		2oz
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="size4oz" placeholder="4oz">
			      		4oz
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="size6oz" placeholder="6oz">
			      		6oz
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="size8oz" placeholder="8oz">
			      		8oz
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="size12oz" placeholder="12oz">
			      		12oz
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="size16oz" placeholder="16oz">
			      		16oz
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="size1gallon" placeholder="1gallon">
			      		1 gallon
			  	  </label>
			      <hr>

			      <p>Colors</p>
			      <label>
			      		<input class="" type="checkbox" name="colorBlack" placeholder="Black">
			      		Black
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorBlue" placeholder="Blue">
			      		Blue
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorBrown" placeholder="Brown">
			      		Brown
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorGreen" placeholder="Green">
			      		Green
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorRed" placeholder="Red">
			      		Red
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorYellow" placeholder="Yellow">
			      		Yellow
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorPurple" placeholder="Purple">
			      		Purple
			  	  </label>
			  	  <br>
			  	  <label>
			      		<input class="" type="checkbox" name="colorAlienGreen" placeholder="Aliengreen">
			      		Alien Green
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorBloodRed" placeholder="Bloodred">
			      		Blood Red
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="colorZombieBlack" placeholder="Zombieblack">
			      		Zombie Black
			  	  </label>
			      <hr>

			      <p>Scents</p>
			      <label>
			      		<input class="" type="checkbox" name="scentBloodyHell" placeholder="Black">
			      		Bloody Hell
			  	  </label>
			  	  <label>
			      		<input class="" type="checkbox" name="scentCottonCandy" placeholder="Blue">
			      		Cotton Candy
			  	  </label>
			      <hr>
			      <p>Item Cost</p>
			      <input class="input" type="number" name="itemCostIn" placeholder="$0.00" required>

			    </section>
			    <footer class="modal-card-foot">
			      <button class="button is-success" name="postBtn">Save changes</button>
			      <button class="button cancelBtn">Cancel</button>
			    </footer>
				</form>
			  </div>
			</div>

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