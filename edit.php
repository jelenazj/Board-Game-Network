<?php
//header('Location:dashboard.php');
/********************************************/
/* initial settings for the smarty tpl engine */
/********************************************/
require_once("smarty/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';
//initial variable definition
$wrongpassword = "";
//end initial settings

/***************************************/
/* database connection and session start */
/***************************************/
session_start();

include('config/config.php');

//	header('Location: index.php');
//}
// create connection
$conn = new mysqli(SERVER, USER, PASS, DB);

if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}
// end database connection settings



/*****************/
/* post edit */
/*****************/

//$status = $_GET['status']
$bodyedit = "";
$userid = $_SESSION['userid'];
$postid = $_GET['postid'];
$postbody = $_GET['postbody'];

//echo $postbody;

if(!empty($_POST['editPost'])){
	$postbody = $_POST['id'];

	$sql = "UPDATE  posts 
			SET     postbody = '$bodyedit'
			WHERE   userid = $userid
			AND     postid = $postid";

	$result = $conn->query($sql);

	if($result) {
		//header('Location: wall.php?username='.$_GET["username"]);
		}
}

 // kod za ubacivanje slika ( ubacuje sliku u folder)
    
  if(isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $tmp = explode('.',$_FILES['image']['name']);
    $file_ext = end($tmp);
    $extensions = array("jpeg","jpg","png","gif");
    $uploads_dir ='images/';
    
  if(in_array($file_ext,$extensions)=== false){
    $errors[]="Extension not allowed, please chose a JPEG, JPG, PNG or GIF file.";
  }
    
  if($file_size > 3145728){
    $errors[]='File size must be excately 3 MB';
  }
    
  if(empty($errors)== true){
    $img_dir = $uploads_dir.$file_name;
    
    move_uploaded_file($file_tmp,$uploads_dir.$file_name);
    echo "Success";
  }else{
    print_r($errors);
  }
  };
  
    //kraj uploada fajla 


$smarty->assign(
	'postid',
	$postid
);

$smarty->assign(
	'postbody',
	$postbody
);

$smarty->display('edit.tpl');
?>