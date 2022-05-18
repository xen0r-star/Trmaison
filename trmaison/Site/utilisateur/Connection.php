<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Connection</title>
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

            <!-- formulaire de connection -->

            <div class="container-connection">
            <form action="connection_utilisateur.php" method="post">     
                <div class="form-container">
                    <h1>Connection</h1>
                    <h2>Email</h2>
                    <input type="email" name="email"  placeholder="votre email"><br/>
                    <h2>Mot de passe</h2>
                    <input type="password" name="password"  placeholder="votre mot de passe"><br/>
                    <p></p>
                    <button type="submit" >Connexion</button>
                    <p></p>
                    <a href="inscription.php">Inscription</a>
                </div>   
            </form>
            </div>

    </body>
</html>


