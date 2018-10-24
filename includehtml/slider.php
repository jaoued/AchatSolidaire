<?php   
 //       
       // $nbSliders = 5;

		
?>
<div class="container-fluid">
	<div class="row">
		
		
				<div class="col-sm-2 bloc1"	>
					<div class="container">			
						<h1><span class="spansh1slider">	MODE D'EMPLOI</span></h1>
						<button type="button" class="btn-default input4 "> 1) J'effectue mes achats</button>	</a><br><br>
						<button type="button" class="btn-default input4 "> 2) Je paie</button>	</a><br><br>
						<button type="button" class="btn-default input4 "> 3) Je suis crédite d'un solde 'DON</button>	</a><br><br>
						<button type="button" class="btn-default input4 "> 3) J'utilise ce solde en DON ou en ACHAT</button>	</a><br>
					</div>
				</div>
				<div class="col-sm-8"  id="slider">
				
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							 <?php
                                for ($i=1 ; $i <= $nbSliders ; $i++){
                                    if ($i==1) $classactive1='class="active"'; 
                                    else        $classactive1 = ' ';
                                    
                                    echo '
                                    <li data-target="#slider-carousel" data-slide-to="'.$i.'" '.$classactive1.'></li>';
                                }
                              
                            ?>
						</ol>
						
						<div class="carousel-inner">
                          <?php
						  for ($i=1 ; $i <= $nbSliders ; $i++)
                          {
                                    $unControleur->setTable('projet');
                                    if ($i==1) $classactive2='active';
                                    else        $classactive2 = '';
                                    $tabsliders=array('idProjet'=>$i);
                                    $result = $unControleur->selectWhere($tabsliders);
                                
                                    $unControleur->setTable('mediasprojet');
                                    $tabsliders=array('Projet_idProjet'=>$i);
                                    $resultMedia = $unControleur->selectWhere($tabsliders);
                                  //  var_dump($result);
                              
                               echo '
                                <div class="item '.$classactive2.'">
                                    <div class="col-sm-6">
                                         <h1><span class="spansh1slider">'.$result['Projet'].'</span></h1>
                                        <h2>Projet : '.$i.'/'.$nbSliders.'</h2>
                                        <p>'.$result['description_courte'].'...</p>
                                        <button type="button" class="btn btn-default get"> <a href="projet.php?projet='.$i.'">En savoir plus</a></button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="'.$resultMedia['MediasProjet'].'" class="girl img-responsive imageCarousselIndex" alt=""   height=150/>
                                      
                                    </div>
                                </div>';
                                
                          }
                           
                          ?>
					   
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			
				<div class="col-sm-2 bloc1"	>
					<div class="container">			
						<h1><span class="spansh1slider">	MODE D'EMPLOI</span></h1>
						<button type="button" class="btn-default input4 "> 1) J'effectue mes achats</button>	</a><br><br>
						<button type="button" class="btn-default input4 "> 2) Je paie</button>	</a><br><br>
						<button type="button" class="btn-default input4 "> 3) Je suis crédite d'un solde 'DON</button>	</a><br><br>
						<button type="button" class="btn-default input4 "> 3) J'utilise ce solde en DON ou en ACHAT</button>	</a><br>
					</div>
				</div>
	</div>
</div>
