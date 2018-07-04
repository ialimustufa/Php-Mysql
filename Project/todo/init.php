<?php

session_start();

$_SESSION['user_id'] = 1;

$db = mysqli_connect('localhost','root','','to_do');
if(!isset($_SESSION['user_id'])){
    die('You are not signed in.');
}

?>