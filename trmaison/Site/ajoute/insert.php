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
            
            <form action="insert-logement.php" method="post">     
                <br/><h1>Ajout logement</h1>

                <table>
                    <tr>
                        <td rowspan="2">
                        <h1>Catégorie</h1><br/>
                            <h3>Appareil connecté</h3>

                            Emboule connecté :<select type="text" name="C1" size = "1">
                                    <option value="1">Non</option>
                                    <option value="2">Oui</option>
                                </select><br/>
                            
                            Frigo connecté :<select type="text" name="C2" size = "1">
                                    <option value="1">Non</option>
                                    <option value="2">Oui</option>
                                </select><br/>
                            
                            Domotique:<select type="text" name="C3" size = "1">
                                    <option value="1">Non</option>
                                    <option value="2">Oui</option>
                                </select><br/>

                            <h3>Motorisée</h3>
                            
                            Portails et clôtures motorisée :<select type="text" name="C6" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                            
                            Porte de garage motorisée :<select type="text" name="C7" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>

                            <h3>Détente</h3>
                            
                            Piscine :<select type="text" name="C10" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Petite</option>
                                <option value="3">Moyenne</option>
                                <option value="4">Grande</option>
                            </select><br/>
                            
                            Jacuzzi :<select type="text" name="C11" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>

                            <h3>Sécurité</h3>
                            
                            Alarme :<select type="text" name="C4" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Faible</option>
                                <option value="3">Moyenne</option>
                                <option value="4">élevée</option>
                            </select><br/>
                           
                            Détection incendie :<select type="text" name="C5" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>

                            <h3>Chauffage</h3>
                            
                            Chauffage :<select type="text" name="C8" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Radiateurs</option>
                                <option value="3">Chauffage par le sol</option>   
                                <option value="4">Chaudières gaz</option>  
                                <option value="5">Chaudières mazout</option> 
                                <option value="6">Pompes à chaleur</option>
                            </select><br/>
                            
                            Climatisation :<select type="text" name="C9" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>

                            <h3>Énergie</h3>
                            
                            Panneaux photovoltaïques :<select type="text" name="C12" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                        </td>
                        <td colspan="2">
                            <h1>Autre</h1><br/>

                            Prix :<input type="number" name="prix" placeholder="535000">$</input><br/><br/>
                            Description :<input type="text" name="description" placeholder="Grand maison avec piscine"></input><br/><br/>
                            Image :<input type="file" name="image"></input><br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Localité</h1><br/>
                            
                            Ville :<input type="text" name="ville" placeholder="Ath"></input><br/><br/>
                            Code postal :<input type="number" name="code" placeholder="7895"></input><br/><br/>
                            Rue :<input type="number" name="num" placeholder="507"></input><input type="text" name="rue" placeholder="Rue des arbre"></input>
                        </td>
                        <td>
                            <h1>Type</h1><br/>

                            <select type="text" name="type" size = "1">
                            <option value = "r"  selected="selected">{ Type }</option>
                            <option value = "m"> Maison</option>
                            <option value = "a"> Appartement</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <button type="submit">Ajouter</button>
            </form> 

    </body>
</html>