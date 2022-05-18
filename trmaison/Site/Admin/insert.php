<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Ajouter utilisateur</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="..\General.css">
        <link rel="icon" href="..\..\image\logo_TRmaison.jpg">
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
                    { echo '<li class="selecteur2"><a href="..\admin\index.php">Admin</a></li>'; } 
                else 
                    {  } 
            ?>
        </ul>

            <!-- formulaire d'inscription -->
            
            <div class="container-inscription">
            <form action="insert-utilisateur.php" method="post">     
                <div class="form-container">
                    <h1>Ajout utilisateur</h1>
                    <h2>Rank</h2>
                    <select type="text" name="rank" size = "1">
                    <option value = "3"  selected="selected"> Utilisateur</option>
                    <option value = "2"> Agent immobilier</option>
                    <option value = "1"> Administrateur</option>
                    </select>
                    <h2>Email</h2>
                    <input type="email" name="email"  placeholder="votre email"><br/>
                    <h2>Prénom</h2>
                    <input type="text" name="prenom"  placeholder="votre prénom"><br/>
                    <h2>Nom</h2>
                    <input type="text" name="nom"  placeholder="votre nom"><br/>
                    <h2>Mot de passe</h2>
                    <input type="password" name="mot_de_passe"  placeholder="votre mot de passe"><br/>
                    <h2>Photo de Profil</h2>
                    <input type="file"  name="file"><br/><br/>
                    <p></p>
                    <button type="submit">Ajouter</button>
                </div>
            </form>
            </div>   

    </body>
</html>