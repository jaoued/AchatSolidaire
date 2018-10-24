<?php
    $unControleur->setTable('view_association_mediaassociation');
    $result = $unControleur->selectWhere($tab);
    $nbSliders = 3; 
   // var_dump($results);die;
    //foreach($results as $result)
?>
        <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
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
                            for ($i=1 ; $i <= $nbSliders ; $i++){
                                if ($i==1) $classactive2='class="item active"';
                                else        $classactive2 = ' ';
                                $tabsliders=array('idAssociation',$i);
                                $result = $unControleur->selectWhere($tabsliders);
                                echo '
                                <div '.$classactive2.'>
                                    <div class="col-sm-6">
                                        <h1><span>'.$result['name'].'</span></h1>
                                        <h2>Free E-AchatSolidaire</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="images/home/phototest.jpg" class="girl img-responsive" alt="" />
                                        <img src="images/home/pricing.png"  class="pricing" alt="" />
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
			</div>
		</div>
	</section><!--/slider-->