<?php
	include ("src/Controller/Controller.php");
?>
<!doctype html>
<html>
	<head>
		<title> SNCF </title>
		<meta charset ="UTF-8">
	</head>

	<body>
		<h1> Etat </h1>
		<br/>
		<a href='OutilTemporaireVueTables.php?page=10&table=association'> Liste des associations </a><br/>
		<a href='OutilTemporaireVueTables.php?page=11&table=categoryproduits'> Liste des categoryproduits </a><br/>
		<a href='OutilTemporaireVueTables.php?page=12&table=enseigne'> Liste des enseignes </a><br/>
		<a href='OutilTemporaireVueTables.php?page=13&table=pays'> Liste des pays </a><br/>
		<a href='OutilTemporaireVueTables.php?page=14&table=personne'> Liste des personnes </a><br/>
		<a href='OutilTemporaireVueTables.php?page=15&table=view_listeachats'> Liste des listeachats </a><br/>
		<a href='OutilTemporaireVueTables.php?page=16&table=view_listecategoryparenseigne'> Liste des view_listecategoryparenseigne </a><br/>
		<a href='OutilTemporaireVueTables.php?page=17&table=view_listecategoryparenseigne2'> Liste des view_listecategoryparenseigne2 </a><br/>
		<a href='OutilTemporaireVueTables.php?page=18&table=view_listedonsparutilisateur'> Liste des view_listedonsparutilisateur </a><br/>
		<a href='OutilTemporaireVueTables.php?page=19&table=view_listeenseignesettype'> Liste des view_listeenseignesettype </a><br/>
		<a href='OutilTemporaireVueTables.php?page=20&table=view_produitsparcategory'> Liste des view_produitsparcategory </a><br/>
		<a href='OutilTemporaireVueTables.php?page=21&table=view_produitsparcategoryenseigne'> Liste des view_produitsparcategoryenseigne </a><br/>
		<a href='OutilTemporaireVueTables.php?page=22&table=view_produitsparcategoryenseigne2'> Liste des view_produitsparcategoryenseigne2 </a><br/>
		<a href='OutilTemporaireVueTables.php?page=23&table=view_projetparpaysassoc'> Liste des view_projetparpaysassoc </a><br/>
		<a href='OutilTemporaireVueTables.php?page=24&table=view_projetparpaysassoc2'> Liste des view_projetparpaysassoc2 </a><br/>
		<br/><br/><br/><br/>

		<a href='OutilTemporaireVueTables_insert.php?page=4'> NON FAITInsérer Moyen T </a> </br>
				<br/>
		<a href='OutilTemporaireVueTables0_insert.php?page=5'> Supprimer Moyen T </a> </br>
				<br/>
		<a href='OutilTemporaireVueTables0_insert.php?page=6'> Update Moyen T </a> </br>

		<?php
	$page = (isset($_GET['page'])) ? $_GET['page'] : 0;
			 
	//instanciation de la classe Controleur 
	$unControleur = new Controller("localhost", "achat_util","root", "");

	

		switch ($page)
		{
			case 10||11||12||13||14||14||16||15||16||17||18||19||20||21||22||23||24:
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