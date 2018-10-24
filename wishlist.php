<?php 	
    include ('includehtml/header.php');
  
    if (isset($_SESSION['wishlist']) && compterArticlesWishlist() > 0) {   
                   
        
                        include ('includehtml/wishlist_non_vide.php');}
    else                             
        {    
                           include ('includehtml/wishlist_vide.php');}

    include ('includehtml/footer.php'); 
?>
