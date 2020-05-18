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
        <h3 class="text-uppercase section-heading" style="color: white">Ajouter un client</h3>
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
                    <label for="firstname">Prénom:</label>
                    <input class="formIntervention" type="text" name="firstname" style="width: 40%" >
                    <label for="lastname">Nom:</label>
                    <input class="formIntervention" type="text" name="lastname" style="width: 40%" >
                </div>
                <div class="form-group">
                    <label for="telephone">telephone:</label>
                    <input class="formIntervention" type="text" name="telephone" style="width: 40%" >
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input class="formIntervention" type="text" name="city" style="width: 40%" >
                    <label for="npa">Npa</label>
                    <input class="formIntervention" type="text" name="npa" style="width: 20%" >
                </div>
                <div class="form-group">
                    <label for="street">Rue</label>
                    <input class="formIntervention" type="text" name="street" style="width: 40%" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="formIntervention" type="text" name="email" style="width: 80%" >
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input class="formIntervention" type="text" name="login" style="width: 40%" >
                    <label for="password">Mot de passe</label>
                    <input class="formIntervention" type="text" name="password" style="width: 40%" >
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

