<?php

function formSelectDepuisRecordsetV2($unLabel, $unName, $id, $jeuEnregistrement, $valeuroptionnel = NULL, $unTabindex) {
    $codeHTML = '<label for="' . $id . '">' . $unLabel . '</label>'
            . '<select name="' . $unName . '" id="' . $id . '" tabindex="' . $unTabindex . '">';
    
    if ($valeuroptionnel === NULL) {
        foreach($jeuEnregistrement as $ligne) {
            $codeHTML .= '<option value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            
        }
    }
    else {
        foreach($jeuEnregistrement as $ligne) {
            $codeHTML .= '<option';
            if ($ligne[0] == $valeuroptionnel) {
                $codeHTML .= ' selected="selected"';
            }
            $codeHTML .= ' value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
        }
    }
    $codeHTML .= '</select>';

    return $codeHTML;
}

function formInputText($value, $name, $id, $size, $tabIndex) {
        $codeHTML = '<input type="text" name="' . $name . '" id="' . $id . '" size="' . $size . '" tabindex="' . $tabIndex . '"'
                . ' value="' . $value . '" />';
        
        return $codeHTML;
}

function formatDate() {
     $laDate = new DateTime(); 
     $leMois = (int) ($laDate->format('m')) - 1; 
     $lAnnee = (int) ($laDate->format('Y')); 
     if ($leMois == 0) { 
        $lAnnee--; 
        $leMois = 12; 
     } 
     return (new DateTime((string) $lAnnee . '-' . (string) $leMois))->format('Ym');
}

?>

