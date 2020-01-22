<!DOCTYPE html>

<html lang="en">
<head>

    <?php include("Views/Common/headings.php") ?>

    <title>Gameder - Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Public/css/home.css">
    <link rel="stylesheet" href="Public/css/navbar.css">
    <link rel="stylesheet" href="Public/css/profile.css">

</head>

<body>
    <style type="text/css">
        body {
            background-image: url('Public/img/background2.jpeg');
        }
    </style>

    <?php include("Views/Common/navbar.php") ?>

 <div class="container bootstrap snippet">
    <form action="?page=upload" method="POST" ENCTYPE="multipart/form-data">
        <div class="row">
            <div class="col-sm-12"><h1>Your Profile</h1></div>
        </div>
        <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <div class="user-pic">
                            <?php if ($photo == "") {
                                    echo "<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='avatar img-circle img-thumbnail' alt='avatar'>";
                                }
                                else {
                                    echo "<img '<img src='Public/img/uploads/$photo' class='avatar img-circle img-thumbnail' alt='avatar'>";
                                }
                            ?>
                        </div>
                    <h4>Upload a different photo...</h4>
                    <input type="file" name="photo" class="text-center center-block file-upload" accept="image/png, image/jpg, image/jpeg">
                    <span class="fileError"><?php
                        if (isset($fileError)) {
                            print "$fileError";
                        }
                    ?></span>
                    </div>
                    <h2><?php
                            if (isset($name)) {
                                print $name;
                            }
                            echo ", ";
                            if (isset($birthday)) {
                                $today = new DateTime(date("Y-m-d"));
                                $bday = new DateTime($birthday);
                                $interval = $today->diff($bday);
                                $interval = intval($interval->y);
                                print $interval;
                            }
                        ?></h2>
                </div>

                <div class="col-sm-8">
                    <center>
                        <!-- <p class="text-left"><strong><i class="fas fa-pencil-alt prefix"></i> Description: </strong><br> -->
                        <div class="form-group description">
                            <label for="exampleFormControlTextarea1"><i class="fas fa-pencil-alt"></i> Description: </label>
                            <textarea name="description" datatype="text" class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="200"><?php
                                if (isset($description)) {
                                    print $description;
                                }
                            ?></textarea>
                        </div>

                        <div class="input-group fav-game">
                              <label><i class="fas fa-puzzle-piece"></i> Favourite Game Type:</label>
                              <select class="form-control" name="gameType">
                                <option <?php if(isset($gameType) && $gameType == 'Cooperative') echo 'selected' ?> value="Cooperative" >Cooperative</option>
                                <option <?php if(isset($gameType) && $gameType == 'Roll and Move') echo 'selected' ?> value="Roll and Move" >Roll and Move</option>
                                <option <?php if(isset($gameType) && $gameType == 'Deck Building') echo 'selected' ?> value="Deck Building" >Deck Building</option>
                                <option <?php if(isset($gameType) && $gameType == 'Area Control') echo 'selected' ?> value="Area Control" >Area Control</option>
                                <option <?php if(isset($gameType) && $gameType == 'Puzzles') echo 'selected' ?> value="Puzzles" >Puzzles</option>
                                <option <?php if(isset($gameType) && $gameType == 'Party Games') echo 'selected' ?> value="Party Games" >Party Games</option>
                                <option <?php if(isset($gameType) && $gameType == 'Secret Identity') echo 'selected' ?> value="Secret Identity" >Secret Identity</option>
                              </select>
                        </div>
                    </center>
                    <button>SAVE</button>
                </div>

        </div>
    </form>
</div>





</body>
</html>
