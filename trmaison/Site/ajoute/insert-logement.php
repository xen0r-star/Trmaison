<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Ajouter logement</title>
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

        <?php

        $ville = $_POST['ville'];
        $rue = $_POST['rue'];
        $num = $_POST['num'];
        $code = $_POST['code'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $type = $_POST['type'];

        if ($type == "a") { $typef = "2"; } 
        else { $typef = "1"; }

        $ruet = $num . ' ' . $rue;

        require '..\database.php'; 
        $db=Database::connect();

        $check1 = $db->prepare('SELECT ville, code_postal, rue FROM localite WHERE ville = ? AND code_postal = ? AND rue = ?');   
        $check1->execute(array($ville, $code, $ruet));                                            
        $data1 = $check1->fetch();                                                   
        $row1 = $check1->rowCount(); 

        $imagetype=pathinfo($image, PATHINFO_EXTENSION);

        if ($_POST['C1'] === '2') {$C1 = '1' ;} 
        else {$C1 = '0' ;}

        if ($_POST['C2'] === '2') {$C2 = '1' ;} 
        else {$C2 = '0' ;}

        if ($_POST['C3'] === '2') {$C3 = '1' ;} 
        else {$C3 = '0' ;}

        if ($_POST['C4'] === '2') {$C4 = '1' ;} 
        elseif ($_POST['C4'] === '3') {$C4 = '2' ;}
        elseif ($_POST['C4'] === '4') {$C4 = '3' ;}
        else {$C4 = '0' ;}

        if ($_POST['C5'] === '2') {$C5 = '1' ;} 
        else {$C5 = '0' ;}

        if ($_POST['C6'] === '2') {$C6 = '1' ;} 
        else {$C6 = '0' ;}

        if ($_POST['C7'] === '2') {$C7 = '1' ;} 
        else {$C7 = '0' ;}

        if ($_POST['C8'] === '2') {$C8 = '1' ;} 
        elseif ($_POST['C8'] === '3') {$C8 = '2' ;}
        elseif ($_POST['C8'] === '4') {$C8 = '3' ;}
        elseif ($_POST['C8'] === '5') {$C8 = '4' ;}
        elseif ($_POST['C8'] === '6') {$C8 = '5' ;}
        else {$C8 = '0' ;}

        if ($_POST['C9'] === '2') {$C9 = '1' ;} 
        else {$C9 = '0' ;}

        if ($_POST['C10'] === '2') {$C10 = '1' ;} 
        elseif ($_POST['C10'] === '3') {$C10 = '2' ;}
        elseif ($_POST['C10'] === '4') {$C10 = '3' ;}
        else {$C10 = '0' ;}

        if ($_POST['C11'] === '2') {$C11 = '1' ;} 
        else {$C11 = '0' ;}

        if ($_POST['C12'] === '2') {$C12 = '1' ;} 
        else {$C12 = '0' ;}

        if (!empty($ville) && !empty($rue) && !empty($code)) {
            if (!empty($image) && !empty($prix) && !empty($description)) {
                if  ($imagetype =="jpg" || $imagetype =="png" || $imagetype =="jpeg") { 
                    if ($type != "r") {
                        if ($row1 == 0) {
                            
                            $statement=$db->prepare("INSERT INTO categorie (empoule_connecte, frigo_connecte, telephone, alarme, detection_incendie, portails_et_clotures_motorisee, porte_de_garage_motorisee, chauffage, climatisation, piscine, jacuzzi, panneaux_photovoltaiques) value(?,?,?,?,?,?,?,?,?,?,?,?)");
                            $statement->execute(array($C1,$C2,$C3,$C4,$C5,$C6,$C7,$C8,$C9,$C10,$C11,$C12));

                            $statement=$db->prepare("INSERT INTO localite (ville, code_postal, rue) value(?,?,?)");
                            $statement->execute(array($ville,$code,$ruet));

                            $statement=$db->prepare("INSERT INTO logement (type, localite, categorie, price, image, description) value(?,2,2,?,?,?)");
                            $statement->execute(array($typef,$prix,$image,$description));
                            Database::disconnect();
                            echo '<div class="deconnectio-div">';
                            echo 'Le logement a bien etais creer';
                            echo '<form action="index.php">'.'<button>'.'<img src="..\..\image\fleche-noir.png" width="25px" height="25px" alt="fleche"></img>'.' Ajouter</button>'.'</form>'; 

                        } else { echo '<br/><br/><div class="connection-utilisateur-erreur">l\'adresse du logement existe déja</div>'; }
                    } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas choisie le type</div>'; }
                } else { echo '<br/><br/><div class="connection-utilisateur-erreur">Vous n\'avez pas mis le bon format d\'image</div>';}       
            } else {echo '<br/><br/><div class="connection-utilisateur-erreur">La caractéristique autre n\'est pas remplie</div>';}
        } else {echo '<br/><br/><div class="connection-utilisateur-erreur">La caractéristique localitée n\'est pas remplie</div>';}
        

        ?>
    </body>
</html>