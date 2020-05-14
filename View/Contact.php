<<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
<div class="PageContenu">
    <div class="MarginTop"></div>
    <div class="col-lg-12 text-center" style="margin-bottom: 70px;">
        <h1 class="text-uppercase section-heading" style="color: white">Contact</h1>
    </div>
    <div class="container" style="margin-bottom: 50px">
        <div class="row">
            <div class="col-md-6">
                <form style="">
                    <div class="form-group">
                        <h3 class="text-center" style="color: white">Formulaire de contact</h3>
                    </div>
                    <div class="form-group"><input class="form-control form-control-md FormulaireContact" type="text"  required="" placeholder="Name*"></div>
                    <div class="form-group"><input class="form-control form-control-md FormulaireContact" type="text" required="" placeholder="Prénom*"></div>
                    <div class="form-group"><input class="form-control form-control-md FormulaireContact" type="email" required=""  placeholder="Email*"></div>
                    <div class="form-group"><textarea class="form-control form-control-md FormulaireContact" required="" style="min-height: 200px;" placeholder="Message*"></textarea></div>
                    <div class="form-group"><button class="btn btn-dark btn-lg FormulaireContact"  type="submit">Envoyer</button></div>
                </form>
            </div>
            <div class="col-md-6 text-center" style="color: white">
                <h3 class="text-center" >Nous Trouver</h3>
                <p class="text-muted" style="margin-top: 15px">Av Fagundes Varela, 914 Loja 06<br>
                    Jardim Atlântico - Olinda PE<br>
                    CEP: 53140-080<br><br>
                    teclegil@teclegil.com.br<br>
                    tecle.gil@hotmail.com<br><br>
                    +55 81 30110378<br>
                    99688-4905<br>
                </p>
                <h3 class="text-center" >Ouverture</h3>
                <p class="text-muted" style="margin-top: 15px"><span style="color: white"> Lundi à vendredi:</span><br>
                    8hr à 17hr<br>
                    <span style="color: white"> Samedi:</span><br>
                    8hr à 12hr
                </p>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d293.67597760095236!2d-34.84353414415185!3d-7.976486435848721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab3d7266db5225%3A0xa2949ce62da2e5a1!2sTeclegil%20Inform%C3%A1tica!5e0!3m2!1sfr!2sch!4v1589460468934!5m2!1sfr!2sch" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <div style="height: 20px"></div>
</div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>