<h2> insertion d un etudiant</h2>

<br/>
<form method="post" >
    
  
            
    Choix Classe :
         <select name="classe_id">
         <?php
            foreach ($classes as $classe)         
                echo "<option value =".$classe['id'].">".$classe['name'].' - '.$classe['annee']."</option>";
        ?>  
        </select>

    
        Choix Journee :
         <select name="journee_id">
         <?php
            foreach ($lesHorairesJournees as $lesHorairesJournee)         
                echo "<option value =".$lesHorairesJournee['id'].">".$lesHorairesJournee['nom_journee']."-".$lesHorairesJournee['heure_debut']."-". $lesHorairesJournee['heure_fin']."</option>";
        ?>  
        </select>

           Choix Matiere :
         <select name="matiere_id">
         <?php
            foreach ($matieres as $matiere)         
                echo "<option value =".$matiere['id'].">".$matiere['matiere']."</option>";
        ?>  



           </select>

           Choix Professeur :
         <select name="professeur_id">
         <?php
            foreach ($professeurs as $professeur)         
                echo "<option value =".$professeur['id']."> Nom : ".$professeur['nom']."</option>";
        ?>  
         <p><input type="submit" name="valider" value="valider"></p>
</form>