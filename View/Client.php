<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
    <div class="ClientDark" style="background-image: url(&quot;img/test2.png&quot;);">
        <div class="PageClient">
            <h4 style="border-bottom: yellow 1px solid;">Salut Luana</h4>
            <div class="ClientMateriel">
                Ordinateur portable
            </div>
            <div class="ClientStatus">
                Etat du matériel : En cours
            </div>
            <div class="ClientDescription">
                Description:<br>
                <span class="text-muted"> ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                 ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.

                </span>
            </div>
            <div style="margin-top: 25px">
                Voulez vous envoyer un message à l'administrateur ?
                <form style="margin-top: 15px">
                    <textarea class="form-control form-control-md FormulaireContact" required="" style="min-height: 50px; margin-bottom: 8px" placeholder="Message*"></textarea>
                    <div class="form-group" style="display: flex"><button class="btn btn-dark btn-md FormulaireContact"  type="submit">Envoyer</button></div>
                </form>
            </div>
            <div class="ClientMiseAJour">
                <p class="text-muted">dernière mise à jour : 25/05/2018</p>
            </div>
        </div>

    </div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>