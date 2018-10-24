<?php 	
    
var_dump($_GET);

include ('src/include/fonctions.php');


	$erreur = false;

	$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
	if($action !== null)
	{
	   if(!in_array($action,array('ajout', 'suppression', 'ajoutPanier')))
	   $erreur=true;

	   //récuperation des variables en POST ou GET
	   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
	   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
	   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
	   $idProduit = (isset($_POST['idProduit'])? $_POST['idProduit']:  (isset($_GET['idProduit'])? $_GET['idProduit']:null )) ;
	   $enseigne = (isset($_POST['enseigne'])? $_POST['enseigne']:  (isset($_GET['enseigne'])? $_GET['enseigne']:null )) ;
	   $idEnseigne = (isset($_POST['idenseigne'])? $_POST['idenseigne']:  (isset($_GET['idenseigne'])? $_GET['idenseigne']:null )) ;
	   $pourcentageReverse = (isset($_POST['pourcentagereverse'])? $_POST['pourcentagereverse']:  (isset($_GET['pourcentagereverse'])? $_GET['pourcentagereverse']:null )) ;
	   $mediaProduit = (isset($_POST['mediaproduit'])? $_POST['mediaproduit']:  (isset($_GET['mediaproduit'])? $_GET['mediaproduit']:null )) ;

	   //Suppression des espaces verticaux
	   $l = preg_replace('#\v#', '',$l);
	   //On verifie que $p soit un float
	   $p = floatval($p);
        
	   //On traite $q qui peut etre un entier simple ou un tableau d'entier
	    
	   if (is_array($q)){
	      $QteArticle = array();
	      $i=0;
	      foreach ($q as $contenu){
	         $QteArticle[$i++] = intval($contenu);
	      }
	   }
	   else
	   $q = intval($q);
/*
	echo 'action : '.$action;
	echo 'l : '.$l;
	echo 'p : '.$p;
	echo 'q : '.$q;
	//echo 'QteArticle : '.$QteArticle;

     var_dump($_GET);
     var_dump($erreur);
        die;
*/	
	if (!$erreur){
	   switch($action){
	      Case "ajout":
	         //echo '<br><br><br><br>'.$l.', '.$idProduit.', '.$q.', '.$p.', '.$enseigne.', '.$idEnseigne.', '.$pourcentageReverse.', '.$mediaProduit.'<br>';
               
	         ajouterArticleWishList($l,$idProduit, $q,$p,$enseigne, $idEnseigne, $pourcentageReverse,$mediaProduit);
          
	         break;

	      Case "suppression":
               
	         supprimerArticleWishlist($l);
	         break;

	      Case "ajoutPanier" :
              
                 supprimerArticleWishlist($l);
           
                  ajouterArticle($l,$idProduit, $q,$p,$enseigne, $idEnseigne, $pourcentageReverse,$mediaProduit);
                //var_dump('fin ajout panier');die;
                // header("Location: panier.php");
	              
	       /*
            for ($i = 0 ; $i < count($QteArticle) ; $i++)
	         {
	            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
	         }
             */
	         break;

	      Default:
	         break;
	   }
	}
	    
	}
       // var_dump($_SESSION);die;
       
      if (isset($_GET['action'])  && $_GET['action'] !='ajout')
      {
          
          if (isset($_GET['uri']) && $_GET['uri'] != '/AchatSolidaire/index.php')  header("Location: ".$_GET['uri']."\"");
          else if (isset($_GET['uri']) && $_GET['uri'] == '/AchatSolidaire/index.php')  header("Location: index.php");

          else      header("Location: wishlist.php");
      }
       if (isset($_GET['action'])  && $_GET['action'] =='ajout')
            header("Location: index.php");
                               
        
	
	
 ?>