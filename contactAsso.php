<?php include ('includehtml/header.php'); ?>
<?php
						
	$tab=array('idPersonne'=>$_GET['contact']);	

	$unControleur->setTable('personne');
	$results = $unControleur->selectwhere($tab);
	
	/*
	var_dump($_SESSION);die;
	 'prenom' => string 'Abraham' (length=7)
  'email' => string 'test@test.fr' (length=12)
  'avatar' => string 'http://localhost/AchatSolidaire/images/avatar/man.png' (length=53)
  'status' => string 'user' (length=4)
  */
?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contactez <strong>Nous</strong></h2>    			    				    				
					<!--<div id="gmap" class="contact-map">	</div>-->
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Laissez nous un message</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" value='<?php echo (isset($_SESSION['prenom']))?$_SESSION['prenom']:''; ?>'>
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required"  value='<?php  echo (isset($_SESSION['prenom']))?$_SESSION['email']:''; ?>'>
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
						<?php echo " 
	    					<p>".$results['prenom']."  ".$results['nom']."</p>
							<p>".$results['adresse']."</p>
							<p>".$results['code_postal'].", ".$results['ville'].", ".$results['prenom'].".</p>
							<p> FRANCE</p>
							
							<p>Tel:". $results['tel'] ."</p>
							<p>Email: ".$results['mail']."</p>";
						?>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<?php include ('includehtml/footer.php'); ?>