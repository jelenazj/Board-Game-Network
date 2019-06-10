<?php
/* Smarty version 3.1.33, created on 2019-04-09 13:20:35
  from 'C:\xampp\htdocs\itbootcamp\bootstorm\board-games-network\views\editProfile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cac80033c1622_89719067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8accec318c021e3681c1b40440493e06e0daa82b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\itbootcamp\\bootstorm\\board-games-network\\views\\editProfile.tpl',
      1 => 1554808038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cac80033c1622_89719067 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Profile</title>

    <link rel="stylesheet" href="style/editProfile.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i&amp;subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

        .dropdown {

            position: relative;

            display: inline-block;

        }

        .dropdown-content {

            display: none;

            position: absolute;

            background-color: #f9f9f9;

            min-width: 160px;

            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

            padding: 12px 16px;

            z-index: 1;

            font-size: 18px;

        }

        .dropdown a {

            -webkit-transition: padding .05s linear;

            -moz-transition: padding .05s linear;

            -ms-transition: padding .05s linear;

            -o-transition: padding .05s linear;

            transition: padding .05s linear;

                    line-height: 30px;

            padding: 0 20px;

            height: 80px;

            color: #777;

            -webkit-transition: all .1s ease-out;

            -moz-transition: all .1s ease-out;

            -ms-transition: all .1s ease-out;

            -o-transition: all .1s ease-out;

            transition: all .1s ease-out;

        }

        .dropdown a:hover {

            color: orange;

        }

        .dropdown:hover .dropdown-content {

            display: block;

        }

    </style>

</head>

<body>

<!-- NAV HEADER -->

<header id="dashHeader">

    <nav id="dashNav">

        <div>

            <img id="dashLogo" src="images/logo.png" alt="logo">

        </div>

        <div class="dashHeadRight dropdown" onclick="document.getElementById('hide').style.display = 'block'">

            <span><img class="dashHeadProfImg dashlink" src="images/<?php echo $_smarty_tpl->tpl_vars['sessionuserimage']->value;?>
"></span>

            <div class="dropdown-content">

            <p><a class="dashLink" href="wall.php?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">Wall</a></p>

            <p><a class="dashLink" href="dashboard.php">Dashboard</a></p>

            <p><a class="dashLink" href="logout.php">LOGOUT</a></p>

            </div>

            <a class="dashLink"><?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
</a><br/>    

        </div>

    </nav>

</header>

<!-- end nav header -->

<main>

<div id="container">  

<div class="forma">  

    <h1>My Account Settings</h1>



<form action="editProfile.php?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
&userid=<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
" method="post" enctype="multipart/form-data">

    <h2> Personal info</h2><br>

        <img class="formImage" src="images/<?php echo $_smarty_tpl->tpl_vars['profileImg']->value;?>
"><br/><br/>

    <div class="item3">

        <input class="image" value="noImage" type="file" name="image" />

    </div><br>

    <label for="firstname"> Firstname :</label>

        <input type="text" placeholder="First name..." name="firstname" required><br><br>

    <label for="lastname"> Lastname :</label>

        <input type="text" placeholder="Last name..." name="lastname" required><br><br>

    <input onclick="location.reload('dashboard.php');" type="submit" class="button" name="editprofile" value="Update Profile">    

</form>

</div>

</div>

</main>

</body>

</html><?php }
}
