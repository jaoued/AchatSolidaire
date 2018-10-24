<?php
/**
 * Verifie si le wishlist existe, le créé sinon
 * @return booleen
 */
function creationwishlist(){
   if (!isset($_SESSION['wishlist'])){
      $_SESSION['wishlist']=array();
      $_SESSION['wishlist']['libelleProduit'] = array();
      $_SESSION['wishlist']['idProduit'] = array();
      $_SESSION['wishlist']['qteProduit'] = array();
      $_SESSION['wishlist']['prixProduit'] = array();
      $_SESSION['wishlist']['enseigne'] = array();
      $_SESSION['wishlist']['idEnseigne'] = array();
      $_SESSION['wishlist']['pourcentageReverse'] = array();
      $_SESSION['wishlist']['mediaProduit'] = array();
      $_SESSION['wishlist']['verrou'] = false;
   }
   return true;
}


function Verifwishlist(){   
   if (creationwishlist() && !isVerrouilleWishlist()) {
      if (compterArticles()) return true;  // wishlist existe et non vide
      else return false;                    // wishlist existe et  vide
  
   }
   else return false;                       // wishlist nonexistant
}
/**
 * Ajoute un article dans le wishlist
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticleWishList($libelleProduit,$idProduit,$qteProduit,$prixProduit,$enseigne, $idEnseigne, $pourcentageReverse,$mediaProduit){
        /*echo 'fonction ajouter <br>';
        echo '<br>'.$libelleProduit.'<br>'.$idProduit.'<br>'.$qteProduit.'<br>'.$prixProduit.'<br>'.$enseigne.'<br>'.$idEnseigne.'<br>'. $pourcentageReverse.'<br>'.$mediaProduit;
        */
   //Si le wishlist existe
   if (creationwishlist() && !isVerrouilleWishlist())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['wishlist']['libelleProduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['wishlist']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['wishlist']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['wishlist']['idProduit'],$idProduit);
         array_push( $_SESSION['wishlist']['qteProduit'],$qteProduit);
         array_push( $_SESSION['wishlist']['prixProduit'],$prixProduit);
         array_push( $_SESSION['wishlist']['enseigne'],$enseigne);
         array_push( $_SESSION['wishlist']['idEnseigne'],$idEnseigne);
         array_push( $_SESSION['wishlist']['mediaProduit'],$mediaProduit);
         array_push( $_SESSION['wishlist']['pourcentageReverse'],$pourcentageReverse);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}





/**
 * Supprime un article du wishlist
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticleWishlist($libelleProduit){
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
      $tmp['verrou'] = $_SESSION['wishlist']['verrou'];

      for($i = 0; $i < count($_SESSION['wishlist']['libelleProduit']); $i++)
      {
         if ($_SESSION['wishlist']['libelleProduit'][$i] !== $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['wishlist']['libelleProduit'][$i]);
            array_push( $tmp['idProduit'],$_SESSION['wishlist']['idProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['wishlist']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['wishlist']['prixProduit'][$i]);
            array_push($tmp['enseigne'], $_SESSION['wishlist']['enseigne'][$i]);
         array_push($tmp['idEnseigne'], $_SESSION['wishlist']['idEnseigne'][$i]);
         array_push($tmp['mediaProduit'], $_SESSION['wishlist']['mediaProduit'][$i]);
         array_push($tmp['pourcentageReverse'], $_SESSION['wishlist']['pourcentageReverse'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['wishlist'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}






/**
 * Fonction de suppression du wishlist
 * @return void
 */
function supprimewishlist(){
   unset($_SESSION['wishlist']);
}

/**
 * Permet de savoir si le wishlist est verrouillé
 * @return booleen
 */
function isVerrouilleWishlist(){
   if (isset($_SESSION['wishlist']) && $_SESSION['wishlist']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le wishlist
 * @return int
 */
function compterArticlesWishlist()
{
   if (isset($_SESSION['wishlist']))
   return count($_SESSION['wishlist']['libelleProduit']);
   else
   return 0;

}

