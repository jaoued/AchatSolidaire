<?php 
	include ("src/include/configuration.php");
	include ("src/include/fonctions.php");
  
   
     $nomDuSite='1Don1Achat';
    $title=ucfirst(str_replace(".php","",str_replace("/AchatSolidaire/","",$_SERVER['PHP_SELF'])));
   
    if ( $title === 'Index')  $title='Home | '.$nomDuSite;

    $ContactnomDuSite=$nomDuSite.'.fr';

    //gestion pour avoirbloc commun contenu page shop
    if ($_SERVER['PHP_SELF'] == '/AchatSolidaire/shop.php')
    {   if (! isset ($_GET['souscategory']) && ! isset ($_GET['category']) )   header('Location: index.php');
    }

     if ($_SERVER['PHP_SELF'] == '/AchatSolidaire/product-details.php')
    	if (! isset ($_GET['produit']) || ! isset ($_GET['enseigne'])) header('Location: index.php');  // sipas de param dans l url
		
  
     
		 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/home/logo2.png">
    <title><?php echo $title ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">  
	<link href="css/mainPerso.css" rel="stylesheet">  
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="container-fluid header_top0"><!--container-fluid-->
		<div class="row">
			<div class="col-sm-1">
				<div class="logo pull-left">
					<a href="index.php" id='logo'><img  height=140 src="images/home/logo2.png" alt="" /></a>	
				 </div>
				 
			</div>
			<div class="col-sm-6" id='barrerecherche' >
							<br><br>

								<form action="shop.php" method='GET'  >
									<select class='selectlongueur select2' name='category' >
										<option selected >Toutes categories</option> 
									<?php
										$unControleur->setTable('CategoryCategory');
										$resultsCat = $unControleur->selectAll();
									   
										foreach ($resultsCat as $resultCat)
											echo '<option >'.$resultCat['CategoryCategory'].'</option>'; 
									?>
									</select>
									
									<input class='input2' type="text" name="search" size="62"  placeholder='              Recherche'>		
									<input type="submit" value="Rechercher">
								</form>	
							

									
			</div>
			<div class="col-sm-3 fondblanc">
						<br><br>
						<div >
							<ul class="nav nav-pills">
				
								<div class="mainmenu fondblanc">

									<ul class="nav navbar-nav collapse navbar-collapse ">

										<?php
				
											if (!isset ($_SESSION['prenom'])) 
												echo '<li class="dropdown fondblanc"><i class="fa fa-user" aria-hidden="true"><a href="login.php" class="fondblanc">. Mon Compte</a></i>
														<ul role="menu" class="sub-menu">
															<li><a href="login.php">Login</a></li>
															<li><a href="inscription.php">Insription</a></li> 
											
														</ul>
													</li> ';
											else 
												echo '<li class="dropdown"><i class="fa fa-user" aria-hidden="true"><a href="#">. ' .$_SESSION['prenom'].'</a></i>
														<ul role="menu" class="sub-menu">
															<li><a href="informationspersonnelles.php">Informations personnelles</a></li>
															<li><a href="historique_des_commandes.php">Vos commandes</a></li> 
															<li><a href="liste_envie.php">Votre liste d\'envies</a></li> 
															 
															<li><a href="credit.php">Gérer votre compte credit</a></li> 
															<li><a href="index.php?logout=1">Déconnexion</a></li>
														</ul>
													</li> ';
											
											?>
											
										<li class=" fondblanc"><a href="panier.php"><i class="fa fa-shopping-cart ">.  Panier <?php  echo (CompterTotaliteArticles())? '('.CompterTotaliteArticles().')' :'';   ?></a></i> 
											
										</li>
										<li><a href="wishlist.php"><i class="fa fa-heart-o"></i> wishlist <?php echo (CompterArticlesWishlist())? '('.CompterArticlesWishlist().')' :'';   ?></a></li>
										
										
											
											
									</ul>
								
								</div>
						
							</ul>
					</div>
			</div>
			
			
			<div class="col-sm-9">
								
							<div>
								<ul class="nav nav-pills">
											
									
								

										<ul class="nav navbar-nav collapse navbar-collapse" >
											
											<li ><a href="#" class='supcontour'><button type="button" class="btn-default input3 input0"> Les categories</button>	</a>
											
												<ul role="menu" class="sub-menu">
													<?php
														
													   
														foreach ($resultsCat as $resultCat)
														
															echo '<li><a href="shop.php?idCategoryCategory='.$resultCat['CategoryCategory'].'&amp;search=yes">'.$resultCat['CategoryCategory'].'</a></li>';
															
													?>
													
												</ul>
											</li> 
										
								
											<li class="dropdown contactinfo2"><a href="shop.fr"><button type="button" class="btn-default input3"> Les Bons Plans</button>	</a> 
												
											</li>
												
							
											<li class="dropdown"><a href="#"><button type="button" class="btn-default input3"> La Boutique</button>	</a>
												<ul role="menu" class="sub-menu">
													<li><a href="shop.php"?category=1>Les produits</a></li>
													<li><a href="panier.php">Panier</a></li> 
													<li><a href="login.php">Connexion</a></li> 
												</ul>
											</li> 
											<li class="dropdown"><a href="blog.php"><button type="button" class="btn-default input3"> Le Blog</button>	</a></li> 
											<li class="dropdown"><a href="#"><button type="button" class="btn-default input3"> Les Projets</button>	</a>
												<ul role="menu" class="sub-menu">
												   <?php
														$unControleur->setTable('projet');
														$results = $unControleur->selectAll();
														foreach($results as $result)
														echo '<li><a href="projet.php?projet='.$result['idProjet'].'">'.$result['Projet'].'</a></li>';
													?>
												</ul>
											</li> 
											<li class="dropdown"><a href="#"><button type="button" class="btn-default input3"> Les Associations</button>	</a>
												<ul role="menu" class="sub-menu">
														<?php
														$unControleur->setTable('association');
														$results = $unControleur->selectAll();
														foreach($results as $result)
														echo '<li><a href="association.php?association='.$result['idAssociation'].'">'.$result['name'].'</a></li>';
													?>
												</ul>
											</li> 
											<li class="dropdown"><a href="#"><button type="button" class="btn-default input3"> Les Enseignes</button>	</a>
												<ul role="menu" class="sub-menu">
													<?php
														$unControleur->setTable('enseigne');
														$results = $unControleur->selectAll();
														foreach($results as $result)
															echo '<li><a href="enseigne.php?enseigne='.$result['idEnseigne'].'">'.$result['enseigne'].'</a></li>';
													?>
													
												</ul>
											</li>
										
											
											
												<li ><a href="#" class='fondblanc2'><i class="fa fa-facebook fondblanc"></i></a></li>
											<li ><a href="#"  class='fondblanc2'><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class='fondblanc2'><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#" class='fondblanc2'><i class="fa fa-dribbble"></i></a></li>
											<li><a href="#" class='fondblanc2'><i class="fa fa-google-plus"></i></a></li>
										</ul>
									</div>
							
								</ul>
						</div>
				</div>
				
			</div>			
								
						<!--<div class="col-sm-4 pull-righ">
							<br><br>
						 <?php 
							
							//echo (verifProjet())?  " <i class=\"fa fa-heart-o  majuscule\">PROJET COUP DE COEUR :  <a  href=projet.php?projet=".$_SESSION['idprojet'].">".$_SESSION['projet']."</a></i>"  :" <i class=\"fa fa-heartbeat  majuscule ecrirerouge\" aria-hidden=\"true\">  <a  href=listeprojet.php>N'oubliez de choisir votre projet Coup de coeur</a></i>";   ?>
																												 
								
							
						</div> -->
						
				
		</div>
	</div>	
		
		
	
		
		
	
	</header><!--/header-->
