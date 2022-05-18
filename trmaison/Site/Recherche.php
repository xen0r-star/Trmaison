<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Recherche</title>
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

        <!-- recherché élément -->

        <form method="post" action="recherche_logement.php">
            <div class="recherche5">
                <div class="recherche3">
                    <div class="recherche1">
                        <h1>Appareil connecté</h1>
                            <a href="https://www.ldlc.com/fr-be/objets-connectes/maison/ampoule-connectee/c7448/" title="Emboule connecté" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>  
                            Emboule connecté :<select type="text" name="C1" size = "1">
                                    <option value="1">Non</option>
                                    <option value="2">Oui</option>
                                </select><br/>
                            <a href="https://www.samsung.com/fr/familyhub/" title="Frigo connecté" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Frigo connecté :<select type="text" name="C2" size = "1">
                                    <option value="1">Non</option>
                                    <option value="2">Oui</option>
                                </select><br/>
                            <a href="https://www.knx.org/knx-fr/pour-la-maison/avantages/" title="" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Domotique:<select type="text" name="C3" size = "1">
                                    <option value="1">Non</option>
                                    <option value="2">Oui</option>
                                </select><br/>
                    </div>
                    <div class="recherche1">
                        <h1>Motorisée</h1>
                            <a href="https://leaderconcept.com/" title="Portails et clôtures motorisée" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Portails et clôtures motorisée :<select type="text" name="C6" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                            <a href="https://www.hormann.be/fr/particuliers/portes-de-garage/?gclid=CjwKCAiAprGRBhBgEiwANJEY7NAoFZdKx8m5XlpkPmqi0HOYcE-YjU3XGRjRmeNCPbTACaHSrVpJvRoCzysQAvD_BwE" title="Porte de garage motorisée" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Porte de garage motorisée :<select type="text" name="C7" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                    </div>
                    <div class="recherche1">
                        <h1>Détente</h1>
                            <a href="https://www.happypiscine.com/piscine-b%C3%A9ton" title="Piscine" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Piscine :<select type="text" name="C10" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Petite</option>
                                <option value="3">Moyenne</option>
                                <option value="4">Grande</option>
                            </select><br/>
                            <a href="https://www.hotspring.be/fr/index.html?gclid=CjwKCAiAprGRBhBgEiwANJEY7N1lDluAne4ROnifylFNy5P-Ljz9mf5qnPFEBguK_UO6ZEqfLVHrVBoCXXYQAvD_BwE" title="Jacuzzi" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Jacuzzi :<select type="text" name="C11" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                    </div>
                </div>

                <div class="recherche4">
                    <div class="recherche2">
                        <h1>Sécurité</h1>
                            <a href="https://www.alarmeetvous.be/" title="Alarme" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Alarme :<select type="text" name="C4" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Faible</option>
                                <option value="3">Moyenne</option>
                                <option value="4">élevée</option>
                            </select><br/>
                            <a href="https://www.sicli.be/systemes-de-detection-incendie/" title="Détection incendie" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Détection incendie :<select type="text" name="C5" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                    </div>
                    <div class="recherche2">
                        <h1>Chauffage</h1>
                            <a href="https://www.isofull.be/" title="Chauffage" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Chauffage :<select type="text" name="C8" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Radiateurs</option>
                                <option value="3">Chauffage par le sol</option>   
                                <option value="4">Chaudières gaz</option>  
                                <option value="5">Chaudières mazout</option> 
                                <option value="6">Pompes à chaleur</option>
                            </select><br/>
                            <a href="https://aircowil.be/about%20us/pac%20air%20air" title="Climatisation" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Climatisation :<select type="text" name="C9" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                    </div>
                    <div class="recherche2">
                        <h1>Énergie</h1>
                            <a href="https://www.ecohabitatbelge.be/devis-gratuit/" title="Panneaux photovoltaïques" target="_blank"><img src="..\image\Flèche.png" width="20" height="20" alt="->"/></a>
                            Panneaux photovoltaïques :<select type="text" name="C12" size = "1">
                                <option value="1">Non</option>
                                <option value="2">Oui</option>
                            </select><br/>
                    </div>
                </div>
            </div>
        
            <button class="recherche-button" type = "submit">Envoyer</button>
        </form> 

    </body>
</html>