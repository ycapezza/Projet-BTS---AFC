<?php

/**
 * Classe Frais
 *
 */
abstract class Frais {

    protected $idVisiteur;
    protected $moisFicheFrais;
    protected $numFrais;

    /**
     * Constructeur de la classe.
     *
     *  Rappel : en PHP le constructeur est toujours nommé
     *          __construct().
     *
     */
    public function __construct($unIdVisiteur, $unMoisFicheFrais, $unNumFrais) {
        $this->idVisiteur = $unIdVisiteur;
        $this->moisFicheFrais = $unMoisFicheFrais;
        $this->numFrais = $unNumFrais;
    }

    /**
     * Retourne l'id du visiteur.
     *
     * @return string L'id du visiteur.
     */
    public function getIdVisiteur() {
        return $this->idVisiteur;
    }

    /**
     * Retourne le mois de la fiche de frais.
     *
     * @return string Le mois de la fiche.
     */
    public function getMoisFiche() {
        return $this->moisFicheFrais;
    }

    /**
     * Retourne le numéro du frais (de la ligne).
     *
     * @return int Le numéro du frais.
     */
    public function getNumFrais() {
        return $this->numFrais;
    }
    
    abstract public function getMontant();

}

/**
 * Classe FraisForfaitise
 *
 */

final class FraisForfaitise extends Frais {
   
    private $quantite;
    private $laCategorieFraisForfaitise;
    
    /**
     * Constructeur de la classe.
     *
     *  Rappel : en PHP le constructeur est toujours nommé
     *          __construct().
     *
     */
      
    public function __construct($uneQuantite, $unIdVisiteur, $unMois, $unNumFrais, $uneCategorie) {
        parent::__construct($unIdVisiteur, $unMois, $unNumFrais);
        $this->quantite = $uneQuantite;
        $this->laCategorieFraisForfaitise = $uneCategorie;
    } 
    
    /**
     * Accesseurs.
    */
    
    public function getQuantite() {
        return $this->quantite;
    }
    
    public function getLaCategorieFraisForfaitise() {
        return $this->laCategorieFraisForfaitise;
    }
    
    public function getMontant() {
        return $this->laCategorieFraisForfaitise->getMontant() * $this->quantite; 
    }
}

final class FraisHorsForfait extends Frais {
    
    private $libelle;
    private $dateHorsForfait;
    private $montant;
    
    public function __construct($unLibelle, $uneDate, $unMontant, $unIdVisiteur, $unMois, $unNumFrais) {
        parent::__construct($unIdVisiteur, $unMois, $unNumFrais);
        $this->libelle = $unLibelle;
        $this->dateHorsForfait = $uneDate;
        $this->montant = $unMontant;
    }
    
    public function getLibelle() {
        return $this->libelle;
    }
    
    public function getDate() {
        return $this->dateHorsForfait;
    }

    public function getMontant() {
        return $this->montant;
    }
}