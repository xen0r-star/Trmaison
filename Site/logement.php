<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Logement</title>
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
                <center>

                    <?php 
                    require 'database.php'; 
                    $db=Database::connect(); 
                    $statement=$db->query('SELECT logement.ID_logement, logement.price, logement.image, CONCAT( localite.rue, " , ", localite.code_postal, " ", localite.ville ) AS lieu, type.name AS name, categorie.empoule_connecte AS empoule, categorie.frigo_connecte AS frigo, categorie.telephone AS telephone, categorie.alarme AS alarme, categorie.detection_incendie AS incendie, categorie.portails_et_clotures_motorisee AS portails_clotures, categorie.porte_de_garage_motorisee AS garage, categorie.chauffage AS chauffage, categorie.climatisation AS climatisation, categorie.piscine AS piscine, categorie.jacuzzi AS jacuzzi, categorie.panneaux_photovoltaiques AS panneaux_photovoltaiques FROM logement 
                                            INNER JOIN localite ON logement.localite=localite.ID_localite
                                            INNER JOIN type ON logement.type=type.ID_type
                                            INNER JOIN categorie ON logement.categorie=categorie.ID_categorie');


                    while($logement=$statement->fetch())
                    { 
 
                        if ($logement['empoule'] == 0 && $logement['frigo'] == 0 && $logement['telephone'] == 0 && $logement['alarme'] == 0 && $logement['incendie'] == 0 && $logement['portails_clotures'] == 0 && $logement['garage'] == 0 && $logement['chauffage'] == 0 && $logement['climatisation'] == 0 && $logement['piscine'] == 0 && $logement['jacuzzi'] == 0 && $logement['panneaux_photovoltaiques'] == 0) {
                            $CFT = 'Le logement n\'a aucune caratéristique';
                        }
                        else {

                            switch ($logement['empoule']) {
                                case 1: $CF1 = 'Empoule connecté | '; break;
                                default: $CF1 = '';
                            }

                            switch ($logement['frigo']) {
                                case 1: $CF2 = 'Frigo connecté | '; break;
                                default: $CF2 = '';
                            }
        
                            switch ($logement['telephone']) {
                                case 1: $CF3 = 'Domotique | '; break;
                                default: $CF3 = '';
                            }

                            switch ($logement['alarme']) {
                                case 1: $CF4 = 'Faible alarme | '; break;
                                case 2: $CF4 = 'Moyenne alarme | '; break;
                                case 3: $CF4 = 'Élevée alarme | '; break;
                                default: $CF4 = '';
                            }
                            
                            switch ($logement['incendie']) {
                                case 1: $CF5 = 'Détection incendie | '; break;
                                default: $CF5 = '';
                            }

                            switch ($logement['portails_clotures']) {
                                case 1: $CF6 = 'Portails et clôtures motorisée | '; break;
                                default: $CF6 = '';
                            }

                            switch ($logement['garage']) {
                                case 1: $CF7 = 'Porte de garage motorisée | '; break;
                                default: $CF7 = '';
                            }

                            switch ($logement['chauffage']) {
                                case 1: $CF8 = 'Radiateurs | '; break;
                                case 2: $CF8 = 'Chauffage par le sol | '; break;
                                case 3: $CF8 = 'Chaudières gaz | '; break;
                                case 4: $CF8 = 'Chaudières mazout | '; break;
                                case 5: $CF8 = 'Pompes à chaleur | '; break;
                                default: $CF8 = '';
                            }

                            switch ($logement['climatisation']) {
                                case 1: $CF9 = 'Climatisation | '; break;
                                default: $CF9 = '';
                            }

                            switch ($logement['piscine']) {
                                case 1: $CF10 = 'Petite piscine | '; break;
                                case 2: $CF10 = 'Moyenne piscine | '; break;
                                case 3: $CF10 = 'Grande piscine | '; break;
                                default: $CF10 = '';
                            }

                            switch ($logement['jacuzzi']) {
                                case 1: $CF11 = 'Jacuzzi | '; break;
                                default: $CF11 = '';
                            }

                            switch ($logement['panneaux_photovoltaiques']) {
                                case 1: $CF12 = 'Panneaux photovoltaïques | '; break;
                                default: $CF12 = '';
                            }

                            $CFT = $CF1 . $CF2 . $CF3 . $CF4 . $CF5 . $CF6 . $CF7 . $CF8 . $CF9 . $CF10 . $CF11 . $CF12 ;
                        }
    
                        
                        echo '<div class="carre">';
                        echo '<img class="image" src="'.$logement['image'].'" width="400" height="250" alt="image logement"> </img>';
                        echo '<h2 class="h2-logement-page2">'.$logement['name'].' - '.$logement['price'].' $'.'</h2>';
                        echo '<h4 class="h4-logement-page2">'. $logement['lieu'].'</h4>';
                        echo '<p>'. $CFT .'</p>';
                        echo '</br>';
                        echo '<form method="POST" action="detail.php?logement='.$logement['ID_logement'].'">'.'<button type="submit" value="detail">Détail</button>'.'</form>';
                        echo '</div>';
                        echo '<br/>'; 
                    }
                    Database::disconnect(); 

                    ?> 

                </center>

    </body>
</html>