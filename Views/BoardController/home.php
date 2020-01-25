<!DOCTYPE html>

<html lang="en">
<head>

    <?php include("Views/Common/headings.php") ?>

    <title>Gameder - Home</title>
    <link rel="stylesheet" href="Public/css/home.css">
    <link rel="stylesheet" href="Public/css/navbar.css">
    <link rel="stylesheet" href="Public/css/search.css">

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
            <div class="not-empty col-lg-12 col-md-12 col-sm-12">
                <h1>Search for games</h1>
            </div>
        </div>
        <div class="row empty-row"></div>
        <div class="not-empty col-lg-12 col-md-12 col-sm-12">
            <form action="?page=searchGames" method="POST">
                <label>Type:</label>
                <select name="gameType">
                    <option value="" selected hidden="">Any...</option>
                    <option value="1" >Cooperative</option>
                    <option value="2" >Roll and Move</option>
                    <option value="3" >Deck Building</option>
                    <option value="4" >Area Control</option>
                    <option value="5" >Puzzles</option>
                    <option value="6" >Party Games</option>
                    <option value="7" >Secret Identity</option>
                </select>
                <br>
                <label>Number of Players:</label>
                <input type="text" name="Players" placeholder="2">
                <br>
                <label>Difficulty:</label>
                <select name="difficulty">
                    <option value="" selected hidden="">Any...</option>
                    <option value="1" >Very Easy</option>
                    <option value="2" >Easy</option>
                    <option value="3" >Moderate</option>
                    <option value="3" >Hard</option>
                </select>
                <br>
                <label>Location:</label>
                <select name="id_town">
                    <option value="" selected hidden="">Any</option>
                    <option value="1" >Cracow</option>
                    <option value="2" >Warsow</option>
                </select>
                <br>
                <button>Search</button>
            </form>
        </div>
    </div>

    <?php include("Views/Common/footer.php") ?>

</body>
</html>
