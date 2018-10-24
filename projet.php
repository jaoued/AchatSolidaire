<?php 	
		
    if (isset($_GET['action']) && $_GET['action']=='ajoutProjet')       
    { 
        session_start();
       // var_dump($_GET) ;die;
        $_SESSION['projet']= $_GET['projet'] ;
        $_SESSION['idprojet']= $_GET['idprojet'] ;
       // var_dump('ici fonction ajout projet');var_dump($_SESSION) ; var_dump('ici fonction ajout projet');die;
        
        
        header('location:index.php');

    }
    else {
        include ('includehtml/header.php');	
      include('includehtml/menu_aside_gauche.php');
    }

	
?>	


			<div class="col-sm-9">
					<div class="blog-post-area">
					<?php
						
						$tab=array('idProjet'=>$_GET['projet']);
						$tabMedias=array('Projet_idProjet'=>$_GET['projet']);
						
						$unControleur->setTable('view_projetparpaysparasso');
						$results = $unControleur->selectwhere($tab);
						$unControleur->setTable('mediasprojet');
						$resultsMedias = $unControleur->selectWhereAll($tabMedias);
						//var_dump($resultsMedias);die;
						
						
				
						echo "<h2 class='title text-center' style='padding-top: 27px'><a href=projet.php?action=ajoutProjet&amp;projet=".$results['Projet']."&amp;idprojet=".$results['idProjet'].">CLiquez pour selectionner le projet : </a>". $results['Projet'] . " </h2>";
              
                       
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
														<img src="'.$resultsMedias[$cpt]['MediasProjet'].'" alt="" />
													
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
															<img src="'.$resultsMedias[$cpt]['MediasProjet'].'" alt="" />
													
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
									<li><i class="fa fa-user"></i><?php echo "Projet géré par :  <a href='association.php?association=".$results['Association_idAssociation']."'>".$results['nameAssoc']."</a></li>"; ?></li>
									<li><i class="fa fa-user"></i><?php echo "Contact <a href='contactAsso.php?contact=".$results['Association_idAssociation']."'>".$results['prenom']. ' '.$results['nom'] ."</a></li>"; ?></li>
									<li><i class="fa fa-calendar"></i> <?php echo $results['date']; ?></li>
									<li><i class="fa fa-money"></i> <?php echo "Fonds recoltes :".$results['FondsRecoltes']. 'E'; ?></li>
									<li><i class="fa fa-flag"></i><?php echo "Pays <a href='pays.php?pays=".$results['Pays_idPays']."'>".$results['pays']."</a></li>"; ?></li>
									
									
								</ul>
							
							</div>
							<p style="text-align: justify;"><?php echo $results['Description']; ?></p>
						</div>
						
				</div>
			</div>
		
	
	
<?php include ('includehtml/footer.php'); ?>