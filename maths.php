<?php
session_start();

include 'bdd.php';

$get_messages = $bdd->query("SELECT `user`,`message`,`date` FROM `messages` WHERE `category`='maths' ORDER BY `id` DESC");
$page = "maths";

include 'main.php';
?>