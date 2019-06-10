<?php
	$registermessage = false;
	if(!empty($_POST["register"])) {
		$ok = true;
		if(empty($_POST["firstname"]) || strlen($_POST["firstname"])<3) {
			$ok = false;
		}
		if(empty($_POST["lastname"]) || strlen($_POST["lastname"])<3) {
			$ok = false;
		}
		if(empty($_POST["email"]) || strlen($_POST["email"])<3) {
			$ok = false;
		}
		if(empty($_POST["username"]) || strlen($_POST["username"])<3) {
			$ok = false;
		}
		if(empty($_POST["password"]) || strlen($_POST["password"])<3) {
			$ok = false;
		}
		if($ok == true) {
			$password = $_POST["password"];
			$username = $_POST["username"];
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$email = $_POST["email"];
		

		$hash = password_hash($password, PASSWORD_DEFAULT);

		//add database code here

		$conn = mysqli_connect(SERVER, USER, PASS, DB);

		//security measures
		$escapefirstname = mysqli_real_escape_string($conn, $firstname);
		$escapelastname = mysqli_real_escape_string($conn, $lastname);
		$escapeemail = mysqli_real_escape_string($conn, $email);
		$escapeusername = mysqli_real_escape_string($conn, $username);
		$escapehash = mysqli_real_escape_string($conn, $hash);


		$resultuser = $conn->query("SELECT * FROM users WHERE username='".$escapeusername."'");
		$resultemail = $conn->query("SELECT * FROM users WHERE email='".$escapeemail."'");
		
		if($resultuser->num_rows > 0) {
			echo "Username " .$username. " is not available";
		}else if($resultemail->num_rows > 0) {
			echo "Email " .$email. " is not available";
		}else{
		
		$sql = "INSERT INTO users (firstname, lastname, email, username, password, userimage) VALUES ('".$escapefirstname."',
				'".$escapelastname."',
				'".$escapeemail."',
				'".$escapeusername."',
				'".$escapehash."',
                ''
	)";

		$registeruser = mysqli_query($conn, $sql);
		if($registeruser) {
			$registermessage = "User " .$username. " added to db";
		} else {
			$registermessage = "Error description: ".mysqli_error($conn);
		}
		}
		};
		
		mysqli_close($conn);
		}
		
	
?>
