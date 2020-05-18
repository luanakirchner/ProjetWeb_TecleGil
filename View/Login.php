<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
ob_start();
?>
    <div class="login-dark" style="background-image: url(&quot;img/test2.png&quot;);">
        <form class="FormLogin" method="post" action='index.php?action=Login'>
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color: rgb(239,231,41);"></i></div>
            <?php if(@$_GET['loginError'] == true): ?>
                <p style='color : red;'>Login incorrecte</p>
            <?php endif; ?>
            <div class="form-group"><input class="form-control" type="text" name="user" placeholder="User"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(210,183,43);">Log In</button></div><a class="forgot" href="#">Mot de passe oblié?&nbsp;</a></form>
    </div>
<?php
$contenu = ob_get_clean();
require  "Gabarit.php";
?>