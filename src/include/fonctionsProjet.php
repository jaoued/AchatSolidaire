<?php


function verifProjet(){   
    if (isset($_SESSION['projet']) &&  $_SESSION['projet'] != '')  return true;  // Projet existe et non vide
      else                          return false; // Projet existe et  vide
}


function ajouterProjet($projet){
         $_SESSION['projet']= $projet ; 
        //header('location:index.php');
}

/**
 * Fonction de suppression du Projet
 * @return void
 */
function supprimeProjet(){
   unset($_SESSION['projet']);
}



