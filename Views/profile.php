<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameder - Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Public/css/home.css">
    <link rel="stylesheet" href="Public/css/navbar.css">
    <link rel="stylesheet" href="Public/css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7a5a5490a9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <style type="text/css">
        body {
            background-image: url('Public/img/background2.jpeg');
        }
    </style>

<?php
    require 'Views/Common/navbar.php'
 ?>

 <div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-12"><h1>Your Profile</h1></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
            <h4>Upload a different photo...</h6>
            <input type="file" class="text-center center-block file-upload">
            </div>
            <br>
            <h3>Mateusz, 22</h3>
        </div>

        <div class="col-sm-8">
            <center>
                <!-- <p class="text-left"><strong><i class="fas fa-pencil-alt prefix"></i> Description: </strong><br> -->
                <div class="form-group description">
                    <label for="exampleFormControlTextarea1"><i class="fas fa-pencil-alt"></i> Description: </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="input-group fav-game">
                      <label><i class="fas fa-puzzle-piece"></i> Favourite Game Type:</label>
                      <select class="form-control" name="fav-type">
                        <option value="Cooperative" >Cooperative</option>
                        <option value="Roll and Move" >Roll and Move</option>
                        <option value="Deck Building" >Deck Building</option>
                        <option value="Area Control" >Area Control</option>
                        <option value="Puzzles" >Puzzles</option>
                        <option value="Party Games" >Party Games</option>
                        <option value="Secret Identity" >Secret Identity</option>
                      </select>
                </div>
            </center>
            <button>SAVE</button>
        </div>
    </div>
</div>





</body>
</html>












<!--

<!DOCTYPE html>

<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../Public/Css/style.css">
    <link rel="stylesheet" href="../Public/Css/profile.css">
    <script src="https://kit.fontawesome.com/953716a7e0.js" crossorigin="anonymous"></script>
    <script>
    function showNavBar() {
        var x = document.getElementById("navBar");
        if (x.className === "navBar") {
            x.className += "Show";
        }
        else {
            x.className = "navBar";
        }
    }
</script>
</head>

<body>
<header>
    <img src="../Public/Images/ball.svg" alt="No photo">
    <span class="mixBall">MixBall</span>
    <button class="menuTrigger" onclick="showNavBar()"><i class="fas fa-bars"></i></button>
    <nav id="navBar" class="navBar">
        <ul>
            <li><a href="home.php">Strona główna</a></li>
            <li><a href="">Mecze</a></li>
            <li><a href="">Sędziowie</a></li>
            <li><a href="">Twoje mecze</a></li>
            <li class="gallery"><a href="">Galeria</a></li>
            <li class="about"><a href="">O aplikacji</a></li>
            <li class="profileIcon"><a href="?page=profile"><img class="icon" src="../Public/Images/profile.svg" alt="No photo"></a></li>
            <li class="logOut"><a href="?page=logout">Wyloguj</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <form action="?page=profile" method="POST">
        <div class="profilePhoto">
            <i class="fas fa-portrait"></i>
            <input type="file" name="avatar"  class="choosePic" accept="image/png, image/jpg">
        </div>
        <div class="infoContainer">
            <div class="leftSide">

                <span>Imię</span>
                <input type="text" name="name" value="<?php
                    if (isset($name)) {
                        print $name;
                    } ?>">
                <span>Nazwisko</span>
                <input type="text" name="surname" value="<?php
                    if (isset($surname)) {
                        print $surname;
                    } ?>">
                <span>Wiek</span>
                <input type="number" name="age" value="<?php
                    if (isset($age)) {
                        print $age;
                    } ?>">
            </div>
            <div class="rightSide">
                <span>Lepsza noga</span>
                <select name="leg">
                    <option <?php if(isset($leg) && $leg == 'Prawa') echo 'selected' ?> value="Prawa">Prawa</option>
                    <option <?php if(isset($leg) && $leg == 'Lewa') echo 'selected' ?> value="Lewa">Lewa</option>
                    <option <?php if(isset($leg) && $leg == 'Obunożny') echo 'selected' ?> value="Obunożny">Obunożny</option>
                </select>
                <span>Ulubiony klub</span>
                <input type="text" name="club" value="<?php
                    if (isset($club)) {
                        print $club;
                    } ?>">
                <span >Dodatkowy opis</span>
                <textarea name="description" datatype="text" class="description" maxlength="400"><?php
                    if (isset($description)) {
                        print $description;
                    } ?>
                </textarea>
            </div>
        </div>
        <div class="saveButton">
            <button type="submit"><span>Zapisz</span></button>
        </div>
    </form>
</div>

<div class="footer">
    <a href="home.php">Strona główna</a>
    <a href="">Kontakt</a>
    <a href="">O aplikacji</a>
    <i class="fas fa-arrow-up" onclick="window.scrollTo({top: 0, behavior: 'smooth'})"></i>
</div>

</body>
