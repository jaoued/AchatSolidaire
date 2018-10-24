	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				  <li class="active">                    </li>
				  <?php if (!isset($_SESSION['projet'])) echo '<li class="active">Vous devez choisir un projet  !!</li>'; 
                          else echo ' Projet '.$_SESSION['projet'];?>
				</ol>
			</div>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Prix</td>
							<td class="price">% reverse</td>;
                                       
                          
							<td class="quantity">Quantite</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
						<?php 
						$nbArticles=compterArticles();
						if (compterArticles()){
                        $part2='';
						for ($nb = 0 ; $nb < $nbArticles ; $nb ++)
                        {
                            $libelle=$_SESSION['panier']['libelleProduit'][$nb];
                            $quantite=$_SESSION['panier']['qteProduit'][$nb];
                            $idPanier=$_SESSION['panier']['idProduit'][$nb].$_SESSION['panier']['idEnseigne'][$nb];
                            $pourcentageReverse=$_SESSION['panier']['pourcentageReverse'][$nb]*$_SESSION['panier']['prixProduit'][$nb]* $_SESSION['panier']['qteProduit'][$nb] / 100;
                                
                                
                            $part1= '
							
							<tr>
								<td class="cart_product">
									<a href=""><img src="'.$_SESSION['panier']['mediaProduit'][$nb].'" alt=""></a>
                                    
                                    <a href="cart.php?action=refresh&amp;l='.$_SESSION['panier']['libelleProduit'][$nb].'&amp;q=1">modfier</a>
                                    <a href="cart.php?action=suppression&amp;l='.$_SESSION['panier']['libelleProduit'][$nb].'&amp;q=2">supprimer</a>
								</td>
								<td class="cart_description">
									<h4><a href="product-details.php?produit='.$_SESSION['panier']['idProduit'][$nb].'&amp;enseigne='.$_SESSION['panier']['idEnseigne'][$nb].'">'.$_SESSION['panier']['libelleProduit'][$nb].'</a></h4>
									
                                    <p><a href="enseigne.php?enseigne='.$_SESSION['panier']['idEnseigne'][$nb].'">'.$_SESSION['panier']['enseigne'][$nb].'</a></p>
								</td>
								<td class="cart_price"><p>'.$_SESSION['panier']['prixProduit'][$nb].' E</p></td>
								<td class="cart_price"><p>'.$pourcentageReverse.' E</p></td>
								<td class="cart_quantity">
									
									
                                        <select  id="'.$idPanier.'" onchange="modificationPanier(\''.$libelle.'\','.$idPanier.')">';
                                      
                                        for ($i=0; $i<=77; $i++) {
                                          if ($i == $quantite) {
                                            $part2 .= '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                                          } else {
                                            $part2 .='<option value="'.$i.'">'.$i.'</option>';
                                          }
                                        }
								$part3='	
								</td>
								<td class="cart_total">
									<p class="cart_total_price">'.$_SESSION['panier']['prixProduit'][$nb]* $_SESSION['panier']['qteProduit'][$nb].' E</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
								</td>
							</tr>
                            ' ;                        
                            echo $part1.$part2.$part3;
							}
                        }
						?>
					</tbody>
						
					
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Montant reverse Commercants <span><?php echo MontantGlobal()-MontantGlobalPourcentage(); ?> E</span></li>
							<li>Montant credit sur votre compte <span><?php echo MontantGlobalPourcentage() ?> E</span></li>
							
							<li>Total <span><?php echo MontantGlobal(); ?> E</span></li>
						</ul>
							<a class="btn btn-default update" href="shop.php?souscategory=1">Continuer les achats</a>
							<a class="btn btn-default check_out" href="reglement.php">Acheter</a>
					</div>
				</div>
				
			</div>
		
	</section><!--/#do_action-->