<?php

session_start();

if($_GET['number'] == ''){
    header("Location: ./panel.php");
    exit();
}

require_once('./database.php');

$room_number = $_GET['number'];
$email = $_SESSION['email'];

$person_id_query = "SELECT id FROM people WHERE email = '$email'";
$person_id_result = mysqli_query($db, $person_id_query);
$person = mysqli_fetch_assoc($person_id_result);
$id = $person['id'];


$query_check = "SELECT * FROM rooms WHERE id_person1 = '$id' OR id_person2 = '$id'";
$result_check = mysqli_query($db, $query_check);
if (mysqli_num_rows($result_check) == 1){
    $_SESSION['room-msg'] = 'You have already choosen a room!';
    header('location: ./panel.php');
    exit();
}

$query = "SELECT * FROM rooms WHERE room_number = '$room_number'";
$result = mysqli_query($db, $query);
$room = mysqli_fetch_assoc($result);
if (!is_null($room['id_person1'])){
    if (!is_null($room['id_person2'])){
        $_SESSION['room-msg'] = 'This room is fully occupied';
        header('location: ./panel.php');
        exit();
    }
    else{
        $query = "UPDATE rooms SET id_person2 = '$id' WHERE room_number = '$room_number'";
    }
}
else{
    $query = "UPDATE rooms SET id_person1 = '$id' WHERE room_number = '$room_number'";
}

mysqli_query($db, $query);

$query = "SELECT * FROM rooms WHERE id_person1 = '$id' OR id_person2 = '$id'";
$result = mysqli_query($db, $query);
$room = mysqli_fetch_assoc($result);
$id_room = $room['id'];

$query = "UPDATE people SET id_room = '$id_room' WHERE id='$id'";
mysqli_query($db, $query);

$_SESSION['room-msg'] = 'Successfully updated your room info';
header('location: ./panel.php');
exit();
?>