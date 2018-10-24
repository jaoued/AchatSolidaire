<?php
/**
 * Verifie si le panier existe, le créé sinon
 * @return booleen
 */
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['idProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['enseigne'] = array();
      $_SESSION['panier']['idEnseigne'] = array();
      $_SESSION['panier']['pourcentageReverse'] = array();
      $_SESSION['panier']['mediaProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}

function VerifPanier(){   
   if (creationPanier() && !isVerrouille()) {
      if (compterArticles()) return true;  // panier existe et non vide
      else return false;                    // panier existe et  vide
  
   }
   else return false;                       // panier nonexistant
}
/**
 * Ajoute un article dans le panier
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticle($libelleProduit,$idProduit,$qteProduit,$prixProduit,$enseigne, $idEnseigne, $pourcentageReverse,$mediaProduit){
        /*echo 'fonction ajouter <br>';
        echo '<br>'.$libelleProduit.'<br>'.$idProduit.'<br>'.$qteProduit.'<br>'.$prixProduit.'<br>'.$enseigne.'<br>'.$idEnseigne.'<br>'. $pourcentageReverse.'<br>'.$mediaProduit;
        */
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['idProduit'],$idProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
         array_push( $_SESSION['panier']['enseigne'],$enseigne);
         array_push( $_SESSION['panier']['idEnseigne'],$idEnseigne);
         array_push( $_SESSION['panier']['mediaProduit'],$mediaProduit);
         array_push( $_SESSION['panier']['pourcentageReverse'],$pourcentageReverse);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $libelleProduit
 * @param $qteProduit
 * @return void
 */
function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le panier éxiste
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du panier
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticle($libelleProduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['libelleProduit'] = array();
      $tmp['idProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['enseigne'] = array();
      $tmp['idEnseigne'] = array();
      $tmp['mediaProduit'] = array();
      $tmp['pourcentageReverse'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
            array_push( $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
            array_push($tmp['enseigne'], $_SESSION['panier']['enseigne'][$i]);
         array_push($tmp['idEnseigne'], $_SESSION['panier']['idEnseigne'][$i]);
         array_push($tmp['mediaProduit'], $_SESSION['panier']['mediaProduit'][$i]);
         array_push($tmp['pourcentageReverse'], $_SESSION['panier']['pourcentageReverse'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Montant total du panier
 * @return int
 */
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}

function MontantGlobalPourcentage(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i]*$_SESSION['panier']['pourcentageReverse'][$i]/100;
   }
   return $total;
}


/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['panier']);
}

/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['libelleProduit']);
   else
   return 0;

}


/**
 * Montant total du panier
 * @return int
 */
function CompterTotaliteArticles(){
   $total=0;
    if (isset($_SESSION['panier']))
       for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
       {
          $total += $_SESSION['panier']['qteProduit'][$i];
       }
   return $total;
}
