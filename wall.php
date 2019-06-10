<?php
/***************************/
/** initial settings for the smarty tpl engine*/
/***************************/
require_once("smarty/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';
//initial variable definition
$wrongpassword = "";
//end initial settings

/****************************/
/** database connection and session start */
/****************************/
@session_start();
include('config/config.php');

if(empty($_SESSION['username'])) {
	header('Location: index.php');
}
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$sessionusername = $_SESSION['username'];
$sessionuserimage = $_SESSION['userimage'];

//Create connection
$conn = new mysqli(SERVER, USER, PASS, DB);
// Check connection
if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}
//end database connection settings

/***********************************/
/** succesifull inserted post or not */
/***********************************/

$postbody = '';
$privacy = '';
$userid = '';
$postsuccessmessage = '';


	// UPLOAD IMAGE TO FOLDER
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
    $hashVa=hash_file("sha256",$file_tmp);
    $file_name=$hashVa.date("U").$file_ext;

	if(empty($errors)== true){
	$img_dir = $uploads_dir.$file_name;

	move_uploaded_file($file_tmp,$uploads_dir.$file_name);
	echo "Success";
	}else{
	print_r($errors);
	}
	};
	//end of upload image to folder


//INSERT POST INTO DB
if(!empty($_POST["submitpost"])) {
		$postbody = $_POST["postbody"];
		$privacy = $_POST["privacy"];
		$userid = $_SESSION["userid"];
		$targetImg = $_FILES["image"]["name"];
		$postinput = mysqli_real_escape_string($conn, $postbody);
		
        $targetImg=$hashVa.date("U").$file_ext;
    
	$sqlinsert = "INSERT INTO posts(postid, postbody, postdate, userid, image, privacy) VALUES (null, '".$postinput."', now(), '".$userid."','".$targetImg."', '".$privacy."')";
	$resultinsert = $conn->query($sqlinsert);
	if($resultinsert === true) {
		$postsuccessmessage = "Successfully posted";
	}else{
		$postsuccessmessage = "Connection error: ".$conn->error;
	}
};
// end of insert post code




//INSERT COMMENT INTO DB
if(!empty($_POST["submitComment"])){
  
	    $commentbody = $_POST["commentbody"];
	    $postid = $_POST["postid"];
	    $userid = $_SESSION["userid"];
	    $commentinput = mysqli_real_escape_string($conn, $commentbody);

	$sqlInsertComment = "INSERT INTO comments(commentid, commentbody, commentdate, userid, postid) VALUES (null, '".$commentinput."', now(), '".$userid."','".$postid."')";

	$resultInsertComment = $conn->query($sqlInsertComment);
	if($resultInsertComment === true) {
	  $postsuccessmessage= "Successfully posted";
	} else {
	  $postsuccessmessage= "Connection error: " . $conn->error;
	}
}
//end of insert comment code


//SELECT POSTS
$userid = $_SESSION["userid"];
$getusername = $_GET['username'];

$sql = "SELECT *
			   FROM posts INNER JOIN users 
			   on posts.userid=users.userid 
			   WHERE users.username = '".$getusername."'  
			   AND posts.privacy='public'
			   OR users.username='".$getusername."'
			   AND users.userid = '".$userid."'
			   ORDER BY posts.postid DESC";

$result = $conn->query($sql);
$postrows = [];
if($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		// save users and posts in this variable
		$postrows[] = $row;
	}
}else{
	$postsuccessmessage = "No data";
}
//end select posts


//SELECT COMMENTS
$sql = "SELECT *
			   FROM comments INNER JOIN posts 
			   ON comments.postid=posts.postid 
			   INNER JOIN users 
			   ON comments.userid=users.userid			  
			   ORDER BY comments.commentid DESC";


$result = $conn->query($sql);
$commentrows = [];
if($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		// save comments and posts and users in this variable
		$commentrows[] = $row;
	}
}else{
	$postsuccessmessage = "No data";
}
//end select comments



//SELECT USERS
$sqlUsers = "SELECT * FROM users";
	
$result = $conn->query($sqlUsers);
$usersrows = [];
if($result->num_rows > 0) {
    
	while($row = $result->fetch_assoc()) {
        
		$usersrows[] = $row;
	}
}else{
	$postsuccessmessage = "No data";
}
$conn->close();
//end select users



//end of defining variables
//now we need to send them to template


/********************************************/
/** send those variables to our template dashboard.tpl */
/********************************************/
$smarty->assign(
	'sessionusername',
	$sessionusername
);
$smarty->assign(
	'getusername',
	$getusername
);
$smarty->assign(
	'postsuccessmessage',
	$postsuccessmessage
);
$smarty->assign(
	'postrows',
	$postrows
);
$smarty->assign(
	'commentrows',
	$commentrows
);
$smarty->assign(
	'lastname',
	$lastname
);
$smarty->assign(
	'firstname',
	$firstname
);
$smarty->assign(
	'userid',
	$userid	
);
$smarty->assign(
    'sessionuserimage',
    $sessionuserimage
);
$smarty->assign(
    'usersrows',
     $usersrows    
);

$smarty->display('wall.tpl');
/* end send request */
?>
