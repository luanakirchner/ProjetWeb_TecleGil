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
    <div class="row MenuAdm"  style="min-height: 700px">
        <div class="col-md-2" style="border-right: yellow 1px solid;">
            <a class="texta" href="index.php?action=AdmStatusEnCours"><div class="btn AdmCmd" type="button" >En attente - En cours</div></a>
            <a class="texta" href="index.php?action=NouvelleIntervention"><div class="btn AdmCmd" type="button">Ajouter une nouvelle intervention</div></a>
            <a class="texta" href="index.php?action=TousLesClients"><div class="btn AdmCmd" type="button">Tous les client</div></a>
            <a class="texta" href="index.php?action=AjouterClient"><div class="btn AdmCmd" type="button">Ajouter un client</div></a>
        </div>
        <div class="col-md-10 formulaireAjouteClient" style="color: white; height: auto" >
            <?= @$_GET["MessageConfirm"]?>
            <h3 class="text-center" style="margin-bottom: 60px">Intervention</h3>
            <?php foreach ($infoInterventions as $Strintervention): $_GET[@$Strintervention["status"]] = "selected";
                if(@$Strintervention["status"] != "Prêt"):?>
                    <form style="margin-left: 10px;margin-bottom: 60px" method="post" action="index.php?action=UpdateIntervention">
                        <div class="form-group row">
                            <div class="col-md-6 ligneCenter ">
                                <input id="idClient" name="idEquipment" value="<?=@$Strintervention["idEquipment"]?>" type="hidden">
                                <input id="idClient" name="idIntervention" value="<?=@$Strintervention["idIntervention"]?>" type="hidden">
                                <input id="idClient" name="idDuClient" value="<?=@$_GET["idDuClient"]?>" type="hidden">
                                <div class="ligneLabel"><label for="OS">OS</label></div>
                                <div class="ligneInput"><input class="formIntervention"  disabled="disabled"  type="text" name="OS" value="<?=@$Strintervention["idIntervention"]?>" style="width: 100%; color: white"  ></div>
                            </div>
                            <div class="col-md-6 ligneCenter" >
                                <div class="ligneLabel"><label for="date">Date</label></div>
                                <div class="ligneInput"><input class="formIntervention" id="date" type="text" value=" <?=date('d-m-Y',strtotime(@$Strintervention["arrivalDate"]))?>"  disabled="disabled" name="date" style="width: 100%;color: white" ></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 ligneCenter ">
                                <div class="ligneLabel"> <label for="status">Statut*</label></div>
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
                                    <input class="formIntervention" type="text" name="nomClient" value="<?=@$infoClient[0]["firstname"]." ".@$infoClient[0]["lastname"]?>"  disabled="disabled" style="width:  100%;color: white">
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
                                <div class="ligneLabel"><label for="accessoires">Accessoires</label></div>
                                <div class="ligneInput"><input class="formIntervention" id="acc" type="text" value="<?=@$Strintervention["accessories"]?>"  name="accessoires" style="width: 100%" ></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 ligneCenter" >
                                <div class="ligneLabel"> <label for="caracteristique">Caractéristique(s)</label></div>
                                <div class="ligneInput"> <input class="formIntervention" type="text" value="<?=@$Strintervention["characteristics"]?>"  name="caracteristique" style="width: 100%" ></div>
                            </div>
                            <div class="col-md-6 ligneCenter" >
                                <div class="ligneLabel"><label for="passwordPC">password</label></div>
                                <div class="ligneInput"><input class="formIntervention" id="acc" type="text" value="<?=@$Strintervention["password"]?>"  name="passwordPC" style="width: 100%" ></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 ligneCenter" >
                                <div class="ligneLabel"> <label for="driver">Driver</label></div>
                                <div class="ligneInput"> <input class="formIntervention" type="text" value="<?=@$Strintervention["driver"]?>"  name="driver" style="width: 100%" ></div>
                            </div>
                        </div>
                        <div class="form-group " style="display: block">
                            <label for="descriptionClient">Description administrateur (privé)</label>
                            <textarea class="formIntervention" type="text" name="descriptionAdm" style="width: 100%" > <?=@$Strintervention["descriptionAdm"]?></textarea>
                        </div>
                        <div class="form-group" style="display: block">
                            <label for="descriptionAdm">Description client</label>
                            <textarea class="formIntervention" type="text" name="descriptionClient"  style="width: 100%" ><?=@$Strintervention["descriptionCustomer"]?></textarea>
                        </div>
                        <div class="form-group" style="display: block">
                            <label for="probleme">Probleme</label>
                            <textarea class="formIntervention" type="text" name="probleme" style="width: 100%" > <?=@$Strintervention["problem"]?></textarea>
                        </div>
                        <div class="form-group" style="display: block">
                            <label for="service">Service(s)</label>
                            <textarea class="formIntervention" type="text" name="service"  style="width: 100%" ><?=@$Strintervention["service"]?></textarea>
                        </div>
                        <div class="form-group" style="display: block">
                            <button class="btn btn-block AdmCmd" type="submit" >Valider</button>
                        </div>
                    </form>
                <?php endif; endforeach; ?>

            <?php $Historiques = SelecHistoriqueInterventionsWhereCustomers(@$_GET["idDuClient"]);
            if(count($Historiques) !=0){echo " <h3 class=\"text-center\" style=\"margin-bottom: 60px\">Historique</h3>";};
            foreach ($Historiques as $infoHistorique): ?>
                <?php if($Historiques !=0): ?>
                    <table class="table" style="text-align: center; margin-bottom: 40px">
                        <thead>
                        <tr style="color: white">
                            <th>OS</th>
                            <th>Date d'arriver</th>
                            <th>Date de dapart</th>
                            <th>Probleme</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="color: white">
                            <td><?=@$infoHistorique["id"]?></a></td>
                            <td><?=@$infoHistorique["arrivalDate"]?></td>
                            <td><?=@$infoHistorique["dateOfDeparture"] ?></td>
                            <td><?=@$infoHistorique["problem"] ?></td>
                        </tr>
                        </tbody>
                    </table>

                <?php endif; endforeach; ?>
            <h3 class="text-center" style="margin-bottom: 60px">Info du client</h3>

            <?php foreach ($infoClient as $client ): ?>
                <form style="margin-left: 10px" action='index.php?action=UpdateCustomer' method="post">
                    <div class="form-group row">
                        <div class="col-md-6 ligneCenter ">
                            <div class="ligneLabel"><label  for="firstname" style="margin-right: 15px" >Prénom*</label></div>
                            <div class="ligneInput"> <input id="firstname" class="formIntervention" type="text" required="" value="<?=@$client["firstname"]?>" name="firstname" style="width: 100%" ></div>
                        </div>
                        <div class="col-md-6 ligneCenter" >
                            <div class="ligneLabel"><label for="lastname">Nom*</label></div>
                            <div class="ligneInput"> <input id="lastname" class="formIntervention" type="text" required=""  value="<?=@$client["lastname"]?>" name="lastname" style="width: 100%"></div>
                            <input id="idClient" name="idClient" value="<?=@$client["id"]?>" type="hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 ligneCenter">
                            <div class="ligneLabel"> <label for="telephone">Téléphone*</label></div>
                            <div class="ligneInput"> <input class="formIntervention" type="text" required=""  value="<?=@$client["telephone"]?>"  name="telephone" style="width: 100%" > </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 ligneCenter">
                            <div class="ligneLabel"><label for="city">Ville*</label></div>
                            <div class="ligneInput"><input class="formIntervention" required="" type="text" value="<?=@$client["city"]?>"  name="city" style="width: 100%" > </div>
                        </div>
                        <div class="col-md-6 ligneCenter">
                            <div class="ligneLabel"><label for="npa">NPA</label></div>
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
                            <div class="ligneLabel"><label for="">Mot de passe</label></div>
                            <div class="ligneInput"> <input id="loginPassword" class="formIntervention" type="password" value="<?=@$client["firstname"]?>" name="password" style="width: 100%" ></div>
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
            <?php endforeach; ?>
        </div>

    </div>
    <div style="height: 90px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

