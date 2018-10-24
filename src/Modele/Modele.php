<?php

class Modele
{
	//private $modele;
	private $pdo;
	private $table;

	public function __construct($server,$bdd,$user,$mdp)
	{
		$this->pdo = NULL;
		try
		{
			$this->pdo = new PDO ("mysql:host=".$server.";dbname=".$bdd, $user, $mdp);
		}
		catch (Execption $err)
		{echo "Erreur base de donnees";
		}
	}

	public function setTable($table)
	{ $this->table = $table;}

	public function selectAll($param)
	{	
		if ($param == 'database')
			$req= "show tables";
		else if ($param == 'colonnes')
			$req= "SHOW COLUMNS FROM  ".$this->table ;
		else
			$req= "select * from ".$this->table ;
		$resReq=$this->pdo->prepare ($req);
		$resReq->execute();
		return $resReq->fetchAll();
	}

	
	

		public function insert($tab)
		{
			//var_dump($tab);
		
			$donnees = array ();
			$champs = array (); 
			foreach ($tab as $cle => $valeur) 
			{
			echo 'clef : '. $cle . ' / valeur : '.$valeur;
			}
		

			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = ":".$cle ;
				$champs_ind[] = $cle;
				$donnees[":".$cle] = $valeur;
			}

			$chaine = implode(",", $champs);
			$chaine_ind = implode(",", $champs_ind);
		
			//insert into moyen_transport (name,heure_debut_service,heure_fin_service,nb_stations,type_transport_id) VALUES ( 'name',':heure_debut_service',':heure_fin_servie',':nb_stations',1);
			//$requete  = "insert into ".$this->table."  (null, ".$chaine."); ";
			$requete  = "insert into ".$this->table." (".$chaine_ind.") VALUES ( ".$chaine."); ";
			
			echo $requete;
			if ($this->pdo !=null)
			{
				$insert = $this->pdo->prepare ($requete);
				$insert->execute($donnees);
			}
			else
				return null;
		} 


		public function delete($tab)
		{

			$donnees = array ();
			$champs = array (); 
			

			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle." = :".$cle ;
				$donnees[":".$cle] = $valeur;
			}

			$chaineclause = implode(" and ", $champs);
			//$chaine_ind = implode(",", $champs_ind);
			$requete= "delete from ".$this->table. " where ".$chaineclause ;


			if ($this->pdo !=null)
			{
				$delete = $this->pdo->prepare ($requete);
				$delete->execute($donnees);
			}
			else
				return null;
		}

		public function update($tab,$where)
		{
			$donnees = array ();
			$champs = array (); 
			$clause = array (); 
			
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle." = :".$cle ;
				$donnees[":".$cle] = $valeur;
			}
			$chaineChamps = implode(",", $champs);
		
			foreach ($where as $cle => $valeur) 
			{
				$clause[] = $cle." = :".$cle ;
				$donnees[":".$cle] = $valeur;
			}
			$chaineClause = implode(" and ", $clause);

					$requete= "update ".$this->table. " set ".$chaineChamps." where ".$chaineClause.";" ;
			echo ' reuete Update :'.$requete;
			var_dump($donnees);
			if ($this->pdo !=null)
			{
				$delete = $this->pdo->prepare ($requete);
				$delete->execute($donnees);
			}
			else
				return null;
		}

		public function selectWhere($tab)
		{
        
			$donnees = array ();
			$champs = array (); 
			$clause = array (); 
			
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle." = :".$cle ;
				$donnees[":".$cle] = $valeur;
			}
			$chaineClause = implode(" AND ", $champs);
		
		
			$requete= "select * from ".$this->table. " where ".$chaineClause .";";
        	//echo ' reuete selectWhere :'.$requete;
			if ($this->pdo !=null)
			{
				$selectWhere = $this->pdo->prepare ($requete);
				$selectWhere->execute($donnees);
				$resultat= $selectWhere->fetch();
				return $resultat;
			}
			else
				return null;
		}

		public function selectCountWhere($tab)
		{
			$donnees = array ();
			$champs = array (); 
			$clause = array (); 
			
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle." = :".$cle ;
				$donnees[":".$cle] = $valeur;
			}
			$chaineClause = implode(" AND ", $champs);
		
		
			$requete= "select count(*) from ".$this->table. " where ".$chaineClause .";";
			$requete2= "select AVG(notes) from ".$this->table. " where ".$chaineClause .";";
			//echo ' reuete selectWhere :'.$requete;
			if ($this->pdo !=null)
			{
				$selectWhere = $this->pdo->prepare ($requete);
				$selectWhere->execute($donnees);
				$resultat= $selectWhere->fetch();
				$selectWhere = $this->pdo->prepare ($requete2);
				$selectWhere->execute($donnees);
				$resultat2= $selectWhere->fetch();
				$tabRes=array('count'=>$resultat, 'note'=>$resultat2);
			
				return $tabRes;
			}
			else
				return null;
		}
        
        public function select2CountWhere($tab)
		{
			$donnees = array ();
			$champs = array (); 
			$clause = array (); 
			
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle." = :".$cle ;
				$donnees[":".$cle] = $valeur;
			}
			$chaineClause = implode(" AND ", $champs);
		
		
			$requete= "select count(*) from ".$this->table. " where ".$chaineClause .";";
           
			
			//echo ' reuete selectWhere :'.$requete;
			if ($this->pdo !=null)
			{
				$selectWhere = $this->pdo->prepare($requete);
				$selectWhere->execute($donnees);
                $resultat= $selectWhere->fetch();
				return $resultat;
			}
			else
				return null;
		}


        public function selectWhereAll($tab)
		{
			$donnees = array ();
			$champs = array (); 
			$clause = array (); 
			
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle." = :".$cle ;
				$donnees[":".$cle] = $valeur;
			}
			$chaineClause = implode(" AND ", $champs);
		
		
			$requete= "select * from ".$this->table. " where ".$chaineClause .";";
			//echo ' reuete selectWhere :'.$requete;
			if ($this->pdo !=null)
			{
				$selectWhere = $this->pdo->prepare ($requete);
				$selectWhere->execute($donnees);
				$resultat= $selectWhere->fetchAll();
				return $resultat;
			}
			else
				return null;
		}

