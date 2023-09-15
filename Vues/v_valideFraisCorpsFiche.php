<?php

if (!isset($_REQUEST['choix'])) {
    $_REQUEST['choix'] = 'formValidFrais';
}

switch($_REQUEST['choix']){
    
    case 'etatFiche':
        include("Vues/v_valideFraisEtatFicheFrais.php");
        break;
    
    case 'VFF':
        include("Vues/v_valideFraisForfait.php");
        break;
    
    case 'validFrais':
        include("Vues/v_valideFraisValider.php");
        break;
    
}
?>

