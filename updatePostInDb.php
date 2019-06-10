<?php
session_start();
include('config/config.php');

if(!empty($_POST['editPost'])) {
$postbody = $_POST['postbody'];
$postid = $_POST['postid'];	

//if (empty($_SESSION['username'])) {
	//header('Location: index.php');
//}

// create connection
$conn = new mysqli(SERVER, USER, PASS, DB);
// check connection
if ($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}

$sqlUpdate = "UPDATE posts
SET postbody = '".$postbody."'
WHERE postid =".$postid;

$result = $conn->query($sqlUpdate);

if($result) {
    echo "uspesno";
} else {
	echo "greska";
}
}
$conn->close();

?>