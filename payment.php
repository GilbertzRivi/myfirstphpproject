<?php

session_start();
require_once('./database.php');

$grp = $_POST['grp'];

if ($grp == ''){
    $_SESSION['payment-msg'] = 'Nothing was selected';
    header('location: ./panel.php');
    exit();
}

$email = $_SESSION['email'];
echo($email);
$query = "UPDATE people SET grp = '$grp' WHERE email = '$email'";
mysqli_query($db, $query);
$_SESSION['payment-msg'] = '';
header('location: ./panel.php');
exit();
?>