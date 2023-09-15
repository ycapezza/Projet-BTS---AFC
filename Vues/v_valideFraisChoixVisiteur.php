<html>
    <head>
        <title>Validation des frais de visite</title>
        <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="contenu">
            <h2>Validation d'une fiche de frais visiteur</h2>
            <br />
            <form name="frmChoixVisiteurMoisFiche" id="frmChoixVisiteurMoisFiche" method="post" action="Index.php?uc=<?php echo 'gererFrais'; ?>&gestion=<?php echo 'mois'; ?>" > <!--action="choisirVisiteurMoisFiche"--> 
                <label>
                    <?php
                        echo formSelectDepuisRecordsetV2('Visiteur :', 'lstVis', 'lstVis', $lstVisiteur, $_SESSION['idVisiteur'], 30);
                    ?>
                </label>
                <label for="txtMoisFiche">Mois : </label>
                    <input value="<?php if (isset($_SESSION['idVisiteur'])) { echo $_SESSION['mois']; } ?>" type="text" name="txtMoisFiche" id="txtMoisFiche" readonly="readonly" />
                    <input type="submit" id="btnOk" name="btnOk" value="Ok" tabindex ="20" />
            </form>
            <br />
            <br />
            <div class="encadre">
                <br />
                <p>
                    Etat de la fiche de frais :<input value="<?php if (isset($numVisiteur)) { echo $etatFiche; } ?>" type="text" id="txtEtatFicheFrais" name="txtEtatFicheFrais" readonly="readonly" />
                </p>
                <br />
                <h2>Frais au forfait</h2>
                <form name="frmFraisForfait" id="frmFraisForfait" method="post" action="enregModifFF.php"
                      onsubmit="return confirm('Voulez-vous réellement enregistrer les modifications apportées aux frais forfaitisés ?');">
                    <table>
                        <tr>
                            <th>Forfait<br />étape</th><th>Frais<br />kilométriques</th><th>Nuitée<br />hôtel</th><th>Repas<br />restaurant</th><th></th>
                        </tr>
                        <tr>
                            <?php if (isset($numVisiteur)) {
                                foreach ($fraisAuForfait as $ligne) {?>
                            <td><input value="<?php if($ligne[0] === 'ETP') { echo $ligne[1]; } ?>" type="text" size="3" name="txtEtape" id="txtEtape" tabindex="30" /></td>
                            <td><input type="text" size="3" name="txtKm" id="txtKm" tabindex="35" /></td>
                            <td><input type="text" size="3" name="txtNuitee" id="txtNuitee" tabindex="40" /></td>
                            <td><input type="text" size="3" name="txtRepas" id="txtRepas" tabindex="45" /></td>
                                <?php }
                            } ?>
                            <td>
                                <input type="submit" id="btnEnregistrerFF" name="btnEnregistrerFF" value="Enregistrer" tabindex="50" />&nbsp;
                                <input type="reset" id="btnReinitialiserFF" name="btnReinitialiserFF" value="Réinitialiser" tabindex="60" />
                            </td>
                        </tr>
                    </table>
                </form>
                <br />
                <br />
                <h2>Frais hors forfait</h2>
                <form name="frmFraisHorsForfait" id="frmFraisHorsForfait" method="post" action="enregModifFHF.php"
                      onsubmit="return confirm('Voulez-vous réellement enregistrer les modifications apportées aux frais hors forfait ?');">
                    <table>
                        <tr>
                            <th>Date</th><th>Libellé</th><th>Montant</th><th>Ok</th><th>Reporter</th><th>Supprimer</th>
                        </tr>
                        <tr>
                            <td><input type="text" size="12" name="txtHFDate1" id="txtHFDate1" readonly="readonly" /></td>
                            <td><input type="text" size="50" name="txtHFLibelle1" id="txtHFLibelle1" readonly="readonly" /></td>
                            <td><input type="text" size="10" name="txtHFMontant1" id="txtHFMontant1" readonly="readonly" /></td>
                            <td><input type="radio" name="rbHFAction1" value="O" tabindex="70" checked="checked"/></td>
                            <td><input type="radio" name="rbHFAction1" value="R" tabindex="80" /></td>
                            <td><input type="radio" name="rbHFAction1" value="S" tabindex="90" /></td>
                        </tr>
                        <tr>
                            <td><input type="text" size="12" name="txtHFDate2" id="txtHFDate2" readonly="readonly" /></td>
                            <td><input type="text" size="50" name="txtHFLibelle2" id="txtHFLibelle2" readonly="readonly" /></td>
                            <td><input type="text" size="10" name="txtHFMontant2" id="txtHFMontant2" readonly="readonly" /></td>
                            <td><input type="radio" name="rbHFAction2" value="O" tabindex="100" checked="checked" /></td>
                            <td><input type="radio" name="rbHFAction2" value="R" tabindex="110" /></td>
                            <td><input type="radio" name="rbHFAction2" value="S" tabindex="120" /></td>
                        </tr>
                    </table>
                    <p>
                        Nb de justificatifs pris en compte :&nbsp;
                        <input type="text" size="4" name="txtHFNbJustificatifsPEC" id="txtHFNbJustificatifsPEC" tabindex="130" /><br />

                    </p>
                    <p>
                        <input type="submit" id="btnEnregistrerModifFHF" name="btnEnregistrerModifFHF" value="Enregistrer les modifications des lignes hors forfait" tabindex="140" />&nbsp;
                        <input type="reset" id="btnReinitialiserFHF" name="btnReinitialiserFHF" value="Réinitialiser" tabindex="150" />
                    </p>
                </form>
            </div>
            <br />
            <br />
            <div class="piedForm">
                <form name="frmValiderFicheFrais" id="frmValiderFicheFrais" method="post" action="validerFicheFrais.php"
                      onsubmit="return confirm('Voulez-vous réellement valider la fiche de frais ?');">
                    <input type="submit" name="btnValiderFiche" id="btnValiderFiche" value="Valider la fiche de frais" tabindex="160" />
                </form>
            </div>
        </div>
    </body>
</html>