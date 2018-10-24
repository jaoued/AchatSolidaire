<h2>Liste des moyens de transport</h2>
<br>
<table border=1>
    <tr><td>Libelle</td><td>Heure service</td><td>Heure Fin service</td><td>Nb stations</td></tr>
    <?php
    foreach ($resultats as $resultat)
    {   
        echo " <tr>
                <td>". $resultat['name'].        "</td>
                <td>". $resultat['heure_debut_service'].    "</td>
                <td>". $resultat['heure_fin_service']. "</td>
                <td>". $resultat['nb_stations'].      "</td>
        </tr>";
    }
    ?>
 
</table>