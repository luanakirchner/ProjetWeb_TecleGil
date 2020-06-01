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
        <h1 class="text-uppercase section-heading" style="color: white">Nous Services</h1>
        <?=@$_GET["MessageConfirm"]?>
        <?=@$_GET["Erreur"]?>
    </div>
    <?php foreach ($infoNousServices as $info): ?>
    <form method="post" enctype="multipart/form-data" action="index.php?action=NousServicesAdm">
        <div>
            <input type="hidden" name="idService" value="<?=@$info["id"]?>">
            <div class="NousServiceImage" data-bs-parallax-bg="true" style="height: 272px;background-image: url(&quot;<?=@$info["picture"]?>&quot;);background-position: center;background-size: cover; z-index: 1;">

                <div class="container">
                    <div class="intro-text">
                        <input type="text" class="intro-lead-in" name="title" style="width: 60%; background-color: yellow" value="<?=@$info["title"]?>">
                     </div>
                </div>
            </div>
            <input value="<?=@$info["picture"]?>" name="Photo" type="hidden">
            <div>

                 <input style="color: white" accept="image/*"  type="file" id="addPhoto"  name="addPhoto" >
            </div>
            <textarea type="text" class="descriptionService" name="description" > <?=@$info["description"]?></textarea>
            <button class="btn btn-block btnServices" type="submit" >Valider</button>
    </form>
    <?php endforeach;  ?>


    <div style="height: 20px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

