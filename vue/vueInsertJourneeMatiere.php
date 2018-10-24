<h2> insertion d une matiere a une journee</h2>

<br/>
<form method="post" >
    
  
            
    Choix Matiere :
         <select name="matiere_id">
         <?php
            foreach ($matieres as $matiere)         
                echo "<option value =".$matiere['id'].">".$matiere['matiere']."</option>";
        ?>  
        </select>

        Choix Journee :
         <select name="journee_id">
         <?php
            foreach ($lesHorairesJournees as $lesHorairesJournee)         
                echo "<option value =".$lesHorairesJournee['id'].">".$lesHorairesJournee['nom_journee']."-".$lesHorairesJournee['heure_debut']."-". $lesHorairesJournee['heure_fin']."</option>";
        ?>  
        </select>
         <input type="submit" name="valider" value="valider">
</form>