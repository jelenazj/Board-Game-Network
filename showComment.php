<?php
session_start();
include('config/config.php');

if(empty($_SESSION['username'])) {
	header('Location: index.php');
}
if(!empty($_POST['postid'])){
$postid=$_POST['postid'];
    //Create connection
$conn = new mysqli(SERVER, USER, PASS, DB);
// Check connection
if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}
//end database connection settings
//INNER JOIN users ON comments.userid = users.userid 
    //INNER JOIN post ON comments.postid = posts.postid
$sql = "SELECT * FROM comments INNER JOIN users ON comments.userid = users.userid
WHERE postid=".$postid." ORDER BY comments.commentid DESC";

$result = $conn->query($sql);
$commentModalRows = [];
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $commentModalRows[] = $row;
    }
}
    else{
        //echo "Ne radi!";
    }
    echo json_encode($commentModalRows);
}
?>