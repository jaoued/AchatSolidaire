<?php 
    include ('includehtml/header.php');

   
    

?>	
	<section id="form"><!--form-->
	

		<form action='#' class="form-horizontal" method='post' onsubmit="return verifier_inscription();" onreset="return confirm('Voulez-vous vraiment annuler ?');" enctype="multipart/form-data">


		
		<!-- Select Basic -->
		<div class="form-group" >
		  <label class="col-md-4 control-label" for="selectbasic">Votre statut</label>
		  <div class="col-md-4">
		    <select id="UserAssociation" name="UserAssociation" class="form-control" onchange="selectUserAssociation()">
		      <option value="" selected >Choisir votre statut </option>
		      <option value="asso">Une association </option>
		      <option value="user" >Un particulier</option>
		    </select>
		  </div>

		</div>

				<!-- Text input-->
		<div class="form-group form-Association class-hidden">
		  <label class="col-md-4 control-label" for="code_postal">Nom association :</label>  
		  <div class="col-md-4">
		  <input id="nomAssociation" name="name" type="text" placeholder="Entrer le nom de l'association" class="form-control input-md" >
		  <span class="help-block" id='noma-help-block'>Entrer Nom Association </span>  
		  </div>
		</div>
	
		
		<!-- Text input	-->
		<div class="form-group form-Association  class-hidden">
		  <label class="col-md-4 control-label" for="description" >Description de l'association : </label>  
		  <div class="col-md-4">
		  <input id="description" name="description" type="text" placeholder="Entrer description de l'association" class="form-control input-md" >
		  <span class="help-block" id='description-help-block'>Description Association</span>  
		  </div>
		</div>
		<!-- Text input	
		<div class="form-group form-Association  class-hidden">
		  <label class="col-md-4 control-label" for="Date creation" >Date creation de l'association : </label>  
		  <div class="col-md-4">
		  <input id="Date creation" name="date_creation" type="date" placeholder="Entrer date creation Association" class="form-control input-md" >
		  <span class="help-block" id='Date creation-help-block'>Date creation Association</span>  
		  </div>
		</div>
		-->
	

		<!-- Text input-->
		<div class="form-group form-Commun ">
		  <label class="col-md-4 control-label" for="nom">Nom :</label>  
		  <div class="col-md-4">
		  <input id="nom" name="nom" type="text" placeholder="Entrer votre nom" class="form-control input-md" >
		  <span class="help-block" id='nom-help-block'>Saisir Votre Nom</span>  
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="prenom">Prenom :</label>  
		  <div class="col-md-4">
		  <input id="prenom" name="prenom" type="text" placeholder="Entrer votre Prenom " class="form-control input-md" >
		  <span class="help-block" id='prenom-help-block'>Entrer votre Prenom </span>  
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="adresse">Adresse :  </label>  
		  <div class="col-md-4">
		  <input id="adresse" name="adresse" type="text" placeholder="Entrer votre Adresse" class="form-control input-md" >
		  <span class="help-block" id='adresse-help-block'>Entrer votre Adresse </span>  
		  </div>
		</div>

		

		<!-- Text input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="code_postal">Code Postal :</label>  
		  <div class="col-md-4">
		  <input id="code_postal" name="code_postal" type="text" placeholder="Entrer votre  Code Postal" class="form-control input-md" >
		  <span class="help-block" id='code_postal-help-block'>Entrer votre  Code Postal</span>  
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="ville">Ville : </label>  
		  <div class="col-md-4">
		  <input id="ville" name="ville" type="text" placeholder="Entrer votre ville" class="form-control input-md" >
		  <span class="help-block" id='ville-help-block'>Entrer votre ville</span>  
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="mail">mail : </label>  
		  <div class="col-md-4">
		  <input id="mail" name="mail" type="text" placeholder="Entrer votre mail" class="form-control input-md" >
		  <span class="help-block" id="mail-help-block">Entrer votre mail</span>  
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="tel">Telephone : </label>  
		  <div class="col-md-4">
		  <input id="tel" name="tel" type="text" placeholder="Entrer votre Telephone" class="form-control input-md" >
		  <span class="help-block" id="tel-help-block">Entrer votre Telephone</span>  
		  </div>
		</div>
        
        	<!-- Text input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="tel">Avatar : </label>  
		  <div class="col-md-4">
		  <input id="avatar" name="avatar" type="file" placeholder="Choisir votre Avatar" class="form-control input-md" >
		  <span class="help-block" id="tel-help-block">Choisir votre Avatar</span>  
		  </div>
		</div>

			<!-- Password input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="password">Mot de passe</label>
		  <div class="col-md-4">
		    <input id="password" name="password" type="password" placeholder="Entrer Password " class="form-control input-md" >
		    <span class="help-block ">Entrez un mot de passe</span>
		  </div>
		</div>

		<!-- Password input-->
		<div class="form-group form-Commun">
		  <label class="col-md-4 control-label" for="password2">Confirmer mot de passe</label>
		  <div class="col-md-4">
		    <input id="password2" name="password2" type="password" placeholder="Confirmer Password " class="form-control input-md" >
		    <span class="help-block">Confirmer mot de passe </span>
		  </div>
		</div>



			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="button1id"></label>
			  <div class="col-md-8">
			  	
		    <input class="btn btn-success" type="submit" name='inscription_submit' value="Valider">
			<input class="btn btn-danger" type="reset" value="Annuler">
			  </div>
			</div>
	
		
		</form>


	</section><!--/form-->
	
<?php include ('includehtml/footer.php'); ?>