<?php

session_start();
setcookie('logged_in', "", time() - 3600);
session_unset();
header('location: ./index.php');

?>