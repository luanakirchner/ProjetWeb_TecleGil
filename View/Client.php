<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
    <div class="ClientDark" style="background-image: url(&quot;img/test2.png&quot;);">
        <div class="PageClient">
            <h4 style="border-bottom: yellow 1px solid;">Salut <?=@$_GET["Nom"]?></h4>

            <?php foreach ($infoIntervention as $info): ?>
            <div class="ClientMateriel">
               Equipement: <?=@$info["equipment"]?>
            </div>
            <div class="ClientStatus">
               Status: <?=@$info["status"]?>
            </div>
            <div class="ClientDescription">
                Description:<br>
                <span class="text-muted"><?=@$info["descriptionCustomer"]?></span>
            </div>
            <div class="ClientMiseAJour">
                <p class="text-muted">dernière mise à jour : <?=@$info["lastUpdate"]?></p>
            </div>
            <?php endforeach; ?>
            <div style="margin-top: 25px">
                Voulez vous envoyer un message à l'administrateur ?
                <form style="margin-top: 15px">
                    <textarea class="form-control form-control-md FormulaireContact" required="" style="min-height: 50px; margin-bottom: 8px" placeholder="Message*"></textarea>
                    <div class="form-group" style="display: flex"><button class="btn btn-dark btn-md FormulaireContact"  type="submit">Envoyer</button></div>
                </form>
            </div>
        </div>

    </div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>