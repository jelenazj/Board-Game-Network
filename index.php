<?php include("config/config.php");?>
<?php include("processRegister.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>Board Games Network - Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i&amp;subset=latin-ext" rel="stylesheet">    

</head>
<body>
    <main>
<header id="dashHeader">
    <div id="dashHeaderInner">
        <div class="logoheader">
            <img id="logo" src="appimages/logo.png">
        </div>
        <div class="bookholder">
            <div class="book">
            <div class="back"></div>
            <form action="processlogin.php" method="post">
                <label for="username">
                <div class="front" id="logInButton">LOG IN
                    <div class="page6">
                    <input class="usern" type="text" name="username" placeholder="Enter username" autocomplete="off">
                    </div>
                </div>
                </label>
                <label for="password">
                <div class="page3">
                    <input type="password" id="password" name="password" placeholder="Enter password" class="passw">
                    <input type="submit" name="login" value="LogIn" class="b">
                </div>
                </label>
            </form>
            </div>
        </div>
    </div>
</header><!-- <div id="line"></div> -->
    
<!--1--><div></div>
<!--2--><div class="container"> <!-- Container sa glavnom slikom i propratnim preko -->
            <div class="hero"> <!-- Container sa elementima preko slike, absolute u odnosu na parent -->
                <div class="image">
                    <div id="welcomeText">
                        <h1>
                            Welcome to our network </h1><br>
                          <h2>A place for board game enthusiasts.</h2>  
                    </div><br>
                    <button id="signup" onclick="this.style.visibility='hidden';document.getElementById('welcomeText').style.visibility='hidden';document.getElementById('forma').style.display='block'">Sign Up</button>    
                    <div id="forma">
                    <span onclick="document.getElementById('forma').style.display='none'; document.getElementById('welcomeText').style.visibility='visible';document.getElementById('signup').style.visibility='visible'" class="close" title="Close Modal">&times;</span>
                    <h2 id="naslov">Sign up here</h2>
                    <form class="modal-content" action="index.php" method="POST">
                        <input class="input" type="text" name="firstname" placeholder="First Name..." required>
                        <input class="input" type="text" name="lastname" placeholder="Last Name..." required>
                        <input class="input" type="email" name="email" placeholder="Email..." required>
                        <input class="input" type="text" name="username" placeholder="Username..." required>
                        <input class="input" type="password" name="password" placeholder="Password..." required>
                        <input class="subm" type="submit" value="Sign Up" name="register">
                    </form>
                    </div>
                </div>
            </div>
        </div>
<!--3--><div class="about">
            <a href="aboutUs.php">About us</a>
        </div>

<?php    
if(!empty($_COOKIE["poruka"])) {
    echo $_COOKIE["poruka"];
    unset($_COOKIE["poruka"]);
    setcookie("poruka", "", time() + (-3600), "/");
} 
?>
<?php
if($registermessage){
echo 
<<<HTML
<div class="container">
<div class="successmessage" >
<span class="closebtn" style="background-color:green;">&times;</span>
<strong style="background-color:green;">Bravo!</strong> $registermessage
</div>
</div>
HTML;
}
?>

</main>
</body>
</html>