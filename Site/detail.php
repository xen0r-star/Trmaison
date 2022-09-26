<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Detail</title>
        <meta charset = "utf-8">
        <link rel="stylesheet" href="General.css">
        <link rel="icon" href="..\image\logo_TRmaison.jpg">
    </head>
    <body>

        <!-- sélecteur haut de page -->

        <ul class="selecteur1">
            <li class="logo_haut_page"><img class="logo" src="..\image\logo_TRmaison_nom.jpg" width="300px" height="75px" alt="logo_TRmaison"></li>
            <?php session_start();  
                if (isset($_SESSION['ID_utilisateur'])) 
                    { echo '<li class="selecteur2"><a href="utilisateur\deconnection.php">'.'<img classe="image-profil" src="../image/'.$_SESSION['photo'].'" width="25px" height="25px" alt="Photo de profil">'.' '.'<strong>'.$_SESSION['prenom'].'</strong></a></li>'; } 
                else 
                    { echo '<li class="selecteur2"><a href="utilisateur\Connection.php">Connection</a></li>'; } 
            ?>
            <li class="selecteur2"><a href="Recherche.php">Recherche</a></li>
            <li class="selecteur2"><a href="logement.php">Logement</a></li>
            <li class="selecteur2"><a href="index.php">Accueil</a></li>
            <?php  
                if (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 1) 
                    { echo '<li class="selecteur2"><a href="ajoute\index.php">Ajouter</a></li>'; } 
                elseif (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 2) 
                    { echo '<li class="selecteur2"><a href="ajoute\index.php">Ajouter</a></li>'; }
                else 
                    { } 
            ?>
            <?php  
                if (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 1) 
                    { echo '<li class="selecteur2"><a href="admin\index.php">Admin</a></li>'; } 
                else 
                    {  } 
            ?>
        </ul>

                <!-- carre pour une maison -->

                <?php 
                    require 'database.php'; 
                    if(!empty($_GET['logement']))
                    {
                        $ID=checkInput($_GET['logement']);
                    }
                    $db=Database::connect(); 
                    $statement=$db->prepare("SELECT logement.ID_logement, logement.price, logement.image, CONCAT( localite.rue, ' , ', localite.code_postal, ' ', localite.ville ) AS lieu, type.name AS name, categorie.empoule_connecte AS empoule, categorie.frigo_connecte AS frigo, categorie.telephone AS telephone, categorie.alarme AS alarme, categorie.detection_incendie AS incendie, categorie.portails_et_clotures_motorisee AS portails_clotures, categorie.porte_de_garage_motorisee AS garage, categorie.chauffage AS chauffage, categorie.climatisation AS climatisation, categorie.piscine AS piscine, categorie.jacuzzi AS jacuzzi, categorie.panneaux_photovoltaiques AS panneaux_photovoltaiques, logement.description FROM logement 
                                            INNER JOIN localite ON logement.localite=localite.ID_localite
                                            INNER JOIN type ON logement.type=type.ID_type
                                            INNER JOIN categorie ON logement.categorie=categorie.ID_categorie
                                            WHERE logement.ID_logement=?");

                    $statement->execute(array($ID)); 
                    $logement=$statement->fetch();
                    Database::disconnect(); 

                    function checkInput($data)
                    {
                        $data = trim($data); 
                        $data = stripslashes($data);   
                        $data = htmlspecialchars($data);   
                        return $data;
                    }


                        switch ($logement['empoule']) {
                            case 1: $CF1 = 'Oui'; break;
                            default: $CF1 = 'Non';
                        }

                        switch ($logement['frigo']) {
                            case 1: $CF2 = 'Oui'; break;
                            default: $CF2 = 'Non';
                        }
    
                        switch ($logement['telephone']) {
							case 0: $CF3 = 'non'; break;
                            case 1: $CF3 = 'Oui'; break;
							default: $CF3 = 'erreur';
                        }

                        switch ($logement['alarme']) {
                            case 1: $CF4 = 'Faible'; break;
                            case 2: $CF4 = 'Moyenne'; break;
                            case 3: $CF4 = 'Élevée'; break;
                            default: $CF4 = 'Non';
                        }
                        
                        switch ($logement['incendie']) {
                            case 1: $CF5 = 'Oui'; break;
                            default: $CF5 = 'Non';
                        }

                        switch ($logement['portails_clotures']) {
                            case 1: $CF6 = 'Oui'; break;
                            default: $CF6 = 'Non';
                        }

                        switch ($logement['garage']) {
                            case 1: $CF7 = 'Oui'; break;
                            default: $CF7 = 'Non';
                        }

                        switch ($logement['chauffage']) {
                            case 1: $CF8 = 'Radiateurs | '; break;
                            case 2: $CF8 = 'Chauffage par le sol | '; break;
                            case 3: $CF8 = 'Chaudières gaz | '; break;
                            case 4: $CF8 = 'Chaudières mazout | '; break;
                            case 5: $CF8 = 'Pompes à chaleur | '; break;
                            default: $CF8 = 'Chauffage';
                        }

                        switch ($logement['chauffage']) {
                            case 1: $CF8_1 = 'Oui'; break;
                            case 2: $CF8_1 = 'Oui'; break;
                            case 3: $CF8_1 = 'Oui'; break;
                            case 4: $CF8_1 = 'Oui'; break;
                            case 5: $CF8_1 = 'Oui'; break;
                            default: $CF8_1 = 'Non';
                        }

                        switch ($logement['climatisation']) {
                            case 1: $CF9 = 'Oui'; break;
                            default: $CF9 = 'Non';
                        }

                        switch ($logement['piscine']) {
                            case 1: $CF10 = 'Petite'; break;
                            case 2: $CF10 = 'Moyenne'; break;
                            case 3: $CF10 = 'Grande'; break;
                            default: $CF10 = 'Non';
                        }

                        switch ($logement['jacuzzi']) {
                            case 1: $CF11 = 'Oui'; break;
                            default: $CF11 = 'Non';
                        }

                        switch ($logement['panneaux_photovoltaiques']) {
                            case 1: $CF12 = 'Oui'; break;
                            default: $CF12 = 'Non';
                        }

                    echo '<div class="carre2">';
                    echo '<img class="image" src="'.$logement['image'].'" width="600" height="450" alt="image logement"> </img>';
                    echo '<strong><h2 class="h2-logement-page2">'.'Type'.'</h2></strong>';
                    echo '<h2>'.$logement['name'].'</h2><br/>';
                    echo '<strong><h2 class="h2-logement-page2">'.'Prix'.'</h2></strong>';
                    echo '<h2>'.$logement['price'].' $'.'</h2><br/>';
                    echo '<strong><h2 class="h2-logement-page2">'.'Localisation'.'</h2></strong>';
                    echo '<h2>'. $logement['lieu'].'</h2><br/>'; 
                    echo '<strong><h2 class="h2-logement-page2">'.'Déscription'.'</h2></strong>';
                    echo '<h2>'.$logement['description'].'</h2><br/>';
                    echo '<strong><h2 class="h2-logement-page2">'.'Catégories'.'</h2></strong>';
                    echo '<table class="table-detail">';
                        echo '<tr>';
                                echo '<td>'. 'Empoule connecté | ' .'</td>';
                                echo '<td>'. $CF1 .'</td>';
                                echo '<td>'. 'Frigo connecté | ' .'</td>';
                                echo '<td>'. $CF2 .'</td>';
                            echo '</tr>';    
                            echo '<tr>';
                                echo '<td>'. 'Domotique | ' .'</td>';
                                echo '<td>'. $CF3 .'</td>';
                                echo '<td>'. 'Panneaux photovoltaïques | ' .'</td>';
                                echo '<td>'. $CF12 .'</td>';
                            echo '</tr>';  
                            echo '<tr>';
                                echo '<td>'. 'alarme | ' .'</td>';
                                echo '<td>'. $CF4 .'</td>';
                                echo '<td>'. 'Détection incendie | ' .'</td>';
                                echo '<td>'. $CF5 .'</td>';
                            echo '</tr>';  
                            echo '<tr>';
                                echo '<td>'. 'Portails et clôtures motorisée | ' .'</td>';
                                echo '<td>'. $CF6 .'</td>';
                                echo '<td>'. 'Porte de garage motorisée | ' .'</td>';
                                echo '<td>'. $CF7 .'</td>';
                            echo '</tr>';  
                            echo '<tr>';
                                echo '<td>'. $CF8 .'</td>';
                                echo '<td>'. $CF8_1 .'</td>';
                                echo '<td>'. 'Climatisation | ' .'</td>';
                                echo '<td>'. $CF9 .'</td>';
                            echo '</tr>';  
                            echo '<tr>';
                                echo '<td>'. 'Piscine | ' .'</td>';
                                echo '<td>'. $CF10 .'</td>';
                                echo '<td>'. 'Jacuzzi | ' .'</td>';
                                echo '<td>'. $CF11 .'</td>';
                            echo '</tr>';     
                    echo '</table>';
                    echo '</br>'.'</br>'.'</br>';
                    if (isset($_SESSION['ID_utilisateur'])) {
                        echo '<form method="post" action="achete.php?logement='.$logement['ID_logement'].'">'.'<button>Achetée</button>'.'</form>';
                    }
                    else {
                        echo '<form action="utilisateur\Connection.php">'.'<button>Connection</button>'.'</form>';
                    }
                    echo '</br>'.'</br>'.'</br>';
                    echo '<form action="logement.php">'.'<button>'.'<img src="..\image\fleche-noir.png" width="25px" height="25px" alt="fleche"></img>'.'Retour</button>'.'</form>';
                    echo '</div>';
                    
                ?>

    </body>
</html>