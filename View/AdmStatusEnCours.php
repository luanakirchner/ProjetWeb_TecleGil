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
    <div class="row MenuAdm" style="height: 100%">
          <div class="col-md-2" style="border-right: yellow 1px solid;">
              <div class="btn AdmCmd" type="button" >En attend</div>
              <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=NouvelleIntervention">Ajouter une nouvelle intervention</a></div>
              <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=TousLesClients">Tous les client</a></div>
              <div class="btn AdmCmd" type="button"><a class="texta" href="index.php?action=AjouterClient">Ajouter un client</a></div>
          </div>
          <div class="col-md-10">

          </div>

    </div>
    <div style="height: 90px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

