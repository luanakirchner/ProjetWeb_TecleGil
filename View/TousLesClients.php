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
                <div class="btn AdmCmd" type="button" ><a class="texta" href="index.php?action=AdmStatusEnCours">En attend</a></div>
                <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=NouvelleIntervention">Ajouter une nouvelle intervention</a></div>
                <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=TousLesClients">Tous les client</a></div>
                <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=AjouterClient">Ajouter un client</a></div>
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