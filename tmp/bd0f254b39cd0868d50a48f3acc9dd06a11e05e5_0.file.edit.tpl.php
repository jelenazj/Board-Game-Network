<?php
/* Smarty version 3.1.33, created on 2019-04-08 21:04:36
  from '/storage/ssd4/869/9207869/public_html/board-games-network/views/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cabb764b035e8_55432346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd0f254b39cd0868d50a48f3acc9dd06a11e05e5' => 
    array (
      0 => '/storage/ssd4/869/9207869/public_html/board-games-network/views/edit.tpl',
      1 => 1554660564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cabb764b035e8_55432346 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
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
<input class="inputField" type="hidden" name="postid" value="<?php echo $_smarty_tpl->tpl_vars['postid']->value;?>
">
<input class="inputField" type="text" name="postbody" value="<?php echo $_smarty_tpl->tpl_vars['postbody']->value;?>
">
<input class="edit" type="submit" name="editPost">
</form>
</html><?php }
}
