<?php

session_start();

if($_POST['name'] == '' || $_POST['surname'] == '' || $_POST['nick'] == '' || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['passwd'] == '' || $_POST['passwd2'] == ''){
    $_SESSION['register-msg'] = 'Some texboxes were empty!';
    header("Location: ./register.php");
    exit();
}

require_once('./database.php');

$name = mysqli_real_escape_string($db, $_POST['name']);
$surname = mysqli_real_escape_string($db, $_POST['surname']);
$nick = mysqli_real_escape_string($db, $_POST['nick']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$passwd = mysqli_real_escape_string($db, $_POST['passwd']);
$passwd2 = mysqli_real_escape_string($db, $_POST['passwd2']);

if ($passwd != $passwd2) {
  $_SESSION['register-msg'] = "The passwords do not match";
  header("Location: ./register.php");
  exit();
}   
   
$uppercase    = preg_match('@[A-Z]@', $passwd);
$lowercase    = preg_match('@[a-z]@', $passwd);
$number       = preg_match('@[0-9]@', $passwd);

if(!$uppercase || !$lowercase || !$number || strlen($passwd) < 8) {
    $_SESSION['register-msg'] = 'Password should be at least 8 characters in length and should include at least one upper case letter and one number.';
    header('location: ./register.php');
    exit();
}

$user_check_query = "SELECT * FROM people WHERE nick='$nick' OR email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {
  if ($user['nick'] === $nick) {
    $_SESSION['register-msg'] = "User with given nick already exist!";
    header("Location: ./register.php");
    exit();
  }

  if ($user['email'] === $email) {
    $_SESSION['register-msg'] = "User with given email already exist!";
    header("Location: ./register.php");
    exit();
  }
}

$passwd = md5($passwd);

$query = "INSERT INTO people (name, surname, nick, email, phone, grp, id_room, id, payment, passwd) 
            VALUES('$name', '$surname', '$nick', '$email', '$phone', 'member', NULL, NULL, 0, '$passwd')";

mysqli_query($db, $query);

$_SESSION['register-msg'] = 'You have successfully registered<br>You can <a href="./login.php">log in now</a>';
header('location: ./register.php');
exit();

?>