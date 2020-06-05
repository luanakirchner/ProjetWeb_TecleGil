<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
    <div class="login-dark" style="background-image: url(&quot;img/test2.png&quot;);">
        <form class="FormLogin" method="post" action='index.php?action=MotDePasseOblie'>
            <h2 class="sr-only">Login Form</h2>
            <h4 style="margin-bottom: 25px">Mot de passe oblié</h4>
            <div class="form-group">Inserer les information suivants:</div>
            <div class="form-group"><input class="form-control" required="" type="text" name="nom" placeholder="Nom complet"></div>
            <div class="form-group"><input class="form-control" type="text" required="" name="prenom" placeholder="Prenom complet"></div>
            <div class="form-group" style="font-size: 15px">Votre demande de réinitialisation de mot de passe va être envoyée au l'administrateur.
                L'administrateur peut envoyer votre login par email ou vous téléphone si nécessaire </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(210,183,43);">Envoyer</button></div>
            <?= @$_GET['MessageConfirm']?>

        </form>
    </div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>