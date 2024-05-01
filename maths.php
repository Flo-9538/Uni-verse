<?php
include 'bdd.php';

$category = 'maths';
$get_messages = $bdd->query("SELECT `user`,`message`,`date` FROM `messages` WHERE `category`='$category' ORDER BY `id` DESC");
$page = "maths";

include 'main.php';
?>