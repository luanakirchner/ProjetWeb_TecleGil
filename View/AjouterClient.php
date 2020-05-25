<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
<div class="PageContenu" style="min-height: 87%">
    <div class="MarginTop"></div>
    <div class="col-lg-12 text-center" style="margin-bottom: 70px;">
        <h3 class="text-uppercase section-heading" style="color: white">Ajouter un client</h3>
    </div>
    <div class="row MenuAdm" style="height: auto%">
        <div class="col-md-2" style="border-right: yellow 1px solid;">
            <div class="btn AdmCmd" type="button" >En attend</div>
            <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=NouvelleIntervention">Ajouter une nouvelle intervention</a></div>
            <div class="btn AdmCmd" type="button">Tous les client</div>
            <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=AjouterClient">Ajouter un client</a></div>
        </div>
        <div class="col-md-10 formulaireAjouteClient" >
            <form style="margin-left: 10px" action='index.php?action=AjouterClient' method="post">
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label  for="firstname" style="margin-right: 15px">Prénom*:</label></div>
                        <div class="ligneInput"> <input id="firstname" class="formIntervention" type="text" required="" name="firstname"style="width: 100%" onchange="Login()"></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="lastname">Nom*:</label></div>
                        <div class="ligneInput"> <input id="lastname" class="formIntervention" type="text" required=""  name="lastname" style="width: 100%" onchange="Login()"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"> <label for="telephone">telephone*:</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" required=""  name="telephone" style="width: 100%" > </div>
                    </div>
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="telephone2">telephone2:</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" name="telephone2" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="city">Ville*</label></div>
                        <div class="ligneInput"><input class="formIntervention" required="" type="text" name="city" style="width: 100%" > </div>
                    </div>
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="npa">Npa</label></div>
                        <div class="ligneInput"><input class="formIntervention" type="text" name="npa" style="width: 50%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="street">Rue</label></div>
                        <div class="ligneInput"><input class="formIntervention" type="text" name="street" style="width: 100%" > </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="email">Email</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" name="email" style="width: 100%" > </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="login">Login</label></div>
                        <div class="ligneInput"><input  id="loginName" class="formIntervention" type="text" name="login" style="width: 100%" > </div>
                    </div>
                    <div class="col-md-3 ligneCenter">
                        <div class="ligneLabel"><label for="">Mot d e passe</label></div>
                        <div class="ligneInput"> <input id="loginPassword" class="formIntervention" type="password" name="password" style="width: 100%" ></div>
                    </div>
                    <div class="col-md-3 ligneCenter">
                        <img style="margin-right: 20px" src="img/vision.png" onclick="ShowPassword()">
                        <div class="btn AdmCmd" style="margin-bottom: 0px">Envoyer le login</div>
                    </div>
                </div>
                <div class="form-group" style="display: block">
                    <button class="btn btn-block AdmCmd" style="margin-bottom: 0px" type="submit" >Valider</button>
                </div>

            </form>
            <?=@$_GET["MessageConfirm"]?>
        </div>
    </div>

</div>

</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

