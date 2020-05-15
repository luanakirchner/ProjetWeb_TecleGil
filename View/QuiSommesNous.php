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
        <h1 class="text-uppercase section-heading" style="color: white">Qui Sommes Nous</h1>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12" style="color: #D9D9D9; margin-bottom: 70px">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                </p>
            </div>
            <div class="col-md-3 mediaMargin"><span class="fa-stack fa-4x QuiSommesNousImg"></span></div>
            <div class="col-md-3 mediaMargin"><span class="fa-stack fa-4x QuiSommesNousImg"></span></div>
            <div class="col-md-3 mediaMargin"><span class="fa-stack fa-4x QuiSommesNousImg"></span></div>
            <div class="col-md-3 mediaMargin"><span class="fa-stack fa-4x QuiSommesNousImg"></span></div>

        </div>
    </div>
    <div style="height: 90px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

