<?php
	
	$unControleur->setTable('CategoryCategory');
	$results = $unControleur->selectAll();
	$unControleur->setTable('enseigne');
	$resultsEnseigne = $unControleur->selectAll();
	$unControleur->setTable('marque');
	$resultsMarque = $unControleur->selectAll();
 
	
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <h2 style="padding-top: 10px">Categories</h2>
							<?php
							foreach ($results as $result){
								$part1= '
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#'. $result['CategoryCategory'] .'">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												'. $result['CategoryCategory'] .'
											</a>
										</h4>
									</div>
									<div id="'. $result['CategoryCategory'] .'" class="panel-collapse collapse">
										<div class="panel-body">';
										
										$unControleur->setTable('view_CategoryCategoryProduits ');
										$tabParam=['idCategoryCategory' => $result['idCategoryCategory']];
										$results2 = $unControleur->selectWhereAll($tabParam);
									
										$part2='';
										if ($results2  !== null)
											foreach($results2 as $result2){
												$part2.= '<ul><li><a href="shop.php?souscategory='.$result2["idCategoryProduits"].'"> '. $result2["CategoryProduits"] .'  </a></li></ul>';
											}
								$part3=	'	</div>
									</div>
								</div>';
								echo $part1.$part2.$part3;
                                
							}
							?>
						</div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
							<h2>Les produits par Enseigne</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                    <select >
								    <?php
                                    foreach ($resultsEnseigne as $resultEnseigne){                                       
                                        $unControleur->setTable('view_produitsallensignescategory');
                                        $tab=array('idEnseigne'=>$resultEnseigne['idEnseigne']);
	                                    $resultCount=$unControleur->select2CountWhere($tab);
								        echo '<option ><li><a href="#"> <span class="pull-right"></span>'.$resultEnseigne['enseigne'].'           ('.$resultCount[0].')</a></li></option>'; 
                                        
                                            //echo '<li><a href="#"> <span class="pull-right">('.$resultCount[0].')</span>'.$resultEnseigne['enseigne'].'</a></li>';
                                    }
                                    ?>
                                    </select>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="brands_products"><!--brands_products-->
							<h2>Les produits par Marque</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                    
								    <?php
                                    foreach ($resultsMarque as $resultMarque){                                       
                                        $unControleur->setTable('view_produitsallensignescategory');
                                        $tab=array('idmarque'=>$resultMarque['idmarque']);
	                                    $resultCount=$unControleur->select2CountWhere($tab);
								        echo '<li><a href="#"> <span class="pull-right">(10)</span>'.$resultMarque['marque'].'           </a></li>'; 
                                        
                                            //echo '<li><a href="#"> <span class="pull-right">('.$resultCount[0].')</span>'.$resultEnseigne['enseigne'].'</a></li>';
                                    }
                                    ?>
                                   
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Tri par PRIX</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>