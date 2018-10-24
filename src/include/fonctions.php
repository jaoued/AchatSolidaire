<?php

session_start();
include ('src/include/fonctionsPanier.php');
include ('src/include/fonctionsWishlist.php');
include ('src/include/fonctionsProjet.php');

//a supprimer
     /*$page = (isset($_GET['page'])) ? $_GET['page'] : 0;
                                switch ($page)
                                {
                                    case 1:
                                        echo 'page1';
                                        break;
                                         case 2:
                                        echo 'page2';
                                        break;
                                          case 3:
                                        echo 'page3';
                                        break;
                                    default : echo 'defaul2222222222t';
                                      
                                    
                                } */

//Initialisation des messages en en-tete
$message_affiche='';$message_erreur_title='';$message_erreur_connexion='';

include_once('src/Controller/Controller.php');
$unControleur = new Controller("localhost", "achat_util","root", "");


	
if(isset($_POST['inscription_submit'])) {
   
    var_dump('titi');
    $maxId=$unControleur->selectMaxid();
    $maxId++;
    if (isset ($_POST['avatar']))
    {
    
    $newPhoto=$maxId.'.jpg';
    $repAvatar='D:/ProgramsFiles/wamp/www/AchatSolidaire/images/avatar/'.$newPhoto;
    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$repAvatar);
    
    if ($resultat)  $_POST['avatar']=$repAvatar;
        var_dump('titi2');
        var_dump($_POST['avatar']);
     $_POST['avatar']=str_replace("D:/ProgramsFiles/wamp/www","http://localhost",$_POST['avatar']);
    }
    else $_POST['avatar']='http://localhost/AchatSolidaire/images/avatar/defaut.png';
    
    var_dump($_POST);
    if (isset($tabsso))        unset ($tabsso);
    if (isset($tabssoContact))        unset ($tabssoContact);
    
  
    if (isset($_POST['UserAssociation']) && $_POST['UserAssociation'] == 'asso')
    {
        if (isset($_POST['description']))
        {
            $tabasso['description_courte']=$_POST['description'];
            $tabasso['description']=$_POST['description'];
            unset ($_POST['description']);   
        }
        if (isset($_POST['nomAssociation']))
        {
            $tabasso['nomAssociation']=$_POST['nomAssociation'];
            unset ($_POST['nomAssociation']);   
        }
        $tabasso['Assoc_Contact_idAssoc_Contact']=$maxId;
        $tabasso['Assoc_Contact_Personne_idPersonne']=$maxId;
        $tabassoContact['Personne_idPersonne']=$maxId;
        $tabassoContact['idAssoc_Contact']=$maxId;
        
        
    }
    unset ($_POST['UserAssociation']);
    unset ($_POST['inscription_submit']);
    unset ($_POST['password2']);
   
    /*
    var_dump($tabasso);
    var_dump($_POST);
    $unControleur->setTable("personne");
    $unControleur->insert($_POST);
    */
     if (isset($_POST['description']))         unset($_POST['description']);
     if (isset($_POST['name']))         unset($_POST['name']);

    $unControleur->setTable("personne");
    $unControleur->insert($_POST);
    var_dump($tabasso);
    var_dump($tabassoContact);
     if (isset($tabasso))       
     {
         var_dump('OK1');
        $unControleur->setTable("assoc_contact");
        $unControleur->insert($tabassoContact);
          var_dump('OK2');
        $unControleur->setTable("association");
        $unControleur->insert($tabasso);
            var_dump('OK3');die;
     }
    //var_dump($_POST);
    
    $message_affiche='Inscription effectuee / Vous pouvez vous connecter';
   
}							

if(isset($_POST['contact_submit'])) 	
                  {	$result=myinsert("message_contact",$_POST); $message_affiche="message envoyé / Nous prenons en compte votre demande"; }		

if(isset($_POST['deconnexion_submit'])) 
                  {	session_destroy();header('Location: index.php');	}

if(isset($_GET['logout'])  ) {	//echo 'ok logout'; //session_destroy();
                                unset($_SESSION['prenom']);
                                header('Location: index.php');	
                             }

if(isset($_POST['connexion_submit'])) 	
                      {
                      	$unControleur->setTable('personne');
                      	$tabLogin=['mail'=>$_POST['emailLogin'],'password'=>$_POST['paswordLogin']];
                      	$result = $unControleur->selectWhere($tabLogin);
                      		//var_dump($result);
                      	if (count($result) > 0)				
                      	{ 	$_SESSION['prenom']= $result['prenom'];$_SESSION['email']= $result['mail'];
                      		$_SESSION['avatar']= $result['avatar'];$_SESSION['status']= $result['status'];
                      				//var_dump($_SESSION);
                      				header('Location: index.php');
                      	}
                      	else 	$message_erreur_connexion='Erreur de connexion';
                      }






//-------- fonction insert ----------------
function myinsert($table,$tab)
{
	

	// suppression du dernier element qui est la valeur du bouton
	//end($tab); unset($tab[key($tab)]);
	unset ($tab['inscription_submit']);

	$tab['avatar']=str_replace("D:/ProgramsFiles/wamp/www","http://localhost",$tab['avatar']);
	//var_dump($tab);
    $unControleur->setTable($table);
    $unControleur->insert($tab);
	
	
	
		
}


if(isset($_GET['ajoutPanierTest'])  ) { 
                echo 'AjoutPanierTest ok';die; }


//-------- fonction verif type string ----------------
function check_data($nom_du_champ,$valeur_champ,$type,$taillemin,$taillemax,$champ_obligaoire,$valeur_champ_mini=1)
{	$message_erreur_title='';
	
	$taille_champ = strlen($valeur_champ);
	if ($champ_obligaoire == 'yes' && $taille_champ == 0 ) {$message_erreur_title.="Champ : $nom_du_champ  vide => champ obligatoire <br>";return $message_erreur_title;}
	if ($champ_obligaoire == 'no' && $taille_champ == 0 ) {return $message_erreur_title='';}
	elseif ($taille_champ < $taillemin) $message_erreur_title.="Champ : $nom_du_champ => Taille trop petite <br>";
	elseif ($taille_champ > $taillemax) $message_erreur_title.="Champ : $nom_du_champ => Taille trop grande <br>";
	if (! $type($valeur_champ))	$message_erreur_title.="Champ : $nom_du_champ => Mauvais type  <br>";
	if ($type == 'is_numeric')
		if($valeur_champ < $valeur_champ_mini) $message_erreur_title.="Champ : $nom_du_champ => Valeur trop faible <br>";
	return $message_erreur_title;
}

//-------- fonction verif donnees usagers ----------------
function check_form($table,$tabs)
{
		$message_erreur_title='';
		$message_erreur=check_data('nom',$tabs['nom'],"is_string",2,20,'yes'); $message_erreur_title.=$message_erreur;
		$message_erreur=check_data('prenom',$tabs['prenom'],"is_string",2,20,'yes');$message_erreur_title.=$message_erreur;
	if ($table == 'usagers')
	{
		$message_erreur=check_data('age',$tabs['age'],"is_numeric",1,2,'yes');$message_erreur_title.=$message_erreur;
		$message_erreur=check_data('password',$tabs['password'],"is_string",2,20,'yes');$message_erreur_title.=$message_erreur;
		if ($tabs['password'] != $tabs['passwordConfirm']) $message_erreur_title.="Champ : Password => les MDP ne correspondent pas<br>";
		$message_erreur=check_data('tel_protable',$tabs['tel_protable'],"is_numeric",10,20,'no');$message_erreur_title.=$message_erreur;
	}

	return $message_erreur_title;

}




?>