
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">% reverse</td>
							<td class="price">Prix</td>
							
						
							<td></td>
						</tr>
					</thead>
					
					<tbody>
						<?php 
						$nbArticles=compterArticlesWishlist();
                        
                       //var_dump($nbArticles);
                       
                    
					if (compterArticlesWishlist() > 0)
                        {
                            $part2='';
                            for ($nb = 0 ; $nb < $nbArticles ; $nb ++)
                            {
                                $libelle=$_SESSION['wishlist']['libelleProduit'][$nb];
                                $quantite=$_SESSION['wishlist']['qteProduit'][$nb];
                                $idPanier=$_SESSION['wishlist']['idProduit'][$nb].$_SESSION['wishlist']['idEnseigne'][$nb];

                                echo '
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="'.$_SESSION['wishlist']['mediaProduit'][$nb].'" alt=""></a>

                                <a href="addWishlist.php?action=ajoutPanier&amp;enseigne='.$_SESSION['wishlist']['enseigne'][$nb]. '&amp;idenseigne='.$_SESSION['wishlist']['idEnseigne'][$nb].
                                '&amp;pourcentagereverse='.$_SESSION['wishlist']['pourcentageReverse'][$nb].
                                '&amp;mediaproduit='.$_SESSION['wishlist']['mediaProduit'][$nb].
                                '&amp;l='.$_SESSION['wishlist']['libelleProduit'][$nb].'&amp;q=1&amp;p='.$_SESSION['wishlist']['prixProduit'][$nb].
                                '&amp;idProduit='.$_SESSION['wishlist']['idProduit'][$nb].'&amp;uri='.$_SERVER['REQUEST_URI'].
                                '">Ajouter au panier</a>

                                <a href="addWishlist.php?action=suppression&amp;l='.$_SESSION['wishlist']['libelleProduit'][$nb].'&amp;q=2"> - supprimer</a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="product-details.php?produit='.$_SESSION['wishlist']['idProduit'][$nb].'&amp;enseigne='.$_SESSION['wishlist']['idEnseigne'][$nb].'">'.$_SESSION['wishlist']['libelleProduit'][$nb].'</a></h4>

                                <p><a href="enseigne.php?enseigne='.$_SESSION['wishlist']['idEnseigne'][$nb].'">'.$_SESSION['wishlist']['enseigne'][$nb].'</a></p>
                            </td>

                            <td class="cart_price"><p>'.$_SESSION['wishlist']['pourcentageReverse'][$nb].' %</p>
                            </td>

                          
                            <td class="cart_total">
                                <p class="cart_total_price">'.$_SESSION['wishlist']['prixProduit'][$nb].' E</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                                ' ;                        
                              
                        
                                }
                        }
            
						?>
					</tbody>
						
					
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	