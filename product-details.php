<?php 	
	include ('includehtml/header.php');	
    include('includehtml/menu_aside_gauche.php');
					
	$tabsingle=array('idProduits'=>$_GET['produit'], 'idEnseigne'=>$_GET['enseigne']);	
	$taball=array('idProduits'=>$_GET['produit']);	

	$unControleur->setTable('view_ProduitsAllEnsignesCategory ');
	$result = $unControleur->selectWhere($tabsingle);
	
    $resultsAll = $unControleur->selectWhereAll($taball);
	
    $unControleur->setTable('view_notesProduits');
	$tab=array('idproduit'=>$_GET['produit']);	
	$resultsNotes = $unControleur->selectWhereAll($tab);
	$resultCount = $unControleur->selectCountWhere($tab);
	
	$note=round( $resultCount['note'][0], 1, PHP_ROUND_HALF_UP);
	

?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/product-details/1.jpg" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
								  
							</div>
                           <div  class="carousel slide" data-ride="carousel">
                                    <p><br><br> <?php echo $result['Description']; ?></p>
                            </div>
                            
						</div>
						<div class="col-sm-7">
							<button type="button" class="btn btn-fefault cart2">		
								<?php
								echo "<a href=shop.php?category=".$result['idCategoryCategory']."> <strong>". $result['CategoryCategory']."</strong></a> > 
								<a href=shop.php?souscategory=".$result['CategoryProduits_idCategoryProduits']." > ".$result['CategoryProduits']."</a>";
								?>
							</button>
							
							<div class="product-information"><!--/product-information-->
	                     
								<h1><?php echo $result['Produits']; ?></h1>
								<p>Prix Reference : <?php echo $result['Prix_de_reference']; ?> E</p>
								<p>Note Moyenne : <img src="images/product-details/rating.png" alt="" /></p>
								<p>Note Moyenne : <?php echo $note ?></p>
								
								<?php 
    
								   echo '<span><br>
									<p><b>Enseigne :<a href=enseigne.php?enseigne='.$result['idEnseigne'].'></b> '.$result['enseigne'].'</a></p>
										<span>'.$result['prix'].'E.</span>
										<p><b>Availability:</b> In Stock</p>
										<p><b>Pourcentage reversé : </b>'.$result['pourcentage_reverse'].' %</p>
										<label>Quantity:</label><input type="text" value="" />
                                        
                                        
										<button type="button" class="btn btn-fefault cartPanier">
											<i class="fa fa-shopping-cart"></i>
											<a href="cart.php?action=ajout&amp;enseigne='.$result['enseigne']. '&amp;idenseigne='.$result['idEnseigne'].
                                    '&amp;pourcentagereverse='.$result['pourcentage_reverse'].
                                    '&amp;mediaproduit='.$result['mediasproduits'].
                                    '&amp;l='.$result['Produits'].'&amp;q=1&amp;p='.$result['prix'].
                                    '&amp;idProduit='.$result['idProduits'].
                                    '">Ajouter au panier ok</a>
										</button>
									</span>';
                                
								/*
                                a supprimer exemplepour bouton
                                <button type="button" class="btn btn-fefault cart2">		
								<?php
								echo "<a href=shop.php?category=".$result['idCategoryCategory']."> <strong>". $result['CategoryCategory']."</strong></a> > 
								<a href=shop.php?souscategory=".$result['CategoryProduits_idCategoryProduits']." > ".$result['CategoryProduits']."</a>";
								?>
							</button>
                            
                                foreach ($resultsAll as $resultSingle)
									echo '<span><br>
									<p><b>Enseigne :<a href=enseigne.php?enseigne='.$resultSingle['idEnseigne'].'></b> '.$resultSingle['enseigne'].'</a></p>
										<span>'.$resultSingle['prix'].'E.</span>
										<p><b>Availability:</b> In Stock</p>
										<p><b>Pourcentage reversé : </b>'.$resultSingle['pourcentage_reverse'].' %</p>
										<label>Quantity:</label>
										<input type="text" value="" />
										<button type="button" class="btn btn-fefault cart2">
											<i class="fa fa-shopping-cart"></i>
											AJouter au Panier
										</button>
									</span>';*/
								?>
								
								
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Articles similaires</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Prix des enseignes</a></li>
								<li><a href="#tag" data-toggle="tab">Articles Similaires</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (<?php echo $resultCount['count'][0] ; ?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<?php 

								foreach ($resultsAll as $resultSingle)
									echo '
									<div class="col-sm-6">
										<span><br>
											<p><b>Enseigne :<a href=enseigne.php?enseigne='.$resultSingle['idEnseigne'].'></b> '.$resultSingle['enseigne'].'</a></p>
											<span> Prix :'.$resultSingle['prix'].'E.</span>
											<p><b>Availability:</b> In Stock</p>
											<p><b>Pourcentage reversé : </b>'.$resultSingle['pourcentage_reverse'].' %</p>
											
										
											
											<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, \'\', 
\'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;">Ajouter au panier</a>
				
											<a href="cart.php?action=ajout&amp;idproduit=1&amp;l=LIBELLEPRODUIT2&amp;q=2&amp;p=4">Ajouter au panier2</a>
								
										</span>
									</div>';
								?>
								
									
							</div>
							
							<div class="tab-pane fade" id="tag" >
								
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<?php   //($ <?php echo $result['Description'];
									foreach ($resultsNotes as $resultsNote)
									echo '
									<ul>
										<li><a href=""><i class="fa fa-user"></i>'.$resultsNote['prenom'].' '.$resultsNote['nom'].'</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>'.$resultsNote['date'].'</a></li>
									</ul>
									<p>'.$resultsNote['comments'].'</p><hr>';

									?>
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>
	
<?php include ('includehtml/footer.php'); ?>