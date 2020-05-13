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
    </div>
        <div>
            <div class="NousServiceImage" data-bs-parallax-bg="true" style="height: 272px;background-image: url(&quot;img/microcircuit_circuit_bw_126894_1280x720.jpg&quot;);background-position: center;background-size: cover; z-index: 1;">
                <div class="container">
                    <div class="intro-text">
                        <div class="intro-lead-in NousServicesTitle"><span>Assistance technique</span></div>
                    </div>
                </div>
            </div>
            <div class="NousServicesTexte">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            </div>
        </div>
    <div>
        <div class="NousServiceImage" data-bs-parallax-bg="true" style="height: 272px;background-image: url(&quot;img/file.jpg&quot;);background-position: center;background-size: cover; z-index: 1;">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in NousServicesTitle"><span>Bureautique</span></div>
                </div>
            </div>
        </div>
        <div class="NousServicesTexte">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
        </div>
    </div>
    <div>
        <div class="NousServiceImage" data-bs-parallax-bg="true" style="height: 272px;background-image: url(&quot;img/keyboard.jpg&quot;);background-position: center;background-size: cover; z-index: 1;">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in NousServicesTitle"><span>Services de secrétaria</span></div>
                </div>
            </div>
        </div>
        <div class="NousServicesTexte">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
        </div>
    </div>


    <div style="height: 20px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>

