<?php
$get_messages = $bdd->query("SELECT `user`,`message`,`date` FROM `messages` WHERE `category`='general' ORDER BY `id` DESC");
$page = 'general';

include 'main.php';
?>