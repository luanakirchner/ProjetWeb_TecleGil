<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TecleGil</title>

    <link rel="stylesheet" media="screen" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/Login-Form-Dark.css">
    <link rel="stylesheet" href="css/CssStyle.css">

</head>

<body id="page-top">
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="background-color: rgb(9,9,10)!important;">
    <div class="container"><a class="navbar-brand" href="index.php?action=home">Logo</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                                                                                    aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto text-uppercase">
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=home">Accueil</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=QuiSommesNous">Qui sommes nous</a></li>
                <?php if(@$_SESSION["admin"]): ?>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=NousServicesAdm">NousServicesAdm</a></li>
                <?php else: ?>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=NousServices">Nous services</a></li>
                <?php endif; ?>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=Contact">Contact</a></li>
                <?php if(@$_SESSION["admin"]): ?>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=AdmStatusEnCours">Adm</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=Logout">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php?action=Login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?=$contenu; ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">Luana Kirchner Bannwart<br> 2020<br><a href="">@LuanaKirchner</a></span></div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item"><a href="#" ><i class="fa fa-facebook" style="margin-top: 10px"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"  style="margin-top: 10px"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"  style="margin-top: 10px"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <p>Jardim Atlântico - Olinda PE<br>+55 81 30110378</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="js/agency.js"></script>
<script src="js/bs-init.js"></script>

<script>

    //Verifier si le client existe
    function VerifiClient() {

        //Recuperer le data-value
        var value = $('#selected').val();
        var idClient=$('#browsers [value="' + value + '"]').data('value');

        //Si le id n'est pas un numero, le client n'existe pas
        if(isNaN(idClient)){
            document.getElementById('selected').value="";
            document.getElementById('idClient').value="";
        }
        else {
            document.getElementById('idClient').value=idClient;
        }
    }
    function Login() {

        var firstname= document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;


        if(firstname.indexOf(" ") > 0 || firstname.indexOf("-") > 0){
            firstname = firstname.substring(firstname.indexOf(" "),0);
        }
        if(lastname.indexOf(" ") > 0 || lastname.indexOf("-") > 0){
            lastname = lastname.substring(lastname.indexOf(" "),0);
        }


        if(firstname !== "" && lastname !==""){

            var Logins = new Array();
            var compter = 0;

            var LoginClient =  firstname + lastname;

            //Recuperer la list de tous les logins
            <?php $Logins= SelectLogin(); foreach ($Logins as $login): ?>
                Logins.push("<?php echo $login['login'];?>");
            <?php endforeach; ?>

            //Recuperer la longuer du login actuelle
            var longuerDuNom = LoginClient.length;
            //Tableau pour tous les numeros aprés le nom du login
            var numeroLogin = new Array();
            var loginExiste = false;

           for(var i=0; i<Logins.length; i++){

               //Si il existe un login avec le meme nom
                if(Logins[i].includes(LoginClient)){
                    //Recuperer la valeur du login existant
                    var longuer= Logins[i].length;
                    //Add la diference (le numero) dans le tableau
                    numeroLogin[compter] = Logins[i].substring(longuerDuNom);
                    compter++;
                    loginExiste = true;
                }
           }

           var max = 0;
           for(var e = 0; e<numeroLogin.length; e++){
               //Recuperer le max, le dernier numero
               if(numeroLogin[e]>max){
                   max = numeroLogin[e];
               }
           }

           if(loginExiste){
               //Add le login avec un numero plus grand qui le procedent
                max = parseInt(max) + parseInt("1")
               LoginClient = LoginClient+max;
           }

            document.getElementById("loginName").value = LoginClient;
            document.getElementById("loginPassword").value = firstname;
        }
    }
    function ShowPassword(){
        var x = document.getElementById("loginPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    $(document).ready(function() {

        var data = {};
        $("#browsers option").each(function(i,el) {
            data[$(el).data("value")] = $(el).val();
        });
// `data` : object of `data-value` : `value`
        console.log(data, $("#browsers option").val());


        $('#submit').click(function()
        {
            var value = $('#selected').val();
            var value2=$('#browsers [value="' + value + '"]').data('value');
            alert(value2);
        });
    });
    //Recuperer la date du jour pour le formulaire intervention
    var d = new Date();
    document.getElementById("date").valueAsDate=d;
</script>
<!-- stats.js -->
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<script src="js/lib/stats.js"></script>
</body>
</html>