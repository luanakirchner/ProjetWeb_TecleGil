<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>

<header  class="shadow-lg masthead" style="background-image: url(&quot;img/test2.png&quot;); margin-top: 50px">
    <div id="particles-js" class="">
        <div  class="intro-text" style="position: absolute; left: 0%; right: 0%">
            <div class="intro-lead-in" style="margin: auto"><span>Bienvenue chez</span></div>
            <div class="intro-heading text-uppercase"><span>TecleGil</span></div>
            <a class="nav-link js-scroll-trigger" href="#Accueil"> <i class="la la-arrow-circle-o-down" style="font-size: 49px;color: rgb(255,245,0);"></i></a>
        </div>
    </div>
</header>

<section id="Accueil" style="color: rgb(73,84,95);background-color: #f5f5f5;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">Services</h2>
                <h3 class="text-muted section-subheading">Lorem ipsum dolor sit amet consectetur</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4"><span class="fa-stack fa-4x" style="background-image: url(&quot;img/tower.png&quot;);background-position: center;background-size: contain;background-repeat: no-repeat;"></span>
                <h4 class="section-heading"><strong>Assistance technique</strong></h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4"><span class="fa-stack fa-4x" style="background-image: url(&quot;img/office.png&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;"></span>
                <h4 class="section-heading">Bureautique</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4"><span class="fa-stack fa-4x" style="background-image: url(&quot;img/edit-tools.png&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;"></span>
                <h4 class="section-heading">Services de secrétaria</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>

<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>
