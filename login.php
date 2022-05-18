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
          <div id="login-stuff">
            <?php
              session_start();
              $msg = $_SESSION['login-msg'];
              echo("<div id='form-msg'>$msg</div>");
            ?>
            <div if="login-form">
                <form action="./login_php.php" method="post">
                    Email:      <input class="form-inputs" name="email" type="text">
                    Password:   <input class="form-inputs" name="passwd" type="password">
                    <input id="form-button" value="Login" type="submit">
                </form>
            </div>
            <div id="login-text">
                Enter your credentials to log in!
            </div>
          </div>
      </div>
      <div id="footer">
          Tomasz Hańderek 2022 &reg;
      </div>
  </body>
</html>