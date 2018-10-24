<?php include ('includehtml/header.php'); ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Reglgment</li>
				</ol>
			</div><!--/breadcrums-->
    
<?php 
    if(!isset ($_SESSION['prenom'])) //include('reglement_enregistrement.php'); 
        echo '<a href="login.php">Veuillez vous connecter pourprocéder au paiement</a>'
            
?>
    
			<div class="step-one">
				<h2 class="heading">Mode de paiement</h2>
				<div class="payment-options">
					<span>
						<label><input type="checkbox"> Carte Bancaire</label>
					</span>
					<span>
						<label><input type="checkbox"> Cheque</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
			</div>
			
			
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Coordonnnees bancaires</p>
							<form>
								<input type="text" placeholder="Titulaire de la carte bancaire">
								<input type="text" placeholder="Numero de la carte bancaire">
								<input type="text" placeholder="Cryptogramme">
								<input type="text" placeholder="date de validite MM/AAAA">
								
								<a class="btn btn-primary" href="">Valider</a>
							    <a class="btn btn-primary" href="">Annuler</a>
							</form>
							
						</div>
					</div>
                   <div class="col-sm-4">
						<div class="order-message">
							<p>Besoin particulier? </p>
							<textarea name="message"  placeholder="Consigner ici vos demandes (détail sur la livraison ...)" rows="16"></textarea>
							<label><input type="checkbox"> Je confirme mes données </label>
						</div>	
					</div>
                </div>
            </div>
            
			

			
		</div>
	</section> <!--/#cart_items-->

	
<?php include ('includehtml/footer.php'); ?>