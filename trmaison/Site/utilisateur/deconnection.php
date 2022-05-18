<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Utilisateur</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="..\General.css">
        <link rel="icon" href="..\..\image\logo_TRmaison.jpg">
    </head>
    <body class="body-utilisateur">

        <!-- sélecteur haut de page -->

        <ul class="selecteur1">
            <li class="logo_haut_page"><img class="logo" src="..\..\image\logo_TRmaison_nom.jpg" width="300px" height="75px" alt="logo_TRmaison"></li>
            <?php session_start();  
                if (isset($_SESSION['ID_utilisateur'])) 
                    { echo '<li class="selecteur2"><a href="deconnection.php">'.'<img classe="image-profil" src="../../image/'.$_SESSION['photo'].'" width="25px" height="25px" alt="Photo de profil">'.' '.'<strong>'.$_SESSION['prenom'].'</strong></a></li>'; } 
                else 
                    { echo '<li class="selecteur2"><a href="Connection.php">Connection</a></li>'; } 
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
                    { echo '<li class="selecteur2"><a href="..\admin\index.php">Admin</a></li>'; } 
                else 
                    {  } 
            ?>
        </ul>

        <!-- contenue -->

    <?php 

        switch ($_SESSION['rank']) {
            case 1: $rank = 'Admin'; break;
            case 2: $rank = 'Agent immobilier'; break;
            default: $rank = 'Utilisateur';
        }

        echo '<div class="deconnectio-div">';
        echo 'Bienvenu sur TRmaison , '. $_SESSION['prenom'] .' '. $_SESSION['nom'];
        echo '<br/><br/><br/>';
        echo '<center>'.'<table class="table-utilisateur">';
            echo '<tr>';
                echo '<td class="connection-utilisateur-text-td" colspan="2">'.'<strong>'.'Votre Profil utilisateur : '.'</strong>'.'</td>';
            echo '</tr>'; 
            echo '<tr>';
                echo '<td class="connection-utilisateur-td">'.'Votre rank : '.'</td>';
                echo '<td class="connection-utilisateur-td">'.$rank.'</td>';
            echo '</tr>';  
            echo '<tr>';
                echo '<td class="connection-utilisateur-td">'.'Votre prénom : '.'</td>';
                echo '<td class="connection-utilisateur-td">'.$_SESSION['prenom'].'</td>';
            echo '</tr>'; 
            echo '<tr>';
                echo '<td class="connection-utilisateur-td">'.'Votre Nom : '.'</td>';
                echo '<td class="connection-utilisateur-td">'.$_SESSION['nom'].'</td>';
            echo '</tr>';    
            echo '<tr>';
                echo '<td class="connection-utilisateur-td">'.'Votre email : '.'</td>';
                echo '<td class="connection-utilisateur-td">'.$_SESSION['email'].'</td>';
            echo '</tr>'; 
            echo '<tr>';
                echo '<td class="connection-utilisateur-td">'.'Votre mot de passe : '.'</td>';
                echo '<td class="connection-utilisateur-td">'.$_SESSION['mot_de_passe'].'</td>';
            echo '</tr>'; 
            echo '<tr>';
                echo '<td class="connection-utilisateur-td">'.'Votre photo de profil : '.'</td>';
                echo '<td class="connection-utilisateur-td">'.$_SESSION['photo'].'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td class="connection-utilisateur-td">'.'Votre date d\'inscription : '.'</td>';
                echo '<td class="connection-utilisateur-td">'.$_SESSION['date_inscription'].'</td>';
            echo '</tr>'; 
        echo '</table>'.'</center>';
        echo '<br/>';
        echo '<form method="POST" action="deconnection_utilisateur.php">'.'<button type="submit" value="detail">Deconnection</button>'.'</form>';
        echo '<br/>';
        echo '</div>';
    ?>

    </body>
</html>