<?php
include 'bdd.php';

if(isset($_GET['categorie'])){
  $page = $_GET['categorie'];
}
else{
  $page = 'general';
}

$get_messages = $bdd->query("SELECT `user`,`message`,`date` FROM `messages` WHERE `category`='$page' ORDER BY `id` DESC");

session_start();

if(isset($_POST['ok'])){
  // on va envoyer un message
    $message = $_POST['message'];
    // récupération des champs du form 

    $requete = $bdd->prepare("INSERT INTO messages VALUES(0, :user, :message, :category, :date)");
    // requete sql pour la bdd
    $requete->execute(
        array(
            "user" => $_SESSION['username'],
            "message" => $message,
            "category" => $page,
            "date" => date("Y-m-d")." ".date("H:i:s")
        )
    );
    header("Location: index.php?categorie=".$page);
}
?>

<!DOCTYPE html>
<link href="main.css" rel="stylesheet" media="all" />
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
          <?php
          if (isset($_SESSION['connecte'])){
          ?>
          <form method="POST" id="ecrire">
            <fieldset id="messageField">
              <legend>Ecrire un nouveau message :</legend>
              <textarea oninput="auto_grow(this)" name="message" id="ecrire_message" wrap="hard" title="ecrivez votre message" autocomplete="off" maxlength="999" required></textarea>
            </fieldset>
            <input type="submit" id="envoyer" name="ok">
          </form>
          <?php
          }
          ?>
          
          <div id="message">
            <?php
            while ($messages = $get_messages->fetch()) {
              ?>
              <fieldset class="users_messages">
              <legend><span class="username">
              <?php
              echo "$messages[0]</span>";
              ?>
              <span class="date">
              <?php
              echo "$messages[2]</span> :</legend>";
              echo "<pre>$messages[1]</pre>";
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
              <a href="index.php">general</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=maths">Mathématiques</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=physique">Physique</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Informatique</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Chimie</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Médecine</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Pharmacie</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Géologie</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Droit</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Economie</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Sciences sociales</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Lettres et langues</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Philosophie</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Psychologie</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Arts</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Musique</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">Agronomie</a>
            </li>
            <li class="element_liste_catégories">
              <a href="index.php?categorie=general">CPES</a>
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
        <div class="espace-bas"></div>
        <div class="espace-haut"></div>
        <div class="espace-gauche"></div>
        <div class="espace-droit"></div>
      </div>
    </div>
    <script>
      function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
      }
    </script>

  </body>
</html>
