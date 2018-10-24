<?php 
	include ("src/include/configuration.php");
	include ("src/include/fonctions.php");
  
   
     $nomDuSite='Solidaireachat';
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
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
									
                                					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li class="dropdown"><a href="#">Boutique<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php"?category=1>Les produits</a></li>
										<li><a href="panier.php">Panier</a></li> 
										<li><a href="login.php">Connexion</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="blog.php">Blog<i class="fa fa-angle-down"></i></a></li> 
								<li class="dropdown"><a href="#">Projets<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                       <?php
											$unControleur->setTable('projet');
											$results = $unControleur->selectAll();
											foreach($results as $result)
											echo '<li><a href="projet.php?projet='.$result['idProjet'].'">'.$result['Projet'].'</a></li>';
										?>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Associations<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        	<?php
											$unControleur->setTable('association');
											$results = $unControleur->selectAll();
											foreach($results as $result)
											echo '<li><a href="association.php?association='.$result['idAssociation'].'">'.$result['name'].'</a></li>';
										?>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Enseignes<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<?php
											$unControleur->setTable('enseigne');
											$results = $unControleur->selectAll();
											foreach($results as $result)
												echo '<li><a href="enseigne.php?enseigne='.$result['idEnseigne'].'">'.$result['enseigne'].'</a></li>';
										?>
										
                                    </ul>
                                </li>
								
							</ul>
						</div>
					
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li> 
								-->
							
								
								<li><a href="wishlist.php"><i class="fa fa-heart-o"></i> wishlist <?php echo (CompterArticlesWishlist())? '('.CompterArticlesWishlist().')' :'';   ?></a></li>
								
								<li><a href="panier.php"><i class="fa fa-shopping-cart"></i> Panier <?php  echo (CompterTotaliteArticles())? '('.CompterTotaliteArticles().')' :'';   ?></a></li>
	
							<?php
										
									if (!isset ($_SESSION['prenom'])) 
										echo '<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
											<li><a href="inscription.php"><i class="fa fa-lock"></i> inscription</a></li>';	
									else 
										echo '
				
							                 <li><a href="index.php?logout=1"><i class="fa fa-sign-out"></i> Logout</a></li>
											<li><a href="#"><i class="fa fa-user"></i>'.$_SESSION['prenom'].'</a>
                                                <ul>
                                                    <li>
                                                <img src="'.$_SESSION["avatar"].'" height="100" />
                                                    </li>
                                                </ul>
                                            </li>';
								?>
								<li><a href="contact.php"><i class="fa fa-envelope"></i>Contact</a></li>
							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					
					<div class="col-sm-3">
					    <div class="logo pull-left">
                                    <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                                    	<li><a href='#'> <?php echo (verifProjet())?  "<i class=\"fa fa-heart-o\"></i> ".$_SESSION['projet']:'';   ?></a></li>
                         </div>
	                </div>
					
										
					
					<div class="col-sm-9">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                    
                                    <form action="shop.php" method='GET'>
                                <select name='category' class="col-sm-5">
                                    '<option selected >Toutes categories</option>'; 
							    <?php
                                    $unControleur->setTable('CategoryCategory');
	                                $resultsCat = $unControleur->selectAll();
								   
                                    foreach ($resultsCat as $resultCat)
								        echo '<option >'.$resultCat['CategoryCategory'].'</option>'; 
                   
                                ?>
                                </select>
								
								<input type="text" name="search" size="8" placeholder='Recherche'>
								<input type="submit" value="Rechercher">
							
							        </form>							
								
								</ul>
						</div>
						
					
						
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		
		
	
	</header><!--/header-->
