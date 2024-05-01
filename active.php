<?php
session_start();

include 'bdd.php';

$id_coded = $_GET['key'];

$id = $_SESSION['id'];
$req = $bdd->query("UPDATE `users` SET `active`=1 WHERE `id_coded`='$id_coded'");
$req->fetch();

$_SESSION['connecte'] = 1;
?>

<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="profile.css">
    <title>Compte validé</title>
</head>
<body>
    <a href="general.php"><img id="UnivTours"
        src="Logo_Uni-verse.png"
        width="200px"/></a>

    <h2>
        Votre compte a bien été activé !
    </h2>
        
</body>
</html>