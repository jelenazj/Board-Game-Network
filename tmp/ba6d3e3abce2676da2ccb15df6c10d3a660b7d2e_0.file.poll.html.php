<?php
/* Smarty version 3.1.33, created on 2019-04-08 14:03:35
  from '/storage/ssd4/869/9207869/public_html/board-games-network/poll.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cab54b78b58c3_21829496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba6d3e3abce2676da2ccb15df6c10d3a660b7d2e' => 
    array (
      0 => '/storage/ssd4/869/9207869/public_html/board-games-network/poll.html',
      1 => 1554660525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cab54b78b58c3_21829496 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i&amp;subset=latin-ext" rel="stylesheet">
<?php echo '<script'; ?>
>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
<?php echo '</script'; ?>
>
    <style>
        *{
           font-family: 'Raleway', sans-serif;
        }
        input[type='radio']{
            float: right;
        }
        .poll{
            display: flex;
            flex-wrap: wrap;
            margin: 0;
        }
    .tabela{
       padding: 5px;
       
    }
    </style>
</head>
<body>

<div id="poll">
<h3>Which is your favorite Board Game?</h3>
<form class="tabela">
Scrabble:
    <input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>
Monopoly:
    <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
<br>    
Catan:
    <input type="radio" name="vote" value="2" onclick="getVote(this.value)">
<br>
Qwirkle:
    <input type="radio" name="vote" value="3" onclick="getVote(this.value)">
<br>
Risk:
    <input type="radio" name="vote" value="4" onclick="getVote(this.value)">
<br>
Axis and Allies:
    <input type="radio" name="vote" value="5" onclick="getVote(this.value)">
<br>
Clue (Cluedo):
    <input type="radio" name="vote" value="6" onclick="getVote(this.value)">
<br>
Battleship:
    <input type="radio" name="vote" value="7" onclick="getVote(this.value)">
<br>
Jenga:
    <input type="radio" name="vote" value="8" onclick="getVote(this.value)">
<br>
Trivial Pursuit:
    <input type="radio" name="vote" value="9" onclick="getVote(this.value)">
</form>
</div>

</body>
</html><?php }
}
