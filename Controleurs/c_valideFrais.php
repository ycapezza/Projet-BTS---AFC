<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'choixInitialVisiteur';
}
        
switch($_REQUEST['action']){
    
    case 'choixInitialVisiteur':
        $lstVisiteur = $pdo->listeVisiteurs();
        include("Vues/v_sommaire.php");
        include("Vues/v_valideFraisChoixVisiteur.php");
        break;
    
    case 'afficherFicheFraisSelectionnee':
        $lstVisiteur = $pdo->listeVisiteurs();
        include("Vues/v_sommaire.php");
        include("Vues/v_valideFraisChoixVisiteur.php");
        break;
    
    case 'corpFiche':
        include("Include/class.FicheFrais.inc.php");
        $libelle = getLibelleEtat();
        $nbJustificatifs = getNbJustificatifs();
        $quatite = getLesQuatiteDeFraisForfaitises();
        include("Vues/v_valideFraisCorpsFiche.php");
        break;
}

?>