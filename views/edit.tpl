<html>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i&amp;subset=latin-ext" rel="stylesheet">
<style>
    *{
    font-family: 'Raleway', sans-serif;
    text-align: center;
    }
.edit {
	background:linear-gradient(to right, #ee801e, #e75b10);
	-moz-border-radius:42px;
	-webkit-border-radius:42px;
	border-radius:42px;
	color:#ffffff;
	font-size:17px;
	padding:10px 12px;
	text-decoration:none;
	border: none;	
}
.edit:hover {
	background:linear-gradient(to left, #ee801e 5%, #e75b10 100%);
}
.edit:active {
	position:relative;
	top:1px;
}  
.inputField {
	width: 70%;
	height: 50px;
	border-radius: 5px;
	border: 2px solid #f0f0f0;
	padding: 5px;
}
</style> 
<h2>Edit Comment</h2><br>

<form action="updatePostInDb.php" method="post">
<input class="inputField" type="hidden" name="postid" value="{$postid}">
<input class="inputField" type="text" name="postbody" value="{$postbody}">
<input class="edit" type="submit" name="editPost">
</form>
</html>