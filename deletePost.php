<?php
/********************************************/
/* initial settings for the smarty tpl engine */
/********************************************/
/*require_once("smarty/libs/smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';
//initial variable definition
$wrongpassword = "";
//end initial settings
*/
/***************************************/
/* database connection and session start */
/***************************************/
session_start();
include('config/config.php');

//if (empty($_SESSION['username'])) {
	//header('Location: index.php');
//}

// create connection
$conn = new mysqli(SERVER, USER, PASS, DB);
// check connection
if ($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}
// end database connection settings


/*****************/
/* post deletion */
/*****************/
$userid = $_SESSION["userid"];
$postid = $_GET["postid"];
$postsuccessmessage = '';

$sqldelete = "DELETE FROM posts 
    WHERE posts.postid ='".$postid."' AND posts.userid ='".$userid."';"; 

var_dump($sqldelete);

$resultdelete = $conn->query($sqldelete);
	if ($resultdelete === true) {
		$postsuccessmessage = "Comment successfully deleted ";
		$postsuccessmessage = "Connection error: ".$conn->error;
		header('Location: wall.php?username='.$_GET["username"]);

	}
// end of delete post code

/*$smarty->assign(
	'postSuccessMessage',
	$postSuccessMessage
);
$smarty->display('dashboard.tpl');
*/
?>
