<?php
session_start();

include 'bdd.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    // récupération des champs du form 

    if($email != "" && $password != ""){
        $req = $bdd->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND active = 1");
        // requete sql pour la bdd
        $rep = $req->fetch();
        if ($rep){
            if($rep['id'] != false){
                // c'est ok
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['id'] = $rep['id'];
                $_SESSION['username'] = $rep['username'];
                $_SESSION['connecte'] = 1;

                header("Location: general.php");
            }
            else{
                $error_msg = "Email ou mot de passe incorrect !";
            }
        }
        $error_msg = "Email ou mot de passe incorrect !";
    }
}
?>


<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Connexion</title>
</head>
<body>
    
    <a href="general.php"><img id="UnivTours"
        title="CAS"
        src="Logo_Uni-verse.png"/></a>

    <form action="" method="POST" id="center">
        <h1 id="connexion">Connexion</h1>
        <hr>
        <h2>Entrez votre adresse email et votre mot de passe</h2>
        
        <?php
        if(isset($error_msg)){
            if($error_msg){
                ?>
                <p id="error"><?php echo $error_msg;?></p>
                <?php
            }
        }
        ?>

        <fieldset>
            <legend>Email étudiant :</legend>
            <input type="text" id="email" name="email" class="champs" placeholder="sarah.croche" pattern="[\w_-]{0,}[.]{1}[\w_-]{0,}" title="'prénom.nom'" required>
            @etu.univ-tours.fr<br>
        </fieldset>
        <div id="passDiv">
            <div id="gauche">
                <fieldset id="passwordField">
                    <legend>Mot de passe :</legend>
                    <input type="password" name="password" id="password" pattern="[\w_.!,?*@;:-]{8,30}" title="8 caractères min, 30 max et charactère spécial dans _.!,?@*;:-" required>
                </fieldset>
            </div>

            <div id="droite">
                <button style="font-size:24px" type="button" id="showPass"><i class="fa fa-eye" id="icon" style="font-size:36px"></i></button>
            </div>
        </div>

        <input type="submit" id="valider" value="Se connecter"><br>
        <div id="divinscrire">Pas encore inscrit ? <a href="register.php" id="inscrire">Créer un compte</a></div>
    </form>

  

    <script>
        const togglePassword = document.getElementById("showPass");
        const password = document.getElementById("password");
        const icon = document.getElementById("icon");
        
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            icon.classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>