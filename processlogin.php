<?php
	session_start();
	include("config/config.php");
	//definisemo varijable
	$username = !empty($_POST["username"]);
	$password = !empty($_POST["password"]);

	//provera da li su prazne
	if($username && $password) {
		$conn = mysqli_connect(SERVER, USER, PASS, DB);

		//promenimo enkodiranje na UTF-8
		mysqli_set_charset($conn, "utf-8");

		// ubacimo sigurni username unutar sql-a
		$sql = sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($conn, $_POST["username"]));
		/*$sql = sprintf("SELECT * FROM users WHERE username='%s', or email='%s'", - proveriti cemu sluzi
		mysqli_real_escape_string($conn, $_POST["username"]), 
		mysqli_real_escape_string($conn, $_POST["email"]));*/

		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if($row) {
			$hash = $row["password"];

		if(
			password_verify($_POST["password"], $hash))
		{
			$loginmessage = "Login successful.";

			$_SESSION["username"] = $row["username"];
			$_SESSION["userid"] = $row["userid"];
			$_SESSION["userimage"] = $row["userimage"];
			$_SESSION["firstname"] = $row["firstname"];
			$_SESSION["lastname"] = $row["lastname"];

			header("location:dashboard.php");
		} else {
			setcookie('loginfail', 'Invalid username/password!', time()+1);
			header("location:index.php");
			
			setcookie("message", "Wrong password ", time() + (86400), "/");
			header("location:index.php");
			
		}
		} else {
			setcookie("message", "Username does not exist", time() + (86400), "/");
			header("location:index.php");
		}
		mysqli_close($conn);
	}else{
		setcookie("message", "Please fill out all fields.", time() + (86400), "/");
			header("location:index.php");
		
		
	}
?>