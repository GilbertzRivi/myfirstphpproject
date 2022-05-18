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
      <?php
      session_start();
      if (!isset($_SESSION['email'])){
        header('location: ./index.php');
        exit();
      }
      ?>
      <div id="header">
          <div id="logo">
            <a href="./index.php">Aweosome Convent!</a>
          </div>
          <div id="panel-logout">
            <div id="panel-button">
                <a href="./panel.php">user panel</a>
            </div>
            <div id="logout-button">
                <a href="./logout.php">logout</a>
            </div>
          </div>
      </div>
      <div id="feed">
        
        <div id="info">
            <?php
            require_once('./database.php');
            $email = $_SESSION['email'];
            $query = "SELECT * FROM people WHERE email='$email'";
            $result = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($result);
            
            $grp = $user['grp'];

            if (is_null($user['id_room'])){
                $room = 'Not selected';
            }
            else {
                $person_id_query = "SELECT id FROM people WHERE email = '$email'";
                $person_id_result = mysqli_query($db, $person_id_query);
                $person = mysqli_fetch_assoc($person_id_result);
                $id = $person['id'];
                $query = "SELECT * FROM rooms WHERE id_person1 = '$id' OR id_person2 = '$id'";
                $result = mysqli_query($db, $query);
                $room = mysqli_fetch_assoc($result);
                $room_number = $room['room_number'];
                $room = $room_number;
            }

            echo("<div id='grp'>Your group:<br><p>$grp</p></div>");
            echo("<div id='room'>Your room:<br><p>$room</p></div>");

            ?>
        </div>

        <div id="payment">
            <div if="payment-form">
                <?php
                $msg = $_SESSION['payment-msg'];
                echo("<div id='form-msg'>$msg</div>");
                ?>
                <form action="./payment.php" method="post">
                    Member - 200$ <input class="form-inputs" name="grp" type="radio" value='member'>
                    Sponsor - 500$ <input class="form-inputs" name="grp" type="radio" value='sponsor'>
                    Helper - 200$ <input class="form-inputs" name="grp" type="radio" value='helper'>
                    <input id="form-button" value="Pay" type="submit">
                </form>
            </div>
        </div>
        
        <div class='break'></div>

        <?php
        $msg = $_SESSION['room-msg'];
        echo($msg)
        ?>

        <div id='rooms'>
            <?php

            require_once('./database.php');
            $query = "SELECT * FROM rooms";
            $result = mysqli_query($db, $query);

            while($room = mysqli_fetch_assoc($result)){
                $color = 'green';
                $number = $room['room_number'];
                if (!is_null($room['id_person1'])){
                    $color = 'yellow';
                }
                if (!is_null($room['id_person2'])){
                    $color = 'red';
                }
                echo("<div class='room' style='background-color: $color'><a href='./room.php?number=$number'>$number</a></div>");
            }

            ?>
        </div>

      </div>
      <div id="footer">
          Tomasz Hańderek 2022 &reg;
      </div>
  </body>
</html>