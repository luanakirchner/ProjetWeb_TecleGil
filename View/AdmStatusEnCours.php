<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
<div class="PageContenu">
    <div class="MarginTop"></div>
    <div class="col-lg-12 text-center" style="margin-bottom: 70px;">
        <h3 class="text-uppercase section-heading" style="color: white">Administrateur</h3>
    </div>
    <div class="row MenuAdm">
          <div class="col-md-2" style="border-right: yellow 1px solid">
              <div class="btn AdmCmd" type="button">Ajouter un client</div>
              <div class="btn AdmCmd" type="button">Ajouter un client</div>
              <div class="btn AdmCmd" type="button">Ajouter un client</div>
              <div class="btn AdmCmd" type="button">Ajouter un client</div>
          </div>
          <div class="col-md-10">
              <div class="btn" style="background-color: red" type="button">Ajouter un client</div>
          </div>

    </div>
    <div style="height: 90px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

