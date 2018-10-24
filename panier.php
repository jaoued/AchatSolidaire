<?php 	
    include ('includehtml/header.php');
    
    if (isset($_SESSION['panier']) && CompterTotaliteArticles() > 0) {   include ('includehtml/panier_non_vide.php');}
    else                             {    include ('includehtml/panier_vide.php');}

    include ('includehtml/footer.php'); 
?>
