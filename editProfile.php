<?php
require_once("smarty/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';

session_start();

include('config/config.php');

if(empty($_SESSION['username'])) {
	header('Location: index.php');
}
//Create connection
$conn = new mysqli(SERVER, USER, PASS, DB);
// Check connection
if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}
    
    $userid = $_SESSION["userid"];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $profileImg = $_SESSION['userimage'];
    $sessionuserimage = $_SESSION['userimage'];
    $username = $_SESSION['username'];
    $editimgstring = '';
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

      $hashVa=hash_file("sha256",$file_tmp);//file hashing
      $fileName=$hashVa.date("U").".".$file_ext;//adding the number of seconds that passed counting from 01.01.1970.


      move_uploaded_file($file_tmp,$uploads_dir.$fileName);
      echo "Success";
      $profileImg = $_FILES['image']['name'];
        
      $editimgstring = "userimage = '".$fileName."', ";
      
    }else{
      print_r($errors);
    }
  };
  
    //kraj uploada fajla
        
if(!empty($_POST["editprofile"])) {
   
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    
if(empty($firstname)){
    $firstname = ($_SESSION['firstname']);
}
if(empty($lastname)){
    $lastname = ($_SESSION['lastname']);
}
   $profileImg = '';
   if(!empty($_FILES["image"]["name"])){
   $profileImg = $file_name;
   }

$sqlInsert = "UPDATE users SET 
".$editimgstring."
firstname='".$firstname."',
lastname='".$lastname."'
WHERE userid =".$userid.";";

    $resultInsert = $conn->query($sqlInsert);
    
    if($resultInsert === true) {
        $postSuccessMessage = "Vas status je uspesno promenjen.";
    } else {
        $postSuccessMessage = "Imate gresku u konekciji " . $conn->error;
    }

};
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['userimage'] = $profileImg;

$smarty->assign(
  'username',
  $username
);

$smarty->assign(
  'firstname',
  $firstname
);

$smarty->assign(
  'lastname',
  $lastname
);

$smarty->assign(
  'userid',
  $userid
);

$smarty->assign(
  'profileImg',
  $profileImg
);

$smarty->assign(
  'sessionuserimage',
  $sessionuserimage
);

$smarty->display('editProfile.tpl');

?>