<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aweosome Convent!</title>
    <link rel="stylesheet" href="./styles.css">
  </head>
  <body>
      <div id="header">
          <div id="logo">
            <a href="./index.php">Aweosome Convent!</a>
          </div>
      </div>
      <div id="feed">
          <div id="register-stuff">
            <?php
              session_start();
              $msg = $_SESSION['register-msg'];
              echo("<div id='form-msg'>$msg</div>");
            ?>
            <div if="register-form">
                <form action="./register_php.php" method="post">
                    Name:                 <input class="form-inputs" name="name" type="text">
                    Surname:              <input class="form-inputs" name="surname" type="text">
                    Nick:                 <input class="form-inputs" name="nick" type="text">
                    Email:                <input class="form-inputs" name="email" type="text">
                    Phone Number:         <input class="form-inputs" name="phone" type="text">
                    Password:             <input class="form-inputs" name="passwd" type="password">
                    Repeat your password: <input class="form-inputs" name="passwd2" type="password">
                    <input id="form-button" value="Register" type="submit">
                </form>
            </div>
            <div id="register-text">
                Enter your credentials to register!
            </div>
          </div>
      </div>
      <div id="footer">
          Tomasz Hańderek 2022 &reg;
      </div>
  </body>
</html>