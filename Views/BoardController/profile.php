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
    <form action="?page=upload" method="POST" ENCTYPE="multipart/form-data">
        <div class="row">
            <div class="col-sm-12"><h1>Your Profile</h1></div>
        </div>
        <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <?php if ($photo == "") {
                                echo "<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='avatar img-circle img-thumbnail' alt='avatar'>";
                            }
                            else {
                                echo "<img '<img src='Public/img/uploads/$photo' class='avatar img-circle img-thumbnail' alt='avatar'>";
                            }
                        ?>
                    <h4>Upload a different photo...</h4>
                    <input type="file" name="photo" class="text-center center-block file-upload" accept="image/png, image/jpg, image/jpeg">
                    <span class="fileError"><?php
                        if (isset($fileError)) {
                            print "$fileError";
                        } ?>
                    </span>
                    </div>
                    <br>
                    <h3>
                        <?php
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
                        ?>
                    </h3>
                </div>

                <div class="col-sm-8">
                    <center>
                        <!-- <p class="text-left"><strong><i class="fas fa-pencil-alt prefix"></i> Description: </strong><br> -->
                        <div class="form-group description">
                            <label for="exampleFormControlTextarea1"><i class="fas fa-pencil-alt"></i> Description: </label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">

                            <?php
                                if (isset($description)) {
                                    print $description;
                                }
                            ?>

                            </textarea>
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
    </form>
</div>





</body>
</html>
