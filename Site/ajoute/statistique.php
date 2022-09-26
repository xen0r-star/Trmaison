<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Ajouter</title>
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
                    { echo '<li class="selecteur2"><a href="index.php">Ajouter</a></li>'; } 
                elseif (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 2) 
                    { echo '<li class="selecteur2"><a href="index.php">Ajouter</a></li>'; }
                else 
                    { } 
            ?>
            <?php  
                if (isset($_SESSION['ID_utilisateur']) AND $_SESSION['rank'] == 1) 
                    { echo '<li class="selecteur2"><a href="..\Admin\index.php">Admin</a></li>'; } 
                else 
                    {  } 
            ?>
        </ul>

        <!-- formulaire de connection -->

        <?php
			require '..\database.php';
			$db=Database::connect();
			$statement=$db->query('SELECT count(type) AS count, MAX(price) AS max, MIN(price) AS min, AVG(price) AS avg FROM logement');
            $logement=$statement->fetch();


            $statement1=$db->query('SELECT sum(empoule_connecte) AS empoule, sum(frigo_connecte) AS frigo, sum(telephone) AS telephone, sum(alarme) AS alarme, sum(detection_incendie) AS incendie, sum(portails_et_clotures_motorisee) AS portails_clotures, sum(porte_de_garage_motorisee) AS garage, sum(chauffage) AS chauffage, sum(climatisation) AS climatisation, sum(piscine) AS piscine, sum(jacuzzi) AS jacuzzi, sum(panneaux_photovoltaiques) AS panneaux_photovoltaiques 
                                    FROM categorie');
            $logement1=$statement1->fetch();

            $graphe_catego_total = $logement1['empoule'] + $logement1['frigo'] + $logement1['telephone'] + $logement1['alarme'] + $logement1['incendie'] + $logement1['portails_clotures'] + $logement1['garage'] + $logement1['chauffage'] + $logement1['climatisation'] + $logement1['piscine'] + $logement1['jacuzzi'] + $logement1['panneaux_photovoltaiques'];

            $graphe_categorie1 = ($logement1['empoule'] / $graphe_catego_total ) * 360 ;

            $graphe_categorie2 = ($logement1['frigo'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie2 = $graphe_categorie1 + $graphe_categorie2;

            $graphe_categorie3 = ($logement1['telephone'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie3 = $graphe_categorie2 + $graphe_categorie3;

            $graphe_categorie4 = ($logement1['alarme'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie4 = $graphe_categorie3 + $graphe_categorie4;

            $graphe_categorie5 = ($logement1['incendie'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie5 = $graphe_categorie4 + $graphe_categorie5;

            $graphe_categorie6 = ($logement1['portails_clotures'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie6 = $graphe_categorie5 + $graphe_categorie6;

            $graphe_categorie7 = ($logement1['garage'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie7 = $graphe_categorie6 + $graphe_categorie7;

            $graphe_categorie8 = ($logement1['chauffage'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie8 = $graphe_categorie7 + $graphe_categorie8;

            $graphe_categorie9 = ($logement1['climatisation'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie9 = $graphe_categorie8 + $graphe_categorie9;

            $graphe_categorie10 = ($logement1['piscine'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie10 = $graphe_categorie9 + $graphe_categorie10;

            $graphe_categorie11 = ($logement1['jacuzzi'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie11 = $graphe_categorie10 + $graphe_categorie11;

            $graphe_categorie12 = ($logement1['panneaux_photovoltaiques'] / $graphe_catego_total ) * 360 ;
            $graphe_categorie12 = $graphe_categorie11 + $graphe_categorie12;



            $statement2=$db->query('SELECT COUNT(type) AS count FROM logement WHERE type="1" ');
            $logement2=$statement2->fetch();
            
            $graphe_type = ($logement2['count'] / $logement['count']) * 360;
            $graphe_type2 = 360 - $graphe_type;

            


            $style1='width: 250px;
                    height: 250px;
                    border-radius: 100%;
                    background-image: conic-gradient(
                                    #d40b0b '.$graphe_categorie1.'deg, 
                                    #d4760b 0 '.$graphe_categorie2.'deg,
                                    #d4cd0b 0 '.$graphe_categorie3.'deg,
                                    #5fd40b 0 '.$graphe_categorie4.'deg,
                                    #0e980c 0 '.$graphe_categorie5.'deg,
                                    #12d071 0 '.$graphe_categorie6.'deg,
                                    #12c3d0 0 '.$graphe_categorie7.'deg,
                                    #1271d0 0 '.$graphe_categorie8.'deg,
                                    #4212d0 0 '.$graphe_categorie9.'deg,
                                    #9412d0 0 '.$graphe_categorie10.'deg,
                                    #d0129d 0 '.$graphe_categorie11.'deg,
                                    #d0125e 0 '.$graphe_categorie12.'deg
                                    );';

            $style2='width: 250px;
                    height: 250px;
                    border-radius: 100%;
                    background-image: conic-gradient(
                                    pink '.$graphe_type.'deg, 
                                    lightblue 0 '.$graphe_type2.'deg);';
        

		echo '<br/><br/><h1><strong class="h3-index">Statistique</strong></h1><br/><br/>';

        echo '<table class="statistique-table">';
            echo '<thead>';
                echo '<tr>';	
                    echo '<th class="statistique">Catégorie</th>';
                    echo '<th class="statistique">Prix</th>';
                    echo '<th class="statistique">Type</th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
                echo '<tr>';
                    echo '<td class="statistique-graphe-1" style="'.$style1.'" rowspan="3"></td>';      

                    echo '<td><strong>Prix Moyen : </strong><br/>'.$logement['avg'].'</td>';

                    echo '<td class="statistique-graphe-2" style="'.$style2.'" rowspan="3"></td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td><strong>Prix Moyen : </strong><br/>'.$logement['max'].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td><strong>Prix Moyen : </strong><br/>'.$logement['min'].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>';
                    echo '<select class="state-selecte">';
                    echo '<option selected>{ Légende couleur }</option>';
                    echo '<option>Rouge : empoule connéctée</option>';
                    echo '<option>Orange : Frigo connecté</option>';
                    echo '<option>Jaune : Domotique</option>';
                    echo '<option>Vert : Alarme</option>';
                    echo '<option>Vert foncé : Détection incendie</option>';
                    echo '<option>Turquoise : Portails et clôtures motorisée</option>';
                    echo '<option>Bleu clair : Porte de garage motorisée</option>';
                    echo '<option>Bleu : Chauffage</option>';
                    echo '<option>Bleu foncé : Climatisation</option>';
                    echo '<option>Mauve : Piscine</option>';
                    echo '<option>Rose : Jacuzzi</option>';
                    echo '<option>Rose foncé : Panneaux photovoltaïques</option>';
                    echo '</select>';
                    echo '</td>';

                    echo '<td></td>'; 

                    echo '<td>';
                    echo '<select class="state-selecte">';
                    echo '<option selected>{ Légende couleur }</option>';
                    echo '<option>Rose : Maison</option>';
                    echo '<option>Bleu : Appartement</option>';
                    echo '</select>';
                    echo '</td>';

                echo '</tr>';
            echo '</tbody>';
        echo '</table>';
        
        $db=Database::connect(); ?>
    </body>
</html>