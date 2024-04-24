<?php
$servername = "localhost";
$user = "root";
$pass = "root";

$bdd = new PDO("mysql:host=$servername;dbname=universe", $user); 
// création de l'instance bdd (connexion à la bdd)

if(isset($_POST['ok'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // récupération des champs du form 

    $requete = $bdd->prepare("INSERT INTO users VALUES(0, :username, :email, :password)");
    // requete sql pour la bdd
    $requete->execute(
        array(
            "username" => $username,
            "email" => $email,
            "password" => $password,
        )
    );
    header("Location: Page1.html");
}
?>