
<?php 
    session_start();
   include ('src/include/fonctionsPanier.php');
     
     modifierQTeArticle($_GET['libelle'],$_GET['quantite']);
    
   echo json_encode(array('libelle'=>$_GET['libelle'], 'quantite'=>$_GET['quantite'], 'indice'=>$positionProduit, 'panier'=>$_SESSION['panier']));
?>