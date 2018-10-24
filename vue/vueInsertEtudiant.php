<h2> insertion d un etudiant en classe</h2>

<br/>
<form method="post" >
    
  
            
    Choix Classe :
         <select name="classe_id">
         <?php
            foreach ($classes as $classe)         
                echo "<option value =".$classe['id'].">".$classe['name'].' - '.$classe['annee']."</option>";
        ?>  
        </select>

        Choix Personne :
         <select name="personne_id">
         <?php
            foreach ($personnes as $personne)         
                echo "<option value =".$personne['id'].">".$personne['nom']."-".$personne['prenom']."-". $personne['date_naissance']."</option>";
        ?>  
        </select>
         <input type="submit" name="valider" value="valider">
</form>