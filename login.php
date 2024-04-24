<?php

$servername = "localhost";
$user = "root";
$pass = "root";

$bdd = new PDO("mysql:host=$servername;dbname=universe", $user); 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email != "" && $password != ""){
        $req = $bdd->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        $rep = $req->fetch();
        if($rep['id'] != false){
            // c'est ok
            header("Location: Page1.html");
        }
        else{
            $error_msg = "Email ou mdp incorrect !";
        }
    }
    if($error_msg){
        ?>
        <p><?php echo $error_msg;?></p>
        <?php
    }
}
?>
