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
        <h1 class="text-uppercase section-heading" style="color: white">Nos Services</h1>
    </div>
    <?php foreach ($infoNousServices as $info): ?>
        <div>
            <div class="NousServiceImage" data-bs-parallax-bg="true" style="height: 272px;background-image: url(&quot;<?=@$info["picture"]?>&quot;);background-position: center;background-size: cover; z-index: 1;">
                <div class="container">
                    <div class="intro-text">
                        <div class="intro-lead-in NousServicesTitle"><span><?=@$info["title"]?></span></div>
                    </div>
                </div>
            </div>
            <div class="NousServicesTexte">
                <?=@$info["description"]?>
            </div>
        </div>
    <?php endforeach;  ?>

    <div style="height: 20px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

