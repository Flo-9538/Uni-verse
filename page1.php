<!DOCTYPE html>
<link href="Page1.css" rel="stylesheet" media="all" />
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uni'verse</title>
  </head>
  <body>
    <?php
    include 'bdd.php';

    session_start();
    $req = $bdd->query("SELECT `user`,`message` FROM `messages`");
    // c une query
    ?>

    <div class="container">
      <div class="parent">
        <div class="haut">
          <div class="logo">
            <img class="image_logo" src="Logo_Uni-verse.png" alt="Uni'Verse" />
          </div>
        </div>
        <div class="message">
        <?php

        while ($messages = $req->fetch()) {
          echo "$messages[0] : <br>";
          echo "$messages[1] <br>";
          ?>
          <hr>
          <?php
        }

        ?>
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
            <a href="login.html" class="connection">Se connecter</a>
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
