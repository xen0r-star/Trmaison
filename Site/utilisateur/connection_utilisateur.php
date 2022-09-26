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
                    { echo '<li class="selecteur2"><a href="..\ajoute\index.php.php">Ajouter</a></li>'; } 
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
        $email = $_POST['email']; 
        $password = $_POST['password'];

        require '..\database.php'; 
        $db=Database::connect();
        $statement=$db->prepare('SELECT ID_utilisateur, email, mot_de_passe, date_inscription, prenom, nom, photo, rank
                                        FROM utilisateurs WHERE email = ? ');
        $statement->execute(array($email));
        $utilisateurs=$statement->fetch();

        if (!empty($_POST['email'])) {

            if (!empty($_POST['password'])) {
                
            
                $email = strtolower($email); // email transformé en minuscule

                
                $check1 = $db->prepare('SELECT email FROM utilisateurs WHERE email = ?');    // _   si email existe
                $check1->execute(array($email));                                             //  |
                $data1 = $check1->fetch();                                                   //  |
                $row1 = $check1->rowCount();                                                 // ￣

                if ($row1 == 1) {

                    if ($password == $utilisateurs['mot_de_passe']) {
                        $_SESSION['email'] = $email;
                    	$_SESSION['ID_utilisateur'] = $utilisateurs['ID_utilisateur'];
                    	$_SESSION['prenom'] = $utilisateurs['prenom'];
                    	$_SESSION['nom'] = $utilisateurs['nom'];
                    	$_SESSION['date_inscription'] = $utilisateurs['date_inscription'];
                        $_SESSION['mot_de_passe'] = $utilisateurs['mot_de_passe'];
                    	$_SESSION['photo'] = $utilisateurs['photo'];
                        $_SESSION['rank'] = $utilisateurs['rank'];

                    	header('Location:deconnection.php');
                    }
                    else {
                        echo '<br/><br/><br/><div class="connection-utilisateur-erreur">Le mot de passe n\'est pas correcte !</div>';
                    }
 
                }
                else {
                    echo '<br/><br/><br/><div class="connection-utilisateur-erreur">L\'email n\'est pas correcte ou vous n\'etes pas inscrie ! '.'<a href="inscription.php">'.'Inscription'.'</a>'.'</div>';
                }
            }
            else {
                echo '<br/><br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas remplie le champ mot de passe</div>';
            }
        }
        else {
            echo '<br/><br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas remplie le champ email</div>';
        }

        Database::disconnect(); 

    ?>

    </body>
</html>