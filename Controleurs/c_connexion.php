<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];

switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosComptable($login,$mdp);
		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
                        $mois = $pdo->dernierMoisSaisi($id);
			connecter($id,$nom,$prenom, $mois);
			include("vues/v_sommaire.php");
		}
		break;
	}

        case 'deconnexion': {
                // Code ajouté par moi. Sans cela les informations de sessions
                // ne sont pas supprimées lors d'une déconnexion.
                deconnecter();
		include("vues/v_connexion.php");
		break;
        }

	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>