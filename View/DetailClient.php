<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
$contenu = ob_get_clean();
ob_start();
?>
<div class="PageContenu" style="min-height: 70%">
    <div class="MarginTop"></div>
    <div class="col-lg-12 text-center" style="margin-bottom: 70px;">
        <h3 class="text-uppercase section-heading" style="color: white">Administrateur</h3>
    </div>
    <div class="row MenuAdm" >
        <div class="col-md-2" style="border-right: yellow 1px solid;">
            <div class="btn AdmCmd" type="button" >En attend</div>
            <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=NouvelleIntervention">Ajouter une nouvelle intervention</a></div>
            <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=TousLesClients">Tous les client</a></div>
            <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=AjouterClient">Ajouter un client</a></div>
        </div>
        <div class="col-md-10 formulaireAjouteClient" style="color: white; height: auto" >
           <h3 class="text-center" style="margin-bottom: 60px">Intervention</h3>
            <?php foreach ($infoInterventions as $Strintervention): $_GET[@$Strintervention["status"]] = "selected" ?>
            <form style="margin-left: 10px;margin-bottom: 60px" method="post" action="index.php?action=NouvelleIntervention">
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <input id="idClient" name="idEquipment" value=""<?=@$Strintervention["idEquipment"]?>" type="hidden">
                        <input id="idClient" name="idIntervention value=""<?=@$Strintervention["idIntervention"]?>" type="hidden">
                        <div class="ligneLabel"><label for="OS">OS</label></div>
                        <div class="ligneInput"><input class="formIntervention"  disabled="disabled"  type="text" name="OS" value="<?=@$Strintervention["id"]?>" style="width: 100%; color: white"  ></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="date">Date</label></div>
                        <div class="ligneInput"><input class="formIntervention" id="date" type="Date" value="<?=@$Strintervention["arrivalDate"]?>"  disabled="disabled" name="date" style="width: 100%;color: white" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"> <label for="status">Status*</label></div>
                        <div class="ligneInput">
                            <select required="" name="status" id="status" class="formIntervention" style="width: 100%">
                                <option value=""></option>
                                <option value="En file d'attente" <?=@$_GET["En file d'attente"] ?>>En file d'attente</option>
                                <option value="En cours"  <?=@$_GET["En cours"] ?>>En cours</option>
                                <option value="Prêt"  <?=@$_GET["Prêt"] ?>>Prêt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label for="nomClient">Client*</label></div>
                        <div class="ligneInput">
                            <input class="formIntervention" type="text" name="nomClient" value="<?=@$Strintervention[""]?>"  disabled="disabled" style="width:  100%;color: white">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label for="equipement">Equipement*</label></div>
                        <div class="ligneInput">
                            <input class="formIntervention" type="text" name="equipement" value="<?=@$Strintervention["equipment"]?>"   disabled="disabled" style="width:  100%;color: white">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label for="couleur">Couleur</label></div>
                        <div class="ligneInput"><input class="formIntervention" type="text" value="<?=@$Strintervention["color"]?>"  name="couleur" style="width: 100%"></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="accessoires">accessoires</label></div>
                        <div class="ligneInput"><input class="formIntervention" id="acc" type="text" value="<?=@$Strintervention["accessories"]?>"  name="accessoires" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"> <label for="caracteristique">caracteristique</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" value="<?=@$Strintervention["characteristics"]?>"  name="caracteristique" style="width: 100%" ></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="passwordPC">password</label></div>
                        <div class="ligneInput"><input class="formIntervention" id="acc" type="text" value="<?=@$Strintervention["password"]?>"  name="passwordPC" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"> <label for="driver">driver</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" value="<?=@$Strintervention["driver"]?>"  name="driver" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group " style="display: block">
                    <label for="descriptionClient">Description adm</label>
                    <textarea class="formIntervention" type="text" name="descriptionAdm" style="width: 100%" > <?=@$Strintervention["descriptionAdm"]?></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="descriptionAdm">Description client</label>
                    <textarea class="formIntervention" type="text" name="descriptionClient"  style="width: 100%" ><?=@$Strintervention["descriptionCustomer"]?></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="probleme">probleme</label>
                    <textarea class="formIntervention" type="text" name="probleme" style="width: 100%" > <?=@$Strintervention["problem"]?></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="service">service</label>
                    <textarea class="formIntervention" type="text" name="service"  style="width: 100%" ><?=@$Strintervention["service"]?></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <button class="btn btn-block AdmCmd" type="submit" >Valider</button>
                </div>
            </form>
            <?php endforeach; ?>
            <h3 class="text-center" style="margin-bottom: 60px">Info du client</h3>

            <?php foreach ($infoClient as $client ): ?>
            <form style="margin-left: 10px" action='index.php?action=UpdateCustomer' method="post">
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label  for="firstname" style="margin-right: 15px" >Prénom*:</label></div>
                        <div class="ligneInput"> <input id="firstname" class="formIntervention" type="text" required="" value="<?=@$client["firstname"]?>" name="firstname" style="width: 100%" ></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="lastname">Nom*:</label></div>
                        <div class="ligneInput"> <input id="lastname" class="formIntervention" type="text" required=""  value="<?=@$client["lastname"]?>" name="lastname" style="width: 100%"></div>
                        <input id="idClient" name="idClient" value="<?=@$client["id"]?>" type="hidden">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"> <label for="telephone">telephone*:</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" required=""  value="<?=@$client["telephone"]?>"  name="telephone" style="width: 100%" > </div>
                    </div>
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="telephone2">telephone2:</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" name="telephone2"  style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="city">Ville*</label></div>
                        <div class="ligneInput"><input class="formIntervention" required="" type="text" value="<?=@$client["city"]?>"  name="city" style="width: 100%" > </div>
                    </div>
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="npa">Npa</label></div>
                        <div class="ligneInput"><input class="formIntervention" type="text" value="<?=@$client["npa"]?>" name="npa" style="width: 50%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="street">Rue</label></div>
                        <div class="ligneInput"><input class="formIntervention" type="text" value="<?=@$client["street"]?>" name="street" style="width: 100%" > </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="email">Email</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" value="<?=@$client["email"]?>" name="email" style="width: 100%" > </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter">
                        <div class="ligneLabel"><label for="login">Login</label></div>
                        <div class="ligneInput"><input  id="loginName" class="formIntervention" value="<?=@$client["login"]?>" type="text" name="login" style="width: 100%" > </div>
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
            <?php endforeach; ?>
        </div>

    </div>
    <div style="height: 90px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