public function selectWhereAllLike($tabWhere, $tabLike)
{
   
    $donnees = array ();$champs = array (); $clause = array (); 
    $donneesLike = array ();$champsLike = array (); $clauseLike = array (); 

    foreach ($tabWhere as $cle => $valeur) 
    {
        $champs[] = $cle." = :".$cle ;
        $donnees[":".$cle] = $valeur;
    }

    foreach ($tabLike as $cle => $valeur) 
    {
        $champsLike[] = $cle." like '%".$valeur."%'"; 
        $donneesLike[":".$cle] = $valeur;
    }

    $chaineClause = implode(" AND ", $champs);
    $chaineClauseLike = implode(" OR ", $champsLike);

    if ($tabWhere['CategoryCategory'] == 'Toutes categories') 
    {
        if ( $tabLike['Produits'] == '') $chaineClause='';
        else               $chaineClause='';
         
    }
    else if ($tabWhere['CategoryCategory'] != 'Toutes categories')
    {
        if ( $tabLike['Produits'] == '') 
            $chaineClauseLike= '';
        
        else 
              $chaineClauseLike= ' AND ('.$chaineClauseLike.')';
    }

    $requete= "select * from ".$this->table. " where ".$chaineClause . " " .$chaineClauseLike .";";

    if ($this->pdo !=null)
    {
        $selectWhere = $this->pdo->prepare ($requete);
        //$selectWhere->execute($donnees.' AND '.$donneesLike);
        $selectWhere->execute($donnees);
        $resultat= $selectWhere->fetchAll();
        return $resultat;
    }
    else
        return null;
  }
    

    function SelectMaxId()
    {

                $select = $this->pdo->prepare("SELECT max(idPersonne) FROM personne"); 
                $select -> execute();
                $resultat = $select->fetch(); // recupere tous les enregistrements 
                return $resultat[0];

    }
}