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
    session_start();
    ?>
        <p><?php echo $_SESSION['username'];?></p>
        <?php

    ?>

    <div class="container">
      <div class="parent">
        <div class="haut">
          <div class="logo">
            <img class="image_logo" src="Logo_Uni-verse.png" alt="Uni'Verse" />
          </div>
        </div>
        <div class="message">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id
          ex nisl. pus nisl lectus. Donec in nulla nisl. Nunc a fringilla
          lectus.
          dkzedoiedjdiuzeeduzufhuzqedyuebfuqebqfubequcuehfherbvhuebruvheyurhvuoyerfuebfueoueuoeebfhfifhfuhuovhqeu
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias dicta,
          ab aliquid rem quasi incidunt quis. Quod praesentium odio molestias
          t'as les cramptés? corporis magnam voluptates cumque illum a, possimus
          saepe soluta voluptatem?
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
        <a href="login.html" class="connection">Se connecter</a>
        <div class="espace-bas">espace bas</div>
        <div class="espace-haut">espace haut</div>
        <div class="espace-gauche">espace gauche</div>
        <div class="espace-droit">espace droit</div>
      </div>
    </div>
  </body>
</html>
