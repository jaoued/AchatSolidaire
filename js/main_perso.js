//***************************************************************
//  mise a jour panier

function modificationPanier(libelle, idPanier) 
{
    select = document.getElementById(idPanier);
    choice = select.selectedIndex;console.log(choice);
    valeur = select.options[choice].value;
     $.ajax({
        	//url: "../include/gestionModifPanier.php",
           	url: "gestionModifPanier.php",
            type: "GET",
            data: {
                        "libelle": libelle,
                        "quantite": valeur
            },
           // dataType: 'html',
            success: function(result){
               // data=JSON.parse(result);
                
                console.log( result ); // le echo de ton fichier php
                location.reload(true);
 
            } 
           // document.location.reload(forcedReload);
        });    
}
//****************************************************************
	var msg='';
	

	function verifier_inscription() {
        //alert('test verifier_inscription');
		msg='';
		var rep=true;
       if (value_selectUserAssociation() === '')
        {
            alert ('Veuillez choisir votre statut');
            return false; 
            
        }        
       else 
        {
            if (value_selectUserAssociation() === 'asso')
            {
                
               
                if (!check_mot('nomAssociation', "Nom de l'association ")) rep=false;
                if (!check_mot('description', "Description de l'association  ")) rep=false;
           
            }
        
		if (!check_mot('nom', "Nom  ")) rep=false;
		if (!check_mot('prenom', "prenom  ")) rep=false;
		if (!check_mot('adresse', "adresse  ")) rep=false;
         
		if (!check_mot('code_postal', "code_postal  ")) rep=false;
		if (!check_mot('ville', "ville  ")) rep=false;
            //alert('debut verif standard10');
		if (!check_mail('mail')) rep=false;	
		if (!check_password('password')) rep=false;	
		if (!confirm_password('password','password2')) rep=false;	
		if (!check_tel('tel')) rep=false;	
            //alert('debut verif standard100');
		
		if(!rep) alert(msg);
        }
        //alert('fin verif formumaire')
		return rep;
	}
    
        

function check_tel(id) 
{
    var reptel = true;
    var valtel=document.getElementById(id).value;
    if (valtel.length != 10){
        msg+='Champ TEL doit avoir longueur de 10 digit\n';
        reptel= false;
    }

    if (isNaN(valtel)){
        msg+='Champ TEL doit etre numerique\n';
        reptel= false;
    }

    return reptel;
}

function check_mot(id,intitule) 
{
    if (document.getElementById(id).value == ""){
        msg+=intitule + ' est vide\n';
        return false;
    }
    else return true;
}

function check_mail(id) 
{	
    var repmail = true;	 

    //Vérification du mail s'il n'est pas vide on vérifie le . et @ 
    if (document.getElementById(id).value.length < 5)	
    {
        msg += "Le mail est incorrect - doit contenir au moins 5 caracteres \n";
        repmail=false;
    }	

    if (document.getElementById(id).value != "" && document.getElementById(id).value.length > 5)	
    {	
        var indexAroba = document.getElementById(id).value.indexOf('@');
        var indexPoint = document.getElementById(id).value.indexOf('.');
        //dans le cas ou pas de . ni d'@ modification couleur arrière plan du champ mail et un message d'alerte
        if ((indexAroba < 0) || (indexPoint < 0)){
            msg += "Le mail est incorrect - ne contient pas les carac necessaires : @ et . \n";
            repmail=false;
        }		
    }

    return repmail;			
}

function confirm_password(id, idconfirm) 
{
    var repconfpassword = true;	 
    //Vérification egalite

    if ( document.getElementById(id).value !==  document.getElementById(idconfirm).value){
        msg += "Les password ne sont pas identiques\n";
        repconfpassword = false;	
    }
    return repconfpassword;

} 


function check_password(id) 
{
    var reppassword = true;	 
    //Vérification longueur

    if ( document.getElementById(id).value.length < 6){
        msg += "La taille du mdp doit etre suêrieure ou egal a  6 digit\n";
        reppassword = false;	
    }	

    //Vérification contient chiffre
    var result=false;
    var i = 0;
    do {

      if (document.getElementById(id).value.indexOf(i) < 0 )
       i += 1;
      else {
            result=true;
            break;
            }
    } while (i < 10);
    if (!result){
        msg += "le password doit contenir un chiffre	\n";
        reppassword = false;
    }

    //Vérification contient Majuscule
    result=false;
    var maj = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    for(var i in maj)
    {
          if (document.getElementById("password").value.indexOf(i) >= 0 )
          {
              result=true;
              break;
          }
    }
    if (!result){
        msg += "le password doit contenir une Majuscule	\n";
        reppassword = false;	

    }

    return reppassword;
}	
		
	

    function value_selectUserAssociation(){
        var select = document.getElementById('UserAssociation');console.log(select);
            var choice = select.selectedIndex;console.log(choice);
			var valeur = select.options[choice].value;console.log(valeur)
			return valeur;
    }

	function selectUserAssociation() {

        var valeur=value_selectUserAssociation();
        if (valeur === 'asso' )
        {var classvisible='form-Association', classhidden='form-User', motAjout=' du Contact de l\'Association',motVotre='';}
        else if (valeur === 'user' ) {var classvisible='form-User', classhidden='form-Association', motAjout='', motVotre=' votre ';}
        var docClassesVisible = document.getElementsByClassName(classvisible);
        var docClassesHidden = document.getElementsByClassName(classhidden);
        var docClassesCommon = document.getElementsByClassName('form-Commun');
        var docClassesAssociation = document.getElementsByClassName('form-Association');
        var i,j;
        if (valeur !== ''){

            for ( i=0; i < docClassesVisible.length; i++){
                docClassesVisible[i].classList.remove('class-hidden');
                docClassesVisible[i].classList.add('class-visible');


            }

            for ( j=0; j<  docClassesHidden.length; j++){
                docClassesHidden[j].classList.remove('class-visible');
                docClassesHidden[j].classList.add('class-hidden');
            }
            for ( j=0; j<  docClassesCommon.length; j++){
                 docClassesCommon[j].classList.add('class-visible');
             docClassesCommon[j].classList.remove('class-hidden');
            }
            document.getElementById('nom-help-block').textContent='Entrer '+ motVotre + 'nom'+motAjout;
             document.getElementById('prenom-help-block').textContent='Entrer' + motVotre + 'prenom'+motAjout;
             document.getElementById('ville-help-block').textContent='Entrer '+ motVotre + 'Ville'+motAjout;
             document.getElementById('adresse-help-block').textContent='Entrer '+ motVotre + 'adresse'+motAjout;
             document.getElementById('code_postal-help-block').textContent='Entrer '+ motVotre + 'code postal'+motAjout;
             document.getElementById('mail-help-block').textContent='Entrer '+ motVotre + 'mail'+motAjout;

    }
    else {

        for ( j=0; j<  docClassesCommon.length; j++){
             docClassesCommon[j].classList.add('class-hidden');
            docClassesCommon[j].classList.remove('class-visible');
        }

        for ( j=0; j<  docClassesAssociation.length; j++){
             docClassesAssociation[j].classList.add('class-hidden');
            docClassesAssociation[j].classList.remove('class-visible');
        }
    }
}