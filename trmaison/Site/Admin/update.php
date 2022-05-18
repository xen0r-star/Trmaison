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

            require '..\database.php';
           
            if(!empty($_GET['utilisateur']))
            {
                $ID=$_GET['utilisateur'];
            }

            $db=Database::connect();
            $statement=$db->prepare("SELECT ID_utilisateur, email, mot_de_passe, prenom, nom, photo, rank
                                    FROM utilisateurs WHERE ID_utilisateur=?");
            $statement->execute(array($ID));
            $utilisateur=$statement->fetch();

            echo '<div class="container-inscription">';
            echo '<form action="update-utilisateur.php?utilisateur='.$utilisateur['ID_utilisateur'].'" method="post">'; 
            
                echo '<div class="form-container">';
                    echo '<h1>Modification</h1>';
                    echo '<h2>Rank</h2>';

                    if ($utilisateur['rank'] == 1) {
                        echo '<select type="text" name="rank" size = "1">';
                        echo '<option value = "3"> Utilisateur</option>';
                        echo '<option value = "2"> Agent immobilier</option>';
                        echo '<option value = "1" selected="selected"> Administrateur</option>';
                    } 
                    elseif ($utilisateur['rank'] == 2) {
                        echo '<select type="text" name="rank" size = "1">';
                        echo '<option value = "3"> Utilisateur</option>';
                        echo '<option value = "2" selected="selected"> Agent immobilier</option>';
                        echo '<option value = "1"> Administrateur</option>';
                    }
                    else {
                        echo '<select type="text" name="rank" size = "1">';
                        echo '<option value = "3" selected="selected"> Utilisateur</option>';
                        echo '<option value = "2"> Agent immobilier</option>';
                        echo '<option value = "1"> Administrateur</option>';
                    }
                    
                    echo '</select>';
                    echo '<h2>Email</h2>';
                    echo '<input type="email" name="email" value="'.$utilisateur['email'].'" placeholder="votre email"><br/>';
                    echo '<h2>Prénom</h2>';
                    echo '<input type="text" name="prenom" value="'.$utilisateur['prenom'].'" placeholder="votre prénom"><br/>';
                    echo '<h2>Nom</h2>';
                    echo '<input type="text" name="nom" value="'.$utilisateur['nom'].'" placeholder="votre nom"><br/>';
                    echo '<h2>Mot de passe</h2>';
                    echo '<input type="text" name="mot_de_passe" value="'.$utilisateur['mot_de_passe'].'" placeholder="votre mot de passe"><br/>';
                    echo '<h2>Photo de Profil</h2>';
                    echo '<img src="../../image/'.$utilisateur['photo'].'" width="100" height="100" alt="photo de profil"> </img><br/><br/>';
                    echo $utilisateur['photo'].'<br/><br/>';
                    echo '<input type="file" name="pp"><br/><br/>';
                    echo '<p></p>';
                    echo '<button type="submit">Ajouter</button>';
                    echo '</form>';
                    echo '<form action="delete.php?utilisateur='.$utilisateur['ID_utilisateur'].'" method="post"><button>Suprimer</button></form>';
                echo '</div>';
            echo '</div>';   
        ?>
    </body>
</html>