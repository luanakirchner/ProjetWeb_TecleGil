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
        <h3 class="text-uppercase section-heading" style="color: white">Nouvelle intervention</h3>
    </div>
    <div class="row MenuAdm"  style="min-height: 500px">
        <div class="col-md-2" style="border-right: yellow 1px solid;">
            <a class="texta" href="index.php?action=AdmStatusEnCours"><div class="btn AdmCmd" type="button" >En attente - En cours</div></a>
            <a class="texta" href="index.php?action=NouvelleIntervention"><div class="btn AdmCmd" type="button">Ajouter une nouvelle intervention</div></a>
            <a class="texta" href="index.php?action=TousLesClients"><div class="btn AdmCmd" type="button">Tous les client</div></a>
            <a class="texta" href="index.php?action=AjouterClient"><div class="btn AdmCmd" type="button">Ajouter un client</div></a>
        </div>
        <div class="col-md-10 formulaireAjouteClient" style="color: white; height: auto" >
            <?=@$_GET["MessageConfirm"]?>
            <form style="margin-left: 10px" method="post" action="index.php?action=NouvelleIntervention">
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label for="OS">OS</label></div>
                        <div class="ligneInput"><input class="formIntervention" type="text" name="OS" style="width: 100%" value="<?=$OS[0]['id']+1?>" ></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="date">Date</label></div>
                        <div class="ligneInput"><input class="formIntervention" id="date" type="Date" name="date" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"> <label for="status">Statut*</label></div>
                        <div class="ligneInput">
                            <select required="" name="status" id="status" class="formIntervention" style="width: 100%">
                                <option value=""></option>
                                <option value="En file d'attente">En file d'attente</option>
                                <option value="En cours">En cours</option>
                                <option value="Prêt">Prêt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label for="client">Client*</label></div>
                        <div class="ligneInput">
                            <input id="selected" class="formIntervention" list="browsers" onchange="VerifiClient()" name="listClient" style="width: 100%">
                            <datalist id="browsers" >
                                <?php foreach ($Customers as $result): ?>
                                <option data-value="<?=$result['id'] ?>" value="<?=$result['firstname']." ".$result['lastname'] ?>" ></option>
                                <?php endforeach; ?>
                            </datalist>
                            <input id="idClient" name="idClient" type="hidden" >
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label for="equipement">Equipement*</label></div>
                        <div class="ligneInput">
                            <select id="equipement" name="equipement" class="formIntervention" style="width: 100%">
                                <option value=""></option>
                                <option value="Ordinateur portable">Ordinateur portable</option>
                                <option value="Ordinateur fixe">Ordinateur fixe</option>
                                <option value="Clavier">Clavier</option>
                                <option value="Moniteur">Moniteur</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter ">
                        <div class="ligneLabel"><label for="couleur">Couleur</label></div>
                        <div class="ligneInput"><input class="formIntervention" type="text" name="couleur" style="width: 100%"></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="accessoires">Accessoire(s)</label></div>
                        <div class="ligneInput"><input class="formIntervention" id="acc" type="text" name="accessoires" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"> <label for="caracteristique">Caractéristique(s)</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" name="caracteristique" style="width: 100%" ></div>
                    </div>
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"><label for="passwordPC">Password</label></div>
                        <div class="ligneInput"><input class="formIntervention" id="acc" type="text" name="passwordPC" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 ligneCenter" >
                        <div class="ligneLabel"> <label for="driver">Driver</label></div>
                        <div class="ligneInput"> <input class="formIntervention" type="text" name="driver" style="width: 100%" ></div>
                    </div>
                </div>
                <div class="form-group " style="display: block">
                    <label for="descriptionClient">Description administrateur (privé)</label>
                    <textarea class="formIntervention" type="text" name="descriptionAdm" style="width: 100%" ></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="descriptionAdm">Description client</label>
                    <textarea class="formIntervention" type="text" name="descriptionClient" style="width: 100%" ></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="probleme">Problème</label>
                    <textarea class="formIntervention" type="text" name="probleme" style="width: 100%" ></textarea>
                </div>
                <div class="form-group" style="display: block">
                    <label for="service">Service(s)</label>
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

