<?php

session_start();

if($_POST['email'] == '' || $_POST['passwd'] == ''){
    $_SESSION['login-msg'] = 'Some texboxes were empty!';
    header("Location: ./login.php");
    exit();
}

require_once('./database.php');

$email = mysqli_real_escape_string($db, $_POST['email']);
$passwd = mysqli_real_escape_string($db, $_POST['passwd']);

$passwd = md5($passwd);

$query = "SELECT * FROM people WHERE email='$email' AND passwd='$passwd'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
        $_SESSION['email'] = $email;
        setcookie('logged_in', 'True');
        header('location: ./index.php');
  	}else {
        $_SESSION['login-msg'] = "Wrong username/password combination";
        header("Location: ./login.php");
        exit();
  	}

?>