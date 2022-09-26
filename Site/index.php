<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>TRmaison | Acuielle</title>
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

            <!-- formulaire de connection -->
    <div class="div-accuille3">
        <div class="div-acuille1">
            <h1 class="h1-index">TRmaison</h1>
            <h2 class="h2-index">Vente de maison en ligne</h2>
            <h2>+100 maison et appartement</h2>
        </div>
        <div class="div-acuille2">
            <h1 class="h3-index">Pourquoi TRmaison</h1>
            <br><br>
            <a href="#5" class="Pourquoi"><img src="..\image\5.png" alt="5" width="225px" height="225px"></a>
            <a href="#cadenas" class="Pourquoi"><img src="..\image\cadenas.png" alt="cadenas" width="225px" height="225px"></a>
            <a href="#facile" class="Pourquoi"><img src="..\image\facile.png" alt="facile" width="225px" height="225px"></a>
            <a href="#belgique" class="Pourquoi"><img src="..\image\belgique.png" alt="belgique" width="225px" height="225px"></a><br/>    
            <a href="#+100" class="Pourquoi"><img src="..\image\+100.png" alt="+100" width="225px" height="225px"></a>    
            <a href="#loupe" class="Pourquoi"><img src="..\image\loupe.png" alt="loupe" width="225px" height="225px"></a> 
            <a href="#terre" class="Pourquoi"><img src="..\image\terre.png" alt="terre" width="225px" height="225px"></a> 
        </div>
    </div>

    <center>
        <br><br><br><br>
    <table id="5">
        <tr>
            <th colspan="2"><p class="h3-index">Votre logement en moins de 5 minutes</p></th>
        </tr>
        <tr>
           <td class="th-image" rowspan="3"><img src="..\image\5-rouge.png" alt="5" width="450px" height="450px"></td>
           <td class="td-text"><li>Acheté votre logement en quelque click.</li></td>
        </tr> 
        <tr>
            <td class="td-text"><li>Un outil de recherche pour plus d'aide.</li></td>
        </tr>
        <tr>
            <td class="td-text"><li>Une inscription pour plus de facilité.</li></td>
        </tr>
    </table>
        <br><br><br><br>
    <table id="cadenas">
        <tr>
            <th class="h3-index" colspan="2"><p class="h3-index">100% sécurisée</p></th>
        </tr>
        <tr>
            <td class="td-text2"><li>Vos données confidentielles sont sécurisées.</li></td>
            <td class="th-image" rowspan="3"><img src="..\image\cadenas-rouge.png" alt="cadenas" width="450px" height="450px"></td>
        </tr>
        <tr>
            <td class="td-text2"><li>Une protection contre des personnes de mal <br> attention.</li></td>
        </tr>
        <tr>
            <td class="td-text2"><li>Vos donnés sont stockés en toute sécurité dans <br> nos bases de donné.</li></td>
        </tr> 
    </table>
        <br><br><br><br>
    <table id="facile">
        <tr>
            <th  class="h3-index" colspan="2"><p class="h3-index">Inscrivez-vous pour plus de facilité</p></th>
        </tr>
        <tr>
           <td class="th-image" rowspan="3"><img src="..\image\facile-rouge.png" alt="facile" width="450px" height="450px"></td>
           <td class="td-text"><li>Une inscription 100% gratuite.</li></td>
        </tr> 
        <tr>
            <td class="td-text"><li>Vous facilite la tâche lors d'achat.</li></td>
        </tr>
        <tr>
            <td class="td-text"><li>Permettre une plus grand sécurité lors du payement.</li></td>
        </tr>
    </table>
        <br><br><br><br>
    <table id="belgique">
        <tr>
            <th  class="h3-index" colspan="2"><p class="h3-index">Des logement dans toute la Belgique</p></th>
        </tr>
        <tr>
            <td class="td-text2"><li>Des logements dans toute la Wallonie et la Flandre.</li></td>
            <td class="th-image"><img src="..\image\belgique-rouge.png" alt="facile" width="450px" height="450px"></td>
        </tr>
    </table>
        <br><br><br><br>
    <table id="+100">
        <tr>
            <th  class="h3-index" colspan="2"><p class="h3-index">+100 appartement et maisons</p></th>
        </tr>
        <tr>
           <td class="th-image" rowspan="2"><img src="..\image\+100-rouge.png" alt="+100" width="450px" height="450px"></td>
           <td class="td-text"><li>+100 logements dans nos bases de donné.</li></td>
        </tr> 
        <tr>
            <td class="td-text"><li>Certifier sans arnaque.</li></td>
        </tr>
    </table>
        <br><br><br><br>
    <table id="loupe">
        <tr>
            <th  class="h3-index" colspan="2"><p class="h3-index">Un outil de recherche pour plus d'aide</p></th>
        </tr>
        <tr>
            <td class="td-text2"><li>Recherché le logement qui vous correspond.</li></td>
           <td class="th-image" rowspan="2"><img src="..\image\loupe-rouge.png" alt="loupe" width="450px" height="450px"></td>
        </tr>
        <tr>
            <td class="td-text2"><li>Une recherche selon 12 critères.</li></td>
        </tr>
    </table>
        <br><br><br><br>
    <table id="terre">
        <tr>
            <th  class="h3-index" colspan="3"><p class="h3-index">12 sites recommandés pour votre habitat</p></th>
        </tr>
        <tr>
           <td class="th-image2" rowspan="6"><img src="..\image\terre-rouge.png" alt="terre" width="400px" height="450px"></td>
           <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.ldlc.com/fr-be/objets-connectes/maison/ampoule-connectee/c7448/" class="a-acuille1" target="_blank">LDLC</a> pour les empoules connecté</td>
           <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.hotspring.be/fr/index.html?gclid=CjwKCAiAprGRBhBgEiwANJEY7N1lDluAne4ROnifylFNy5P-Ljz9mf5qnPFEBguK_UO6ZEqfLVHrVBoCXXYQAvD_BwE" class="a-acuille1" target="_blank">Hotspring</a> pour les jacuzzi</td>
        </tr> 
        <tr>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.samsung.com/fr/familyhub/" class="a-acuille1" target="_blank">Samsung</a> pour les frigos connecté</td>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.alarmeetvous.be/" class="a-acuille1" target="_blank">Alarmeetvous</a> pour les alarmes</td>
        </tr>
        <tr>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.knx.org/knx-fr/pour-la-maison/avantages/" class="a-acuille1" target="_blank">Knx</a> pour la domotique</td>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.sicli.be/systemes-de-detection-incendie/" class="a-acuille1" target="_blank">Sicli</a> pour la détection incendie</td>
        </tr>
        <tr>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://leaderconcept.com/" class="a-acuille1" target="_blank">Leaderconcept</a> pour les portails et clôtures motorisée</td>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.hormann.be/fr/particuliers/portes-de-garage/?gclid=CjwKCAiAprGRBhBgEiwANJEY7NAoFZdKx8m5XlpkPmqi0HOYcE-YjU3XGRjRmeNCPbTACaHSrVpJvRoCzysQAvD_BwE" class="a-acuille1" target="_blank">Hormann</a> pour porte de garage motorisée</td>
        </tr>
        <tr>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.happypiscine.com/piscine-b%C3%A9ton" class="a-acuille1" target="_blank">Happypiscine</a> pour les piscines</td>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.isofull.be/" class="a-acuille1" target="_blank">Isofull</a> pour le chauffage</td>
        </tr>
        <tr>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://aircowil.be/about%20us/pac%20air%20air" class="a-acuille1" target="_blank">Aircowil</a> pour la climatisation</td>
            <td class="td-text3"><img src="..\image\Flèche2.png" width="20" height="20" alt="->"/><a href="https://www.ecohabitatbelge.be/devis-gratuit/" class="a-acuille1" target="_blank">Ecohabitatbelge</a> pour les panneaux photovoltaïques</td>
        </tr>
    </table>
    </center>

    </body>
</html>


