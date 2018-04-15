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
					echo "Updated successfully";
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

	$proID = $_POST['prodID'];

if(isset($_FILES['fileToUpload'])){

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $imageName = basename( $_FILES["fileToUpload"]["name"]);

	 //    $Store_product_update = "UPDATE products SET image = '$imageName' WHERE ID = '$proID'";

		// if ($conn->query($Store_product_update) === TRUE) {
		// 	echo "New record created successfully";
		// 	header('Location: hub.php');
		// } else {
			
		// }
	    //$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 20000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {

		// if(file_exists($target_file)){


		// }else{
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

		        $imageName = basename( $_FILES["fileToUpload"]["name"]);

		        $Store_product_update = "UPDATE products SET image = '$imageName' WHERE ID = '$proID'";

				if ($conn->query($Store_product_update) === TRUE) {
					echo "New Product Image created successfully";
					header('Location: hub.php');
				} else {
					//echo "Error: " . $SEDit_users_insert . "<br>" . $conn->error;
				}

		    } else {
		        echo "Sorry, there was an error uploading your file.";
		        header('Location: hub.php');
		    }
		// }
	}
}

if(isset($_FILES['showcaseImage'])){

	$target_dir2 = "uploads/showcase/";
	$target_file2 = $target_dir2 . basename($_FILES["showcaseImage"]["name"]);
	$uploadOk2 = 1;
	$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check2 = getimagesize($_FILES["showcaseImage"]["tmp_name"]);
	    if($check2 !== false) {
	        echo "File is an image - " . $check2["mime"] . ".";
	        $uploadOk2 = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk2 = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file2)) {
	    echo "Sorry, file already exists.";
	    $imageName2 = basename( $_FILES["showcaseImage"]["name"]);

	 //    $Store_product_update = "UPDATE products SET image = '$imageName' WHERE ID = '$proID'";

		// if ($conn->query($Store_product_update) === TRUE) {
		// 	echo "New record created successfully";
		// 	header('Location: hub.php');
		// } else {
			
		// }
	    //$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["showcaseImage"]["size"] > 20000000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk2 = 0;
	}
	// Allow certain file formats
	if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
	&& $imageFileType2 != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk2 = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk2 == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {

		// if(file_exists($target_file)){


		// }else{
		    if (move_uploaded_file($_FILES["showcaseImage"]["tmp_name"], $target_file2)) {
		        echo "The file ". basename( $_FILES["showcaseImage"]["name"]). " has been uploaded.";

		        $imageName2 = basename( $_FILES["showcaseImage"]["name"]);

		        $Store_product_update2 = "INSERT INTO productImages (productID, image) VALUES ('$proID', '$imageName2')";

				if ($conn->query($Store_product_update2) === TRUE) {
					echo "New Showcase Image created successfully";
					header('Location: hub.php');
				} else {
					//echo "Error: " . $SEDit_users_insert . "<br>" . $conn->error;
				}

		    } else {
		        echo "Sorry, there was an error uploading your file.";
		        header('Location: hub.php');
		    }
		// }
	}
}

	

}else{

	//header('Location: login.php');

}


?>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"">
	    <title>Project Hub</title>
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
			        	Vile Productions
			      	</h1>
			      	<h2 class="subtitle">
			        	Subtitle
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




		<footer class="footer" id="foot">
	  		<div class="container">
	    		<div class="content has-text-centered">
	      			<p>
	        			&#169;2018 <strong>Company Name</strong> 	
	      			</p>
	      			<p>
	      				Developed by Goonshark, Contact via Twitter @Goonshark_
	      			</p>
	    		</div>
	  		</div>
		</footer>

	</body>
</html>