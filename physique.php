<?php
include 'bdd.php';

$get_messages = $bdd->query("SELECT `user`,`message`,`date` FROM `messages` WHERE `category`='physique' ORDER BY `id` DESC");
$page = "physique";

include 'main.php';
?>