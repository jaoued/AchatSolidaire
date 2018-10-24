<h2> insertion d un moyen de transport</h2>

<br/>
<form method="post" >
    
    Libelle : <input type="text" name="name" value=""><br/>
    Heure service : <input type="text" name="heureService"  value="" ><br/>
    Heure fin service : <input type="text" name="heureFinService" value="" ><br/>
    Nb stations : <input type="text" name="nbStations" value="" ><br/>
            
    Type Transport :
         <select name="idType">
         <?php

            foreach ($lesTypes as $unType)  
            {
                
                echo "<option value =".$unType['id'].">".$unType['type']."</option>";
            }
        ?>
             
         </select>
         <input type="submit" name="valider" value="valider">
</form>