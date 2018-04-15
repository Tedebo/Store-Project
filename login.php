<?php

	session_start();


	if(isset($_SESSION['Store_con_user'])){

		if($_SESSION['Store_con_user'] == 'Store_con_user_true'){

			header('Location: hub.php');

		}

	}
	

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

	$Store_bool = false;

	if($_POST){

		$Store_users = "SELECT email, password FROM users";
		$Store_users_results = $conn->query($Store_users);

		if ($Store_users_results->num_rows > 0) {
		    // output data of each row
		    while($Store_users_row = $Store_users_results->fetch_assoc()) {
		        $Store_users_email = $Store_users_row['email'];
		        $Store_users_password = $Store_users_row['password'];
		        //echo $usernameGet;

		        if($_POST['emailin'] == $Store_users_email && $_POST['passwordin'] == $Store_users_password){

					$_SESSION['Store_con_user'] = 'Store_con_user_true';
					$_SESSION['Store_con_user_email'] = $_POST['emailin'];

					header('Location: hub.php');

				}else{

					$Store_bool = true;
				}
		    }
		}


	}

?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Store - Log in</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
		<link rel="stylesheet" href="CSS\index.css">
  	</head>
	<body> 
		<div class="section">


			<section class="hero is-dark is-fullheight">
			  <div class="hero-body">
			    <div class="container padded">
			      <h1 class="title">
			        	VILE PRODUCTIONS SFX
			      	</h1>
			      	<h2 class="subtitle">
			        	Extremely Unpleasant
			      	</h2>

			    <form method="post" style="margin: 0px 0.5em;">
			    	<span class="subtitle"><?php if($Store_bool == true){ echo "* Incorrect Login, please try again"; } else{ echo "Login"; }?></span>
			      	
			      	<div class="field">
						  <p class="control has-icons-left has-icons-right">
						    <input class="input" type="email" name="emailin" placeholder="Email" required>
						    <span class="icon is-small is-left">
						      <i class="fa fa-envelope"></i>
						    </span>
						    <span class="icon is-small is-right">
						      <i class="fa fa-check"></i>
						    </span>
						  </p>
					</div>
					<div class="field">
						  <p class="control has-icons-left">
						    <input class="input" type="password" name="passwordin" placeholder="Password" required>
						    <span class="icon is-small is-left">
						      <i class="fa fa-lock"></i>
						    </span>
						  </p>
					</div>


					<div class="" style="float: left;">
						<input class="button is-info" type="submit" value="Login">
					</div>

				</form>
					
			    </div>
			  </div>
			</section>

			<div class="tile is-ancestor">
				<div class="tile is-3">

				</div>
				<div class="tile is-6 is-vertical is-parent">
					
					

				</div>
				<div class="tile is-3">

				</div>

			</div>

	</body>
</html>