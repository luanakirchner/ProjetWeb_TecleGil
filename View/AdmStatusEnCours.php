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
        <h3 class="text-uppercase section-heading" style="color: white">Administrateur</h3>
    </div>
    <div class="row MenuAdm"  style="min-height: 700px">
          <div class="col-md-2" style="border-right: yellow 1px solid;">
              <div class="btn AdmCmd" type="button" ><a class="texta" href="index.php?action=AdmStatusEnCours">En attend</a></div>
              <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=NouvelleIntervention">Ajouter une nouvelle intervention</a></div>
              <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=TousLesClients">Tous les client</a></div>
              <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=AjouterClient">Ajouter un client</a></div>
          </div>
          <div class="col-md-10">
              <table class="table" style="text-align: center">
                  <thead>
                  <tr style="color: white">
                      <th>OS</th>
                      <th>Status</th>
                      <th>Client</th>
                      <th>Probleme</th>
                      <th>Date d'arriver</th>
                  </tr>
                  </thead>
                  <?php $resultIntervention= SelectInterventionEnCours(); $count = 0; foreach ($resultIntervention as $info) :   ?>
                      <tbody>
                      <tr <?php if ($count%2 == 0):?>style="background-color:#D9D5D4;"<?php endif; ?> style="background-color: white;";>
                          <td><a class="texta" href="index.php?action=DetailClient&idClient=<?=$info["idCustomer"]?>"><?=$info["idIntervention"] ?></a></td>
                          <td><?=$info["status"] ?></td>
                          <td><a class="texta" href="index.php?action=DetailClient&idClient=<?=$info["idCustomer"]?>"><?=$info["firstname"] ?> <?=$info["lastname"] ?></a></td>
                          <td><?=$info["problem"] ?></td>
                          <td><?=$info["arrivalDate"] ?></td>
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

