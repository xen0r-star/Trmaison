<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | inscription</title>
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

        <!-- contenue -->

    <?php 

        $email = $_POST['email']; 
        $password = $_POST['mot_de_passe'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $pp = $_POST['pp'];
        $rank = $_POST['rank'];

        $email = strtolower($email); // email transformé en minuscule
        
        if (!empty($_GET['utilisateur']))
        {
            $ID=$_GET['utilisateur'];
        }

            require '..\database.php'; 
            $db=Database::connect();

            $check1 = $db->prepare('SELECT email FROM utilisateurs WHERE email = ?'); 
            $check1->execute(array($email));                                            
            $data1 = $check1->fetch();                                                   
            $row1 = $check1->rowCount(); 

            $statement = $db->prepare('SELECT email FROM utilisateurs WHERE ID_utilisateur = ?'); 
            $statement->execute(array($ID));                                             
            $utilisateur=$statement->fetch();

            $imagetype=pathinfo($pp, PATHINFO_EXTENSION);
    
        if (!empty($email)) {
            if (!empty($prenom)) {
                if (!empty($nom)) {
                    if (!empty($pp)) {
                    if (( $imagetype =="jpg" || $imagetype =="png" || $imagetype =="jpeg")) { 
                        if (!empty($password)) {
                            if ($row1 != 1 || $utilisateur['email'] == $email) { 

                            $statement=$db->prepare("UPDATE utilisateurs set email = ?, mot_de_passe = ?,prenom = ?,nom = ?,photo = ?,rank = ? WHERE ID_utilisateur = ?");
                            $statement->execute(array($email,$password,$prenom,$nom,$pp,$rank,$ID));
                            Database::disconnect();
                            echo '<div class="deconnectio-div">';
                            echo 'l\'utilisateur a bien etais modifié';
                            echo '<form action="index.php">'.'<button>'.'<img src="..\..\image\fleche-noir.png" width="25px" height="25px" alt="fleche"></img>'.' Admin</button>'.'</form>';
                            echo '</div>';  
                            } else { echo '<br/><br/><br/><div class="connection-utilisateur-erreur">L\'adresse mail existe déja</div>';}
                        } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas remplie le champ mot de passe</div>';}
                    } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas mis le bon format ou n\'avais pas mis d\'image</div>';}
                    
                    } else {
                        if (!empty($password)) {
                            if ($row1 != 1 || $utilisateur['email'] == $email) { 

                            $statement=$db->prepare("UPDATE utilisateurs set email = ?, mot_de_passe = ?,prenom = ?,nom = ?,rank = ? WHERE ID_utilisateur = ?");
                            $statement->execute(array($email,$password,$prenom,$nom,$rank,$ID));
                            Database::disconnect();
                            echo '<div class="deconnectio-div">';
                            echo 'l\'utilisateur a bien etais modifié';
                            echo '<form action="index.php">'.'<button>'.'<img src="..\..\image\fleche-noir.png" width="25px" height="25px" alt="fleche"></img>'.' Admin</button>'.'</form>';
                            echo '</div>';  
                            } else { echo '<br/><br/><br/><div class="connection-utilisateur-erreur">L\'adresse mail existe déja</div>';}
                        } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas remplie le champ mot de passe</div>';}
                    }      
                } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas remplie le champ nom</div>';}
            } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas remplie le champ prénom</div>';}
        } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas remplie le champ email</div>';}

    ?>

    </body>
</html>