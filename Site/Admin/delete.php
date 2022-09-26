<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Admin</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="..\General.css">
        <link href="..\..\image\logo_TRmaison.jpg">
    </head>
    <body>
		<!-- sélecteur haut de page -->

		<ul class="selecteur1">
            <li class="logo_haut_page"><img class="logo" src="..\..\image\logo_TRmaison_nom.jpg" width="300px" height="75px" alt="logo_TRmaison"></li>
            <?php session_start();  
                if (isset($_SESSION['ID_utilisateur'])) 
                    { echo '<li class="selecteur2"><a href="..\utilisateur\deconnection.php">'.'<img classe="image-profil" src="../../image/'.$_SESSION['photo'].'" width="25px" height="25px" alt="Photo de profil">'.' '.'<strong>'.$_SESSION['prenom'].'</strong></a></li>'; } 
                else 
                    { echo '<li class="selecteur2"><a href="..\utilisateur\Connection.php">Connection</a></li>'; } 
            ?>
            <li class="selecteur2"><a href="..\Recherche.php">Recherche</a></li>
            <li class="selecteur2"><a href="..\logement.php">Logement</a></li>
            <li class="selecteur2"><a href="..\index.php">Accueil</a></li>
            <?php  
                if (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 1) 
                    { echo '<li class="selecteur2"><a href="..\ajoute\index.php">Ajouter</a></li>'; } 
                elseif (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 2) 
                    { echo '<li class="selecteur2"><a href="..\ajoute\index.php">Ajouter</a></li>'; }
                else 
                    { } 
            ?>
            <?php  
                if (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 1) 
                    { echo '<li class="selecteur2"><a href="index.php">Admin</a></li>'; } 
                else 
                    {  } 
            ?>
        </ul>

        <!-- formulaire de connection -->

        <?php

        require '../database.php';
        if (!empty($_GET['utilisateur']))
        {
            $ID=$_GET['utilisateur'];
        }
            $db=Database::connect();
            $statement=$db->prepare("DELETE FROM utilisateurs WHERE ID_utilisateur = ?");
            $statement->execute(array($ID));
            Database::disconnect();

            echo '<div class="deconnectio-div">';
            echo 'L\'utilisateur à bien etais suprimer '; 
            echo '<form action="index.php">'.'<button>'.'<img src="..\..\image\fleche-noir.png" width="25px" height="25px" alt="fleche"></img>'.' Admin</button>'.'</form>';
            echo '</div>';

        ?>
    </body>
</html>