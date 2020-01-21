<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameder - Registration</title>
    <link rel="stylesheet" type="text/css" href="Public/css/login.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7a5a5490a9.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

  <style type="text/css">
    body {
      background-image: url('Public/img/background.jpeg');
    }
  </style>

    <div class="container-fluid text-center logo">
        <i class="fas fa-dice"></i>
        <span class="logoName">
            gameder
        </span>
    </div>

    <h1 id="Signup">Sign up</h1>
    <div id="messages" <?php if(isset($color)) echo "style='color:$color'"?>>
        <?php
            if (isset($messages)) {
                echo $messages;
            }
        ?>
    </div>

    <div class="container text-center">
          <form action="?page=registration" method="POST">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                      <input type="text" name="name" class="form-control"placeholder="Name">
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-envelope"></i></div>
                      </div>
                      <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                      </div>
                      <input type="password" name="repeatPassword" class="form-control" placeholder="Re Enter Password">
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-venus-mars"></i></div>
                      </div>
                      <select class="form-control" name="gender">
                        <option value="" selected hidden="">Gender</option>
                        <option value="Male" >Male</option>
                        <option value="Female" >Female</option>
                        <option value="Other" >Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-birthday-cake"></i></div>
                      </div>
                      <input type='text' name="birthday" class="form-control" id='datepicker'>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-puzzle-piece"></i></div>
                      </div>
                      <select class="form-control" name="fav-type" placeholder="Re Enter Password">
                        <option value="" selected hidden="">Favourite Game Type</option>
                        <option value="Cooperative" >Cooperative</option>
                        <option value="Roll and Move" >Roll and Move</option>
                        <option value="Deck Building" >Deck Building</option>
                        <option value="Area Control" >Area Control</option>
                        <option value="Puzzles" >Puzzles</option>
                        <option value="Party Games" >Party Games</option>
                        <option value="Secret Identity" >Secret Identity</option>
                      </select>
                    </div>
                  </div>
                <button type="submit" name="signup-submit" class="btn btn-primary signup">SIGN UP</button>
              </div>
            </div>
            </form>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            orientation: "button",
            }).datepicker('update', new Date());
        });
    </script>
</body>
</html>
