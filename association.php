<?php 	
		include ('includehtml/header.php');	
		include('includehtml/menu_aside_gauche.php');
	
?>	


			<div class="col-sm-9">
					<div class="blog-post-area">
					<?php
						
						$tab=array('idAssociation'=>$_GET['association']);	
						$tabMedias=array('association_idassociation'=>$_GET['association']);	
						$unControleur->setTable('view_associationcontact');
						$results = $unControleur->selectwhere($tab);
						$unControleur->setTable('mediasassociation');
						$resultsMedias = $unControleur->selectWhereAll($tabMedias);
						//var_dump($resultsMedias);die;
						
						
						
				
						echo "<h2 class='title text-center'>". $results['name'] . " </h2>";
					?>
					<div class="recommended_items"><!--recommended_items-->	
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php
								for ($cpt=0;$cpt<3; $cpt ++)
									echo '
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="'.$resultsMedias[$cpt]['Mediasassociation'].'" alt="" />
													
														<p></p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-sticky-note"></i>'.$resultsMedias[$cpt]['comment'].'</a>
													</div>
													
												</div>
											</div>
										</div>';
								?>
								</div>
								<div class="item">
								<?php
								for ($cpt=3;$cpt<6; $cpt ++)
									echo '
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
															<img src="'.$resultsMedias[$cpt]['Mediasassociation'].'" alt="" />
													
														<p></p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-sticky-note"></i>'.$resultsMedias[$cpt]['comment'].'</a>
													</div>
													
												</div>
											</div>
										</div>';
								?>
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
					
						<div class="single-blog-post">
						
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-calendar"></i><?php echo "Consulter : ".$results['date_creationa']."</li>"; ?></li>
							
									<li><i class="fa fa-user"></i><?php echo "Contact <a href='contactAsso.php?contact=".$results['idPersonne']."'>".$results['prenom']. ' '.$results['nom'] ."</a></li>"; ?></li>
									
									<li><i class="fa fa-building"></i> <?php echo "Localisation  :".$results['villea']; ?></li>
									
									
								</ul>
							
							</div>
							<p style="text-align: justify;"><?php echo $results['description']; ?></p>
						</div>
						
				</div>
			</div>
		</div>
	
	
<?php include ('includehtml/footer.php'); ?>