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

		<br/><br/><h1><strong class="h3-index">Liste des Utilisateurs</strong></h1><br/><br/>
		<form action="insert.php"><button class="button-index-admin"><img src="..\..\image\plus-noir.png" alt="plus" width="25px" height="25px"> Ajouter Utilisateur</button></form><br/>
		<h2 class="index-admin-h2">Utilisateurs Admin</h2>
			<table>
				<thead>
					<tr>		
						<th class="th-admin-radius-haut-gauche">ID utilisateur</th>
						<th>Rank</th>
						<th>Email</th>
						<th>Prenom</th>
						<th>Nom</th>
						<th>Mot de passe</th>
						<th>Photo</th>
						<th>Date inscription</th>
						<th class="th-admin-radius-haut-droit">Modifier</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require '..\database.php';
					$db=Database::connect();
					$statement=$db->query('SELECT ID_utilisateur, email, mot_de_passe, date(date_inscription) AS date, prenom, nom, photo, rank AS ranka
										   FROM utilisateurs WHERE rank=1');
					
					while($utilisateur=$statement->fetch())
					{
						switch ($utilisateur['ranka']) {
							case 1: $rankA = 'Administrateur'; break;
							default: $rankA = 'ERREUR';
						}

						echo'<tr>';
						echo'<td>'.$utilisateur['ID_utilisateur'].'</td>';
						echo'<td>'.$rankA.'</td>';
						echo'<td>'.$utilisateur['email'].'</td>';
						echo'<td>'.$utilisateur['prenom'].'</td>';
						echo'<td>'.$utilisateur['nom'].'</td>';
						echo'<td>'.$utilisateur['mot_de_passe'].'</td>';
						echo'<td>'.$utilisateur['photo'].'</td>';
						echo'<td>'.$utilisateur['date'].'</td>';
						echo'<td>'.'<form action="update.php?utilisateur='.$utilisateur['ID_utilisateur'].'" method="post"><button><img src="..\..\image\plus-noir.png" alt="plus" width="25px" height="25px"> Modifier</button></form>'.'</td>';
						echo'</tr>';
						
					}
					?>

				</tbody>
			</table>
			<br/><br/>
			<h2 class="index-admin-h2">Agent immobilier</h2>
			<table>
				<thead>
					<tr>
						<th class="th-admin-radius-haut-gauche">ID utilisateur</th>
						<th>Rank</th>
						<th>Email</th>
						<th>Prenom</th>
						<th>Nom</th>
						<th>Mot de passe</th>
						<th>Photo</th>
						<th>Date inscription</th>
						<th class="th-admin-radius-haut-droit">Modifier</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$statement2=$db->query('SELECT ID_utilisateur, email, mot_de_passe, date(date_inscription) AS date, prenom, nom, photo, rank AS ranki
										   FROM utilisateurs WHERE rank=2');

					while($utilisateur2=$statement2->fetch())
					{
						
						switch ($utilisateur2['ranki']) {
							case 2: $rankI = 'Agent immobilier'; break;
							default: $rankI = 'ERREUR';
						}
						echo'<tr>';
						echo'<td>'.$utilisateur2['ID_utilisateur'].'</td>';
						echo'<td>'.$rankI.'</td>';
						echo'<td>'.$utilisateur2['email'].'</td>';
						echo'<td>'.$utilisateur2['prenom'].'</td>';
						echo'<td>'.$utilisateur2['nom'].'</td>';
						echo'<td>'.$utilisateur2['mot_de_passe'].'</td>';
						echo'<td>'.$utilisateur2['photo'].'</td>';
						echo'<td>'.$utilisateur2['date'].'</td>';
						echo'<td>'.'<form action="update.php?utilisateur='.$utilisateur2['ID_utilisateur'].'" method="post"><button><img src="..\..\image\plus-noir.png" alt="plus" width="25px" height="25px"> Modifier</button></form>'.'</td>';
						echo'</tr>';
						
					}
					?>

				</tbody>
			</table>
			<br/><br/>
			<h2 class="index-admin-h2">Utilisateurs</h2>
			<table>
				<thead>
					<tr>
						<th class="th-admin-radius-haut-gauche">ID utilisateur</th>
						<th>Rank</th>
						<th>Email</th>
						<th>Prenom</th>
						<th>Nom</th>
						<th>Mot de passe</th>
						<th>Photo</th>
						<th>Date inscription</th>
						<th class="th-admin-radius-haut-droit">Modifier</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$statement3=$db->query('SELECT ID_utilisateur, email, mot_de_passe, date(date_inscription) AS date, prenom, nom, photo, rank AS ranku
										   FROM utilisateurs WHERE rank=3');

					while($utilisateur3=$statement3->fetch())
					{
						switch ($utilisateur3['ranku']) {
							case 3: $rankU = 'Utilisateur'; break;
							default: $rankU = 'ERREUR';
						}
						echo'<tr>';
						echo'<td>'.$utilisateur3['ID_utilisateur'].'</td>';
						echo'<td>'.$rankU.'</td>';
						echo'<td>'.$utilisateur3['email'].'</td>';
						echo'<td>'.$utilisateur3['prenom'].'</td>';
						echo'<td>'.$utilisateur3['nom'].'</td>';
						echo'<td>'.$utilisateur3['mot_de_passe'].'</td>';
						echo'<td>'.$utilisateur3['photo'].'</td>';
						echo'<td>'.$utilisateur3['date'].'</td>';
						echo'<td>'.'<form method="POST" action="update.php?utilisateur='.$utilisateur3['ID_utilisateur'].'"><button type="submit"><img src="..\..\image\plus-noir.png" alt="plus" width="25px" height="25px"> Modifier</button></form>'.'</td>';
						echo'</tr>';
						
					}
					Database::disconnect();
					?>

				</tbody>
			</table>
	</body>
</html>