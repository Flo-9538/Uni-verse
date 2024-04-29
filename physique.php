<?php
session_start();

include 'bdd.php';

$get_messages = $bdd->query("SELECT `user`,`message` FROM `messages` ORDER BY `id` DESC");
$page = "physique";

include 'main.php';
?>