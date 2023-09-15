<?php

if (!isset($_REQUEST['gestion'])) {
    $_REQUEST['gestion'] = 'formValidFrais';
}
        
switch($_REQUEST['gestion']){
    
    case 'formValidFrais' :
        $numVisiteur = null;
        $lstVisiteur = $pdo->listeVisiteurs();
        $fraisAuForfait = null;
        include ("Vues/v_valideFraisChoixVisiteur.php");
        break;
    
    case 'mois' :
        $lstVisiteur = $pdo->listeVisiteurs();
        $numVisiteur = $_REQUEST['lstVis'];
        $mois = $pdo->dernierMoisSaisi($numVisiteur);
        $etatFiche = $pdo->etatFicheFrais($numVisiteur, $mois);
        $fraisAuForfait = $pdo->infosFraisForfait($mois, $numVisiteur);
        include ("Vues/v_valideFraisChoixVisiteur.php");
        break;
    
}
?>
