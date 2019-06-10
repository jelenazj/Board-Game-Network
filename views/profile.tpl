<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="profile.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
</head>

<body>
    <!-- ovde pocinje popup -->
    <div class="popup">
        <i id="x" class="fas fa-times"></i>
        <div class="cont">
            <div id="imageheader">
                <div class="poligon">
                    <img id="profilna" src="images/{$selectedUser}" alt="" />
                </div>
                <div class="dugmici2">
                    <div id="edit" class="username">
                        Kaktus Dzek
                    </div>
                    <p class="status">
                        {$aboutme}
                    </p>
                </div>
            </div>
            <form action="profile.php?username={$selectedUser}&id={$selectedUserID}" method="post" enctype="multipart/form-data">
                <hr>
                <div id="input2">
                    Profile name <input type="text" name="username"></div>
                <hr>
                <div id="input2"> Your status <input type="text" name="status"></div>
                <hr>
                <div id="input2"> Profile picture <input type="file" name="userimage" id="image" value="Browse..." id="blue_btn"></div>
            <div class="editbtn">
                <input type="submit" name="editprofile" value="Submit" id="submit"></div>

            </form>

        </div>
    </div>



    </div>

    <!-- ovde se zavrsava popup -->

    <div class="pozadina"></div>
    <div class="blur">
        <header>
            <div class="line"></div>
            <div class="navbar">
                <div id="logo">
                    <img src="images/izlet_logo.svg" alt="logo" height="70">
                </div>
            </div>
        </header>
        <div class="sidebar">
            <div class="main-buttons">

                <div id="profileBtn"><img src="images/placeholder.png" alt="profile-img" class="BtnImg"><a href="">{$currentUser}</a></div>

                <div id="dashboardBtn"><a href="dashboard.php">Dashboard</a></div>
                <div id="newPostBtn"><a href="#">Make a post</a></div>
            </div>
            <div class="logoutWrap"><a href="logout.php" id="logoutBtn">Logout</a></div>
        </div>
        <div class="wrapper">
            <section class="header">

                <div class="profil">
                    <div class="puffer">
                        <div class="poligon">
                            <img id="profilna" src="images/{$currentUser}.jpg" alt="" />
                        </div>
                        <p class="status">
                           {$aboutme}
                        </p>

                        <div class="dugmici">
                            <div class="username">
                                {$selectedUser}
                            </div>
                            {if $selectedUser === $currentUser}
                            <div class="editbutton">
                                Edit profile
                            </div>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="headerdesno"></div>
            </section>
            <main>
                <div class="viewToggles">
                    <div class="view1"></div>
                    <div class="view2"></div>
                </div>

                {section name=i loop=$postRows}
                <section class="post">
                    <div class="postlevo">
                        <div class="prazan_postlevo"></div>
                        <div class="slika">
                            <img class="slika" src="uploads/{$postRows[i].postimage}" alt="image">
                        </div>
                    </div>
                    <div class="postdesno ">
                        <span class="naslov">{$postRows[i].postheader}</span>
                        <div class="postBody">
                            <p>{$postRows[i].postbody}</p>
                        </div>
                        <div class="post_dugmici">
                            <button id="commentBtn">Comment</button>
                        </div>
                    </div>
                </section>

                {/section}

            </main>
        </div>
    </div>
    <script>
        let edit = document.getElementsByClassName("editbutton")[0];
        edit.addEventListener("click", popup);
        let blur = document.getElementsByClassName("blur")[0];
        let x = document.getElementById("x");
        let popup_div = document.getElementsByClassName("popup")[0];
        let pozadina = document.getElementsByClassName('pozadina')[0];
        pozadina.addEventListener('click', closepopup);
        x.addEventListener("click", closepopup);

        function popup() {
            blur.style.cssText = "filter: blur(5px);background-color: #0000004b; ";
            popup_div.style.cssText += "display: block; ";
            pozadina.style.cssText += "display: block; ";
            console.log(4);
        }

        function closepopup() {

            blur.style.cssText = "filter: blur();background-color: #00000000; ";
            popup_div.style.cssText += "display: none; ";
            pozadina.style.cssText += "display: none; ";
        }
    </script>
</body>

</html>