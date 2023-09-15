<?php

session_start();
require_once("Include/fct.inc.php");
require_once ("Include/class.pdogsb.inc.php");
require_once ("Include/Bibliotheque01.inc.php");

include("vues/v_entete.php");

$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();

if (!isset($_REQUEST['uc']) || !$estConnecte) {
    $_REQUEST['uc'] = 'connexion';
}

$uc = $_REQUEST['uc'];

switch ($uc) {
    case 'connexion' :
        include("Controleurs/c_connexion.php");
        break;

    case 'gererFrais' :
        include("Controleurs/c_gererFrais.php");
        break;

//	case 'etatFrais' :{
//		include("controleurs/c_etatFrais.php");break;
//	}
    case 'validerFicheFrais' :
        include("Controleurs/c_valideFrais.php");
        break;

}

include("vues/v_pied.php");
?>

