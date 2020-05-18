<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
<div class="PageContenu" style="min-height: 80%">
    <div class="MarginTop"></div>
    <div class="col-lg-12 text-center" style="margin-bottom: 70px;">
        <h3 class="text-uppercase section-heading" style="color: white">Administrateur</h3>
    </div>
    <div class="row MenuAdm" style="height: auto%">
        <div class="col-md-2" style="border-right: yellow 1px solid;">
            <div class="btn AdmCmd" type="button" >En attend</div>
            <div class="btn AdmCmd" type="button">Ajouter une nouvelle intervention</div>
            <div class="btn AdmCmd" type="button">Tous les client</div>
            <div class="btn AdmCmd" type="button">Ajouter un client</div>
        </div>
        <div class="col-md-10" style="color: white; height: auto" >
            <form style="margin-left: 10px">
                <div class="form-group">
                    <label for="OS">OS</label>
                    <input class="formIntervention" type="text" name="OS" style="width: 20%" >
                    <label for="date">Date</label>
                    <input class="formIntervention" type="text" name="date" style="width: 20%" >
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input class="formIntervention" type="text" name="status" style="width: 40%" >
                </div>
                <div class="form-group">
                    <label for="client">Client</label>
                    <input class="formIntervention" type="text" name="client" style="width: 40%" >
                </div>
                <div class="form-group">
                    <label for="equipement">Equipement</label>
                    <input class="formIntervention" type="text" name="equipement" style="width: 40%" >
                </div>
                <div class="form-group">
                    <label for="couleur">Couleur</label>
                    <input class="formIntervention" type="text" name="couleur" style="width: 20%">
                    <label for="accessoires">accessoires</label>
                    <input class="formIntervention" type="text" name="accessoires" style="width: 20%" >
                </div>
                <div class="form-group">
                    <label for="caracteristique">caracteristique</label>
                    <input class="formIntervention" type="text" name="caracteristique" style="width: 40%" >
                </div>
                <div class="form-group" style="display: block">
                    <label for="descriptionClient">Description client</label>
                    <textarea class="formIntervention" type="text" name="descriptionClient" style="width: 100%" ></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="descriptionAdm">Description client</label>
                    <textarea class="formIntervention" type="text" name="descriptionAdm" style="width: 100%" ></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="probleme">probleme</label>
                    <textarea class="formIntervention" type="text" name="probleme" style="width: 100%" ></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="service">service</label>
                    <textarea class="formIntervention" type="text" name="service" style="width: 100%" ></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <button class="btn btn-block AdmCmd" type="submit" >Valider</button>
                </div>

            </form>
        </div>
    </div>

    </div>

</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

