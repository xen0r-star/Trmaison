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

		<br/><br/><h1><strong class="h3-index">Liste des logement</strong></h1><br/><br/>
		<form action="insert.php"><button class="button-index-admin"><img src="..\..\image\plus-noir.png" alt="plus" width="25px" height="25px"> Ajouter Logement</button></form><br/>
        <form action="statistique.php"><button class="button-index-admin-2"><img src="..\..\image\fléche-noir.png" alt="plus" width="25px" height="25px"> Statistique</button></form><br/>
		<h2 class="index-admin-h2">Logement</h2>
			<table>
				<thead>
					<tr>		
						<th class="th-admin-radius-haut-gauche">ID logement</th>
						<th>Type</th>
						<th>Localité</th>
						<th>Prix</th>
						<th>Catégories</th>
						<th class="th-admin-radius-haut-droit">Modifier</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require '..\database.php';
					$db=Database::connect();
					$statement=$db->query('SELECT logement.ID_logement, logement.price, CONCAT( localite.rue, " , ", localite.code_postal, " ", localite.ville ) AS lieu, type.name AS name, categorie.empoule_connecte AS empoule, categorie.frigo_connecte AS frigo, categorie.telephone AS telephone, categorie.alarme AS alarme, categorie.detection_incendie AS incendie, categorie.portails_et_clotures_motorisee AS portails_clotures, categorie.porte_de_garage_motorisee AS garage, categorie.chauffage AS chauffage, categorie.climatisation AS climatisation, categorie.piscine AS piscine, categorie.jacuzzi AS jacuzzi, categorie.panneaux_photovoltaiques AS panneaux_photovoltaiques FROM logement 
                                            INNER JOIN localite ON logement.localite=localite.ID_localite
                                            INNER JOIN type ON logement.type=type.ID_type
                                            INNER JOIN categorie ON logement.categorie=categorie.ID_categorie');
					
					while($logement=$statement->fetch())
					{
                        if ($logement['empoule'] == 0 && $logement['frigo'] == 0 && $logement['telephone'] == 0 && $logement['alarme'] == 0 && $logement['incendie'] == 0 && $logement['portails_clotures'] == 0 && $logement['garage'] == 0 && $logement['chauffage'] == 0 && $logement['climatisation'] == 0 && $logement['piscine'] == 0 && $logement['jacuzzi'] == 0 && $logement['panneaux_photovoltaiques'] == 0) {
                            $CFT = 'Le logement n\'a aucune caratéristique';
                        }
                        else {
                            $CFT = 'Le logement a des caratéristique';
                        }

						echo'<tr>';
						echo'<td>'.$logement['ID_logement'].'</td>';
						echo'<td>'.$logement['name'].'</td>';
						echo'<td>'.$logement['lieu'].'</td>';
						echo'<td>'.$logement['price'].' €'.'</td>';
						echo'<td>'.$CFT.'</td>';
						echo'<td>'.'<form method="POST" action="update.php?utilisateur='.$logement['ID_logement'].'"><button><img src="..\..\image\plus-noir.png" alt="plus" width="25px" height="25px"> Modifier</button></form>'.'</td>';
						echo'</tr>';
						
					}
                    $db=Database::connect();
					?>

				</tbody>
			</table>

    </body>
</html>