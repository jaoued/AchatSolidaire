<?php

include 'src/Modele/Modele.php';

class Controller 
{
	private $modele;
	//private $table;
	public function __Construct ($server, $bdd, $user, $pass)
	{
		return $this->modele = new Modele($server, $bdd, $user, $pass);
	}

	public function setTable ($table)
	{ 
		$this->modele->setTable ($table);
	}

	public function selectAll ($param='tables')

	{ 
		 return $this->modele->selectAll($param);
	}
    
    public function insert ($tab)

	{ 

		echo 'ici controleur';

		var_dump($tab);
		 //$this->modele->insert($tab);
		 $this->modele->insert2($tab);
	}

	 public function delete ($tab)
	{ 
		//echo 'ici controleur';
		 //$this->modele->insert($tab);
		 $this->modele->delete($tab);
	}


	 public function update ($tab,$clause)
	{ 
		 $this->modele->update($tab, $clause);
	}

	public function selectWhere ($tab)
	{ 
		return  $this->modele->selectWhere($tab);
	}

    public function selectWhereAll ($tab)
	{ 
		return  $this->modele->selectWhereAll($tab);
	}
    
      public function selectWhereAllLike($tabWhere, $tabLike)
	{ 
		return  $this->modele->selectWhereAllLike($tabWhere, $tabLike);
	}

    
    
	public function selectCountWhere ($tab)
	{ 
		return  $this->modele->selectCountWhere($tab);
	}

    public function select2CountWhere ($tab)
	{ 
		return  $this->modele->select2CountWhere($tab);
	}
   
    public function SelectMaxId ()
	{ 
		return  $this->modele->SelectMaxId();
	}

        
}