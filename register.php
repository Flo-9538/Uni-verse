<?php
session_start();
session_destroy();
session_start();

include 'bdd.php';

if(isset($_POST['ok'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    // récupération des champs du form 

    // recupération des emails et usernames existants sur la bdd
    $req = $bdd->query("SELECT * FROM users WHERE username = '$username'");
    $rep = $req->fetch();
    $req = $bdd->query("SELECT * FROM users WHERE email = '$email'");
    $rep1 = $req->fetch();
    $bool1 = 1;
    
    if(isset($rep['id'])){
        if (($rep['id'] != false)){
            // username deja utilisée
            $error_msg = "Nom d'utilisateur deja utilisé";
            $bool1 = 0;
        }
    }

    if(isset($rep1['id'])){
        if (($rep1['id'] != false)){
            // adresse mail deja utilisé
            $error_msg = "Email deja utilisé";
            $bool1 = 0;
        }
    }

    if($bool1){
        // tout est ok
        $requete = $bdd->prepare("INSERT INTO users VALUES(0, :username, :email, :password, 0, 0)");
        // requete sql pour la bdd
        $requete->execute(
            array(
                "username" => $username,
                "email" => $email,
                "password" => $password,
            )
        );
        
        $req = $bdd->query("SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
        $id_list = $req->fetch();
        $id = $id_list[0];

        $id_coded = sha1(strval($id));
        $req = $bdd->query("UPDATE users SET id_coded='$id_coded' WHERE id=$id");
        $req->fetch();

        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        // envoit du mail

        header("Location: attente.html");
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
    <title>Créer un compte</title>
</head>
<body>
    <a href="general.php"><img id="UnivTours"
        title="CAS"
        src="Logo_Uni-verse.png"/></a>

    <form action="" method="POST" id="center">
        <h1 id="connexion">Créer un compte</h1>

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
            <legend>Nom d'utilisateur</legend>
            <input type="text" id="username" name="username" class="champs" pattern="[\w_.-]{2,30}" title="2 caractères min, 20 max et signe dans _.-" required>
        </fieldset>

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
        <input type="submit" id="valider" value="S'inscrire" name="ok"><br>
        <div id="divinscrire">déja inscrit ? <a href="login.php" id="inscrire">Connexion</a></div>
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