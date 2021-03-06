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
    <div class="row MenuAdm"  style="min-height: 500px">
        <div class="col-md-2" style="border-right: yellow 1px solid;">
            <a class="texta" href="index.php?action=AdmStatusEnCours"><div class="btn AdmCmd" type="button" >En attente - En cours</div></a>
            <a class="texta" href="index.php?action=NouvelleIntervention"><div class="btn AdmCmd" type="button">Ajouter une nouvelle intervention</div></a>
            <a class="texta" href="index.php?action=TousLesClients"><div class="btn AdmCmd" type="button">Tous les client</div></a>
            <a class="texta" href="index.php?action=AjouterClient"><div class="btn AdmCmd" type="button">Ajouter un client</div></a>
        </div>
        <div class="col-md-10 formulaireAjouteClient" >
            <form style="margin-left: 10px" action='index.php?action=AjouterClientForm' method="post">
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label  for="firstname" style="margin-right: 15px">Prénom*</label></div>
                        <div class="ligneInput"> <input id="firstname" class="formIntervention" type="text" required="" name="firstname"style="width: 100%" onchange="Login()"></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="lastname">Nom*</label></div>
                        <div class="ligneInput"> <input id="lastname" class="formIntervention" type="text" required=""  name="lastname" style="width: 100%" onchange="Login()"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"> <label for="telephone">Téléphone*</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" required=""  name="telephone" style="width: 100%" > </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="city">Ville*</label></div>
                        <div class="ligneInput"><input class="formIntervention" required="" type="text" name="city" style="width: 100%" > </div>
                    </div>
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="npa">NPA</label></div>
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
                        <div class="ligneInput"><input  id="loginName" class="formIntervention" type="text" onchange="Login()" name="login" style="width: 100%" > </div>
                    </div>
                    <div class="col-md-3 ligneCenter">
                        <div class="ligneLabel"><label for="">Mot de passe</label></div>
                        <div class="ligneInput"> <input id="loginPassword" class="formIntervention" type="password" name="password" style="width: 100%" ></div>
                        <img style="margin-left: 20px" src="img/vision.png" onclick="ShowPassword()">
                    </div>
                    <div class="col-md-3 ligneCenter">
                        <input type="checkbox" id="EnvoyerLeLogin" name="EnvoyerLeLogin" style="width: 30px; height: 20px">
                        <label style="margin-left: 10px" for="EnvoyerLeLogin">Envoyer le login par email, si l'email existe</label><br>

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

