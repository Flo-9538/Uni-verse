<?php
session_start();
?>

<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profil</title>
</head>
<body>
    <a href="page1.php"><img id="UnivTours"
        title="CAS"
        src="Logo_Uni-verse.png"
        width="200px"/></a>

    <div id="fenetreProfil">
        <h2>
            Profil utilisateur
        </h2>
    
        <fieldset>
            <legend>
                Nom utilisateur
            </legend>
            <?php echo $_SESSION['username'];?>
        </fieldset>
        <fieldset>
            <legend>
                Adresse Email
            </legend>
            <?php echo $_SESSION['email'];?>
        </fieldset>
    </div> 
</body>
</html>