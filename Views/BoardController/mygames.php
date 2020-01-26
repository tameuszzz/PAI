<!DOCTYPE html>

<html lang="en">
<head>

    <?php include("Views/Common/headings.php") ?>

    <title>Gameder - Games</title>
    <link rel="stylesheet" href="Public/css/home.css">
    <link rel="stylesheet" href="Public/css/navbar.css">
    <link rel="stylesheet" href="Public/css/mygames.css">

    <script src="Public/js/mygames.js"></script>

</head>

<body>

<style type="text/css">
        body {
            background-image: url('Public/img/background2.jpeg');
        }
    </style>

<?php include("Views/Common/navbar.php") ?>

<div class="container text-center">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
        <div class="not-empty col-lg-10 col-md-10 col-sm-12">
            <h1>My Games</h1>
            <span class="message" <?php if(isset($color)) echo "style='color:$color'"?>><?php
                if(isset($messages)){
                    echo $messages;
                }
            ?></span>
            <span class="fileError"><?php
                if (isset($fileError)) {
                    print "$fileError";
                }
            ?></span>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
    </div>
    <div class="row empty-row"></div>
    <div id="selectDiv" class="row">
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
        <div class="not-empty usefull col-lg-4 col-md-4 col-sm-12">
            <h3>Add New Game:</h3>
            <div class="usefull-btn">
                <a id="addNewGame" class="usefull-link" href="#"><i class="fas fa-plus-circle"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
        <div class="not-empty usefull col-lg-4 col-md-4 col-sm-12">
            <h3>View Your Games:</h3>
            <div class="usefull-btn">
                <a id="viewGames" class="usefull-link" href="#" onclick="getMyGames()"><i class="fas fa-binoculars"></i></a>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
    </div>

    <div id="addDiv" class="row">
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
        <div class="not-empty col-lg-10 col-md-10 col-sm-12">
            <form action="?page=uploadGame" method="POST" ENCTYPE="multipart/form-data">

                <div class="add-div">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2>Adding New Game</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 to-right">
                            <label>Name:</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-5 to-left">
                            <input type="text" name="gameName" placeholder="Name">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 to-right">
                            <label>Type:</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-5 to-left">
                            <select name="gameType">
                                <option value="" selected hidden="">Choose Type</option>
                                <option value="1" >Cooperative</option>
                                <option value="2" >Roll and Move</option>
                                <option value="3" >Deck Building</option>
                                <option value="4" >Area Control</option>
                                <option value="5" >Puzzles</option>
                                <option value="6" >Party Games</option>
                                <option value="7" >Secret Identity</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>Number of Players:</label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 to-right">
                            <label>Min:</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 to-left">
                            <input type="text" name="minPlayers" placeholder="2">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 to-right">
                            <label>Max:</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 to-left">
                            <input type="text" name="maxPlayers" placeholder="4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label>Difficulty:</label>
                            <select name="difficulty">
                                <option value="" selected hidden="">Choose Diffiucty Lvl</option>
                                <option value="1" >Very Easy</option>
                                <option value="2" >Easy</option>
                                <option value="3" >Moderate</option>
                                <option value="3" >Hard</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-2 col-sm-0"></div>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <label>Upload photo of game</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 to-left">
                            <input type="file" name="photo" class="text-center center-block file-upload" accept="image/png, image/jpg, image/jpeg">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-0"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="exampleFormControlTextarea1"><i class="fas fa-pencil-alt"></i> Description: </label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-0"></div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <textarea name="description" datatype="text" class="form-control" id="exampleFormControlTextarea1" rows="2" maxlength="200"></textarea>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-0"></div>
                    </div>
                    <button>ADD</button>
                </div>
            </form>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
    </div>

    <div id="viewDiv" class="row">
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
        <div class="not-empty col-lg-10 col-md-10 col-sm-12">

            <table>
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Players</th>
                        <th>Description</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="games-list">
                </tbody>
            </table>

        </div>
        <div class="col-lg-1 col-md-1 col-sm-12"></div>
    </div>


</div>

<?php include("Views/Common/footer.php") ?>

</body>
</html>
