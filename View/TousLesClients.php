<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
    <div class="PageContenu" style="min-height: 70%">
        <div class="MarginTop"></div>
        <div class="col-lg-12 text-center" style="margin-bottom: 70px;">
            <h3 class="text-uppercase section-heading" style="color: white">Tous les Clients</h3>
        </div>
        <div class="row MenuAdm" style="min-height: 700px">
            <div class="col-md-2" style="border-right: yellow 1px solid;">
                <a class="texta" href="index.php?action=AdmStatusEnCours"><div class="btn AdmCmd" type="button" >En attente - En cours</div></a>
                <a class="texta" href="index.php?action=NouvelleIntervention"><div class="btn AdmCmd" type="button">Ajouter une nouvelle intervention</div></a>
                <a class="texta" href="index.php?action=TousLesClients"><div class="btn AdmCmd" type="button">Tous les client</div></a>
                <a class="texta" href="index.php?action=AjouterClient"><div class="btn AdmCmd" type="button">Ajouter un client</div></a>
            </div>
            <div class="col-md-10 TousLesClients">
                <table class="table" style="text-align: center">
                    <thead>
                    <tr style="color: white">
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <?php $count = 0; foreach ($resultatClients as $client) :   ?>
                        <tbody>
                        <tr <?php if ($count%2 == 0):?>style="background-color:#D9D5D4;"<?php endif; ?> style="background-color: white;";>
                            <td><a class="texta" href="index.php?action=DetailClient&idClient=<?=$client["id"]?>"><?=$client["firstname"] ?> <?=$client["lastname"] ?></a></td>
                            <td><?=$client["telephone"] ?></td>
                            <td><?=$client["email"] ?></td>
                        </tr>
                        </tbody>
                        <?php $count++; endforeach ?>
                </table>
            </div>
        </div>
        <div style="height: 90px"></div>
    </div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>