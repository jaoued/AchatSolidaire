<?php include ('includehtml/header.php'); ?>	

		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-2 center">
					<div class="login-form"><!--login form-->
						<h2>Connexion a votre compte</h2>
						<p><a href="inscription.php">Vous n'avez pas encore de compte</a></p>
						<form action="#" method='post' onsubmit="return verifier_connexion_submit(this);" onreset="return confirm('Voulez-vous vraiment annuler ?');" enctype="multipart/form-data">
							
							<input type="email" placeholder="Adresse e-mail" name='emailLogin' />
							<input type="text" placeholder="Mot de passe" name='paswordLogin' />
							<span>
								<input type="checkbox" class="checkbox"> 
								Rester connecté
							</span>
							<button type="submit" name="connexion_submit" id='connexion_submit' class="btn btn-default">Connexion</button>
							<?php // echo '<p class="erreur">'.$message_erreur_connexion .'</p>'; ?>
						</form>
					</div><!--/login form-->
				</div>
				
		</div><br><br><br><br><br>

	
<?php include ('includehtml/footer.php'); ?>