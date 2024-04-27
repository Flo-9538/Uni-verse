<?php
session_start();

include 'bdd.php';

$get_messages = $bdd->query("SELECT `user`,`message` FROM `messages`");

if(isset($_POST['ok'])){
    $message = $_POST['message'];
    // récupération des champs du form 

    $requete = $bdd->prepare("INSERT INTO messages VALUES(0, :user, :message)");
    // requete sql pour la bdd
    $requete->execute(
        array(
            "user" => $_SESSION['username'],
            "message" => $message
        )
    );

    header("Location: Page1.php");
    
}
?>

<!DOCTYPE html>
<link href="Page1.css" rel="stylesheet" media="all" />
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uni'verse</title>
  </head>
  <body>
    <div class="container">
      <div class="parent">
        <div class="haut">
          <div class="logo">
            <img class="image_logo" src="Logo_Uni-verse.png" alt="Uni'Verse" />
          </div>
        </div>
        <div class="messages">
          <form method="POST" id="ecrire">
            <fieldset id="passwordField">
              <legend>Ecrire un nouveau message :</legend>
              <input type="text" name="message" id="ecrire_message" title="ecrivez votre message" required>
            </fieldset>
            <input type="submit" id="envoyer" name="ok">
          </form>
          <div id="message">
            
            <?php
            $i = 0;
            while ($messages = $get_messages->fetch()) {
              $list_message[$i] = $messages;
              $i += 1;
            }

            for ($i = count($list_message)-1; $i >= 0; $i --) {
              $user = $list_message[$i][0];
              $mess = $list_message[$i][1];

              ?>
              <fieldset class="users_messages">
              <?php
              echo "<legend> $user :</legend>";
              echo "<p> $mess</p>";
              ?>
              </fieldset>
              <?php

            }
            
            ?>
            
          </div>
        </div>
        <div class="gauche">
          <h2 class="titre_catégories">Catégories:</h2>
          <ul class="liste_catégories" style="font-size: 25px">
            <li class="element_liste_catégories">
              <a href="Page2.html">Maths</a>
            </li>
            <li class="element_liste_catégories">
              <a href="Page3.html">Physique</a>
            </li>
            <li class="element_liste_catégories">
              bonjour je suis cramptéseeeeee
            </li>
          </ul>
        </div>
        <?php
          if (isset($_SESSION['connecte'])){
            ?>
            <a href="profile.php" class="connection"><?php echo $_SESSION['username'];?></a>
            <?php
          }
          else{
            ?>
            <a href="login.php" class="connection">Se connecter</a>
            <?php
          }
        ?>
        <div class="espace-bas">espace bas</div>
        <div class="espace-haut"></div>
        <div class="espace-gauche">espace gauche</div>
        <div class="espace-droit">espace droit</div>
      </div>
    </div>
  </body>
</html>
