<?php
	include ("src/Controller/Controller.php");
?>
<!doctype html>
<html>
	<head>
		<title> Vue tables </title>
		<meta charset ="UTF-8">
	</head>

	<body>
		<h1> Etat </h1>
		<br/>
		<a href='OutilTemporaireVueTables.php?page=10&table=association'>  table association </a><br/>
		<a href='OutilTemporaireVueTables.php?page=26&table=view_associationcontact '> table  view_associationcontact   </a><br/>
		<a href='OutilTemporaireVueTables.php?page=27&table=mediasassociation '> table  mediasassociation   </a><br/>
		<br>
		
		<a href='OutilTemporaireVueTables.php?page=32&table=CategoryCategory'>  table CategoryCategory </a><br/>
		<a href='OutilTemporaireVueTables.php?page=33&table=view_CategoryCategoryProduits '>  table view_CategoryCategoryProduits  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=11&table=categoryproduits'>  table categoryproduits </a><br/>
		<a href='OutilTemporaireVueTables.php?page=16&table=view_listecategoryparenseigne'> table  view_listecategoryparenseigne </a><br/>
		<a href='OutilTemporaireVueTables.php?page=17&table=view_listecategoryparenseigne2'> table  view_listecategoryparenseigne2  </a><br/>
	
		<br>
		<a href='OutilTemporaireVueTables.php?page=20&table=view_produitsparcategory'> table  view_produitsparcategory  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=21&table=view_produitsparcategoryenseigne'> table  view_produitsparcategoryenseigne  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=22&table=view_produitsparcategoryenseigne2'> table  view_produitsparcategoryenseigne2  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=30&table=view_ProduitsAllEnsignesCategory '>   table view_ProduitsAllEnsignesCategory </a><br/>
		<a href='OutilTemporaireVueTables.php?page=31&table=view_notesProduits  '>   table view_notesProduits  </a><br/>
		<br>
		<a href='OutilTemporaireVueTables.php?page=12&table=enseigne'>   table enseigne</a><br/>
		<a href='OutilTemporaireVueTables.php?page=19&table=view_listeenseignesettype'> table  view_listeenseignesettype  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=28&table=mediasenseigne '> table  mediasenseigne  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=29&table=view_enseignetypecontact '> table  view_enseignetypecontact   </a><br/>
		<br>
		<a href='OutilTemporaireVueTables.php?page=13&table=pays'> table pays </a><br/>
		<br>
		<a href='OutilTemporaireVueTables.php?page=14&table=personne'>   table personne  </a><br/>
		<br>
		<a href='OutilTemporaireVueTables.php?page=15&table=view_listeachats'>   table view_listeachats</a><br/>
		<br>
		<a href='OutilTemporaireVueTables.php?page=18&table=view_listedonsparutilisateur'> table  view_listedonsparutilisateur  </a><br/>
		

		<br>
		<a href='OutilTemporaireVueTables.php?page=23&table=view_projetparpaysassoc'> table  view_projetparpaysassoc  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=24&table=view_projetparpaysassoc2'> table  view_projetparpaysassoc2  </a><br/>
		<a href='OutilTemporaireVueTables.php?page=25&table=view_projetparpaysparasso'> table  view_projetparpaysparasso  </a><br/>
		
		<br/><br/><br/><br/>

		<!--
		<a href='OutilTemporaireVueTables_insert.php?page=4'> NON FAITInsérer Moyen T </a> </br>
				<br/>
		<a href='OutilTemporaireVueTables0_insert.php?page=5'> Supprimer Moyen T </a> </br>
				<br/>
		<a href='OutilTemporaireVueTables0_insert.php?page=6'> Update Moyen T </a> </br>
		-->

		<?php
	$page = (isset($_GET['page'])) ? $_GET['page'] : 0;
			 
	//instanciation de la classe Controleur 
	$unControleur = new Controller("localhost", "achat_util","root", "");

	

		switch ($page)
		{
			case 10||11||12||13||14||14||16||15||16||17||18||19||20||21||22||23||24||25|| 26|| 27|| 28 || 29|| 30 || 31||32 || 33:
			$table = $_GET['table'];
			//var_dump($table);
			$unControleur->setTable($table);
			$resultats = $unControleur->selectAll();
			include ("vue/vueAll.php");
			break;

	
				
			case 2 :
			$unControleur->setTable("etat_types");
			$resultats = $unControleur->selectAll();
			include ("vue/vueTypeTransport.php");
			break;

			case 3 :
			$unControleur->setTable("trajets");
			$resultats = $unControleur->selectAll();
			include ("vue/vueTrajets.php");
			break;

			case 4 : 
			$unControleur->setTable("type_transport");
			$lesTypes =  $unControleur->selectAll();
			include ("vue/vueInsertMoyen.php");
			$unControleur->setTable("moyen_transport");
			if (isset($_POST['valider']))
			{
				$tab = array (
					"name"=>$_POST['name'], 
					"heure_debut_service"=>$_POST['heureService'],
					"heure_fin_service"=>$_POST['heureFinService'],
					"nb_stations"=>$_POST['nbStations'],
					"type_transport_id"=>$_POST['idType']
					);
				$unControleur->insert($tab);
				echo 'fin';
			}
			break;
		 

			case 5: 
			$unControleur->setTable("moyen_transport");
			$resultats = $unControleur->selectAll();
			//var_dump($resultats);die;
			include ("vue/vueMoyensTransport.php");
			include ("vue/vuedeleteMoyen.php");
			$unControleur->setTable("moyen_transport");
			if (isset($_POST['supprimer']))
			{
				$tab = array (   "name"=>$_POST['name']	);

				$unControleur->delete($tab);
				echo 'SUppression OK';
			}
			break;


			case 6 : 
			$unControleur->setTable("moyen_transport");
			$resultats =  $unControleur->selectAll();
			include ("vue/vueMoyensTransport.php");
			include ("vue/vueDeleteMoyen.php");
			
			if (isset($_POST['supprimer']))
			{
				$tab = array (	"name"=>$_POST['name']		);
				$resultat=$unControleur->selectWhere($tab);
				
			
				$unControleur->setTable("type_transport");
				$lesTypes =  $unControleur->selectAll();

				include ("vue/vueInsertMoyen.php");
			}

			if (isset($_POST['valider']))
			{
				$unControleur->setTable("moyen_transport");
				$tabPost = array (
					"name"=>$_POST['name'], 
					"heure_debut_service"=>$_POST['heureService'],
					"heure_fin_service"=>$_POST['heureFinService'],
					"nb_stations"=>$_POST['nbStations'],
					"type_transport_id"=>$_POST['idType']
					);
				$clause = array('id'=> $resultat['id']);
				echo 'POST DEBUT';
				var_dump($clause);
				var_dump($tabPost);
				echo 'POST FIN';
				
				$unControleur->update($tabPost,$clause);
				echo 'MAJ OK';
			}
			break;
		 
		}
		?>

		
	</body>
</html>