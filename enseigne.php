<?php 	
		include ('includehtml/header.php');	
		include('includehtml/menu_aside_gauche.php');
	
?>	


			<div class="col-sm-9">
					<div class="blog-post-area">
					<?php
						
						$tab=array('idEnseigne'=>$_GET['enseigne']);	
						$tabMedias=array('enseigne_idenseigne'=>$_GET['enseigne']);	
                    
                        $unControleur->setTable('enseigne');
						$resultDescription = $unControleur->selectwhere($tab);
						
                        $unControleur->setTable('view_enseignetypecontact');
						$results = $unControleur->selectwhere($tab);
						
                        $unControleur->setTable('mediasenseigne');
						$resultsMedias = $unControleur->selectWhereAll($tabMedias);
					   
                        //$tabproduits=
				
						echo "<h2 class='title text-center'>". $results['enseigne'] . " </h2>";
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
														<img src="'.$resultsMedias[$cpt]['Mediasenseigne'].'" alt="" />
													
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
									<li>
									        <i class="fa fa-calendar"></i><?php echo "type  : ".$results['type']; ?>
								    </li>
									<li>
									    <i class="fa fa-calendar"></i>
									    <strong><?php echo "pourcentage_reverse  : ".$results['pourcentage_reverse']." % </strong> sur tous les achats"; ?>
								    </li>	
									<li>
									    <i class="fa fa-user"></i><?php echo "Contact <a href='contactAsso.php?contact=".$results['idContact']."'>".$results['prenom']. ' '.$results['nom'] ."</a>"; ?>
								    </li>									
								</ul>
							
							</div>
						</div>
						<div>
						    <p>
						        <i class="fa fa-id-card"></i>
									    <?php echo $resultDescription['description']; ?>
						    </p>
						</div>
						
				</div>
			</div>
		</div>
	
	
<?php include ('includehtml/footer.php'); ?>