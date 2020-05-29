<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
require 'model/model.php';

function home(){
    require 'View/Home.php';
}
function NousServices(){
    require 'View/NousServices.php';
}

/*
-- Function send email and show the contact page
*/
function Contact($infoContact){

    //Si le Post ne contient pas des informations
    if(empty($infoContact)){
        require 'View/Contact.php';
    }
    //Si le Post contient des informations
    else{
        try {

            Captcha();

            $Nom = $infoContact["nom"];

            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );

            $to = "luanabannwart@gmail.com";

            $subject = "Test";
            $message ="<HTML><BODY>";
            $message .= "test<br/>";
            $message .="</BODY></HTML>";

            $headers = "From: \"TecleGil\"<luana.kirchner-bannwart@infoshop.mycpnv.ch>\n";
            $headers .= "Reply-To: luana.kirchner-bannwart@infoshop.mycpnv.ch\n";
            $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

            mail($to,$subject,$message,$headers);
               $_GET['EmailMessage'] = "<div class='alert alert-success'>Votre email a été envoyer</div>";
               $_GET['action'] = "Contact";
               require 'View/Contact.php';

           /* else{
                throw  new  Exception("<div class='alert alert-danger'>L'email n'as pas peut entre envoyer</div>");
            }*/

        }
        catch (Exception $e){
            $_GET['EmailMessage'] =$e->getMessage();
            $_GET['action'] = "Contact";
            require 'View/Contact.php';
        }
    }
}
function Captcha(){

    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Lc0gvkUAAAAAOLwb9d2b-ra3AS4CtMtu0rO4_3d',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
            $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the reCAPTCHA is not properly set up
        throw  new  Exception("<div class='alert alert-danger'>Essayer plus tard</div>");
    }
}
function QuiSommesNous(){
    require 'View/QuiSommesNous.php';
}
function Login($login){

    if(!empty($login["user"])&& !empty($login["password"])){

        $name = $login["user"];
        $password = $login["password"];

        if($name == "adminLuana"){
            $admin = true;
            $logincorrect =  IsLoginCorrectAdmin($name,$password);

        }
       if($name !="adminLuana"){
           $logincorrect =  IsLoginCorrectCustomers($name,$password);
           $admin = false;
        }

       if($logincorrect){
           CreateSession($name,$admin);
           $_GET['loginError'] = false;
           if($admin){
               $_GET['action']="AdmStatusEnCours";
               require 'View/AdmStatusEnCours.php';
           }
           else{
               $_GET['action'] = "Client";
               Client($name);
           }
       } else{
           $_GET['loginError'] = true;
           $_GET['action'] = "Login";
           require 'View/Login.php';
       }
    }
    else{
        $_GET['action'] = "Login";
        require 'View/Login.php';
    }

}
function Client($login){

    $Client = SelectCustomersWhereLogin($login);
    $infoIntervention = SelectInterventionWhereClient($Client[0]["id"]);
    $_GET["Nom"] = $Client[0]["firstname"];
    $_GET["id"] = $Client[0]["id"];
    $_GET["email"] = $Client[0]["email"];
    $_GET["login"] = $login;
    require 'View/Client.php';
}
function AdmStatusEnCours(){

    if(@$_SESSION["admin"]) {
        require 'View/AdmStatusEnCours.php';
    }
    else{
        require 'View/Home.php';
    }
}


function NouvelleIntervention($intervention){

    if(@$_SESSION["admin"]) {
        if (empty($intervention)) {
            $Customers = SelectCustomers();
            $OS = SelectMaxIdIntervention();
            require 'View/Intervention.php';
        } else {

            //Verifier si la couleur existe déjà
            $ResultColor = SelectColorWhereNom($intervention["couleur"]);
            //Si existe = recuperer l'id
            if (count($ResultColor) == 1) {
                $idColor = $ResultColor[0]["id"];
            } //Si existe pas = l'inserer
            else {
                $idColor = InsertColor($intervention["couleur"]);
            }

            //Inserer les données dans la table equipement
            $idEquipement = InsertEquipement($intervention["equipement"], $intervention["driver"], $intervention["caracteristique"], $intervention["passwordPC"], $idColor);

            if ($intervention["status"] == "En file d'attente") {
                $idStatus = 1;
            }
            if ($intervention["status"] == "En cours") {
                $idStatus = 2;
            }
            if ($intervention["status"] == "Prêt") {
                $idStatus = 3;
            }

            //Inserer l'intervention
            $Result = InsertIntervention($intervention["OS"], $intervention, $idEquipement, $intervention["idClient"], $idStatus);
            if ($Result) {
                $_GET["MessageConfirm"] = "<div class='alert alert-success'>Les données ont été bien enregister dans la base de données</div>";
            } else {
                $_GET["MessageConfirm"] = "<div class='alert alert-danger'>Un erreur a été produit</div>";
            }

            $Customers = SelectCustomers();
            $OS = SelectMaxIdIntervention();
            $_GET['action'] = "NouvelleIntervention";
            require 'View/Intervention.php';

        }
    }
    else{
        require 'View/Home.php';
    }
}


function AjouterClient(){

    if(@$_SESSION["admin"]) {
        require 'View/AjouterClient.php';
    }
    else{
        require 'View/Home.php';
    }

}
function AjouterClientForm($Client){

    if(@$_SESSION["admin"]) {
        if (empty($Client)) {
            require 'View/AjouterClient.php';
        } else {

            $hashPassword = md5($Client["password"]);

            //Verifier si la localite existe deja
            $ResultLocality = SelectLocalitie($Client["city"]);
            //Si existe = recuperer l'id
            if (count($ResultLocality) == 1) {
                $idLocality = $ResultLocality[0]["id"];
            } //Si existe pas = l'inserer
            else {
                $idLocality = InsertLocalities($Client["city"], $Client["npa"]);
            }

            $confirm = InsertCustomers($Client, $hashPassword, $idLocality);
            if ($confirm) {

                $messageEmail = "L'email avec le login n'as pas peut etrê envoyé au client";
                //Si la case pour envoyer le login a été coché
                if(isset($Client["EnvoyerLeLogin"])){
                    if($Client["email"]!="") {
                        try {


                            ini_set('display_errors', 1);
                            error_reporting(E_ALL);

                            $to = $Client["email"];

                            $subject = "Votre login chez TecleGil";
                            $message = "<HTML><BODY>";
                            $message .= "Bonjour" . $Client['firstname'] . "<br/>";
                            $message .= "Voice votre login:<br/>";
                            $message .= "Login:" . $Client["login"] . "<br/>";
                            $message .= "Mot de passe:" . $Client["password"] . "<br/>";
                            $message .= "Vous pouvez se connecter dans notre site pour savoir l'état de votre matériel<br/>";
                            $message .= "<a href = 'http://infoshop.mycpnv.ch/' >TecleGil.com</a><br/><br/>";
                            $message .= "Merci pour votre confiance<br/>";
                            $message .= "</BODY></HTML>";

                            $headers = "From: \"TecleGil\"<luana.kirchner-bannwart@infoshop.mycpnv.ch>\n";
                            $headers .= "Reply-To: luana.kirchner-bannwart@infoshop.mycpnv.ch\n";
                            $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

                            if(mail($to, $subject, $message, $headers)) {
                                $messageEmail = "Le login a été envoyé";
                            } else {
                                $messageEmail = "Un erreur se produit pour envoyer le login au client";
                            }
                        }catch (Exception $e){

                        }
                    }
                    else{
                        $messageEmail = "L'email avec le login n'as pas peut etrê envoyé au client";
                    }
                }

                $_GET["MessageConfirm"] = "<div class='alert alert-success'>Le client a été ajouté à la base de données. ".$messageEmail."</div>";

            }
            else {
                $_GET["MessageConfirm"] = "<div class='alert alert-danger'>Un erreur se produit</div>";
            }

            $_GET['action'] = "AjouterClient";
            require 'View/AjouterClient.php';
        }
    }
    else{
        require 'View/Home.php';
    }
}

function TousLesClients(){
    if(@$_SESSION["admin"]) {
        $resultatClients = SelectCustomers();
        require 'View/TousLesClients.php';
    }
    else{
        require 'View/Home.php';
    }

}
function DetailClient($idClient){
    if(@$_SESSION["admin"]) {
        $infoClient = SelectCustomersWhereId($idClient["idClient"]);
        $_GET["idDuClient"] = $idClient["idClient"];
        $infoInterventions = SelectInterventionsnWhereIdCustomer($idClient["idClient"]);
        require 'View/DetailClient.php';
    }
    else{
        require 'View/Home.php';
    }
}
function UpdateCustomer($client){
    if(@$_SESSION["admin"]) {
        if (empty($client)) {
            require 'View/Home.php';
        } else {
            //Verifier si la localite existe deja
            $ResultLocality = SelectLocalitie($client["city"]);
            //Si existe = recuperer l'id
            if (count($ResultLocality) == 1) {
                $idLocality = $ResultLocality[0]["id"];
            } //Si existe pas = l'inserer
            else {
                $idLocality = InsertLocalities($client["city"], $client["npa"]);
            }

            $confirm = UpdateCoustomer($client["idClient"], $client["firstname"], $client["lastname"], $client["telephone"], $client["email"], $client["login"], $client["street"], $idLocality);

            if ($confirm) {
                $_GET["MessageConfirm"] = "<div class='alert alert-success'>Le client a été ajouté à la base de données</div>";
            } else {
                $_GET["MessageConfirm"] = "<div class='alert alert-danger'>Un erreur se produit</div>";
            }
            $infoClient = SelectCustomersWhereId($client["idClient"]);
            $_GET["idDuClient"] = $client["idDuClient"];
            $infoInterventions = SelectInterventionsnWhereIdCustomer($client["idClient"]);
            require 'View/DetailClient.php';
        }
    }
    else{
        require 'View/Home.php';
    }

}

function UpdateIntervention($intervention){

    if(@$_SESSION["admin"]) {
        if (empty($intervention)) {
            require 'View/Home.php';
        } else {
            //Verifier si la couleur existe déjà
            $ResultColor = SelectColorWhereNom($intervention["couleur"]);
            //Si existe = recuperer l'id
            if (count($ResultColor) == 1) {
                $idColor = $ResultColor[0]["id"];
            } //Si existe pas = l'inserer
            else {
                $idColor = InsertColor($intervention["couleur"]);
            }
            if ($intervention["status"] == "En file d'attente") {
                $idStatus = 1;
            }
            if ($intervention["status"] == "En cours") {
                $idStatus = 2;
            }
            if ($intervention["status"] == "Prêt") {
                $idStatus = 3;
            }

            UpdateEquiment($intervention["idEquipment"], $intervention["driver"], $intervention["caracteristique"], $intervention["passwordPC"], $idColor);

            $today = date("Y-m-d");

            $confirm = UpdateInterventionWhereIntervention($intervention["idIntervention"], $intervention["accessoires"], $intervention["descriptionAdm"], $intervention["descriptionClient"], $intervention["probleme"], $intervention["service"], $idStatus, $today);
            if ($confirm) {
                $_GET["MessageConfirm"] = "<div class='alert alert-success'>Le client a été ajouté à la base de données</div>";
            } else {
                $_GET["MessageConfirm"] = "<div class='alert alert-danger'>Un erreur se produit</div>";
            }

            $infoClient = SelectCustomersWhereId($intervention["idDuClient"]);
            $_GET["idDuClient"] = $intervention["idDuClient"];
            $infoInterventions = SelectInterventionsnWhereIdCustomer($intervention["idDuClient"]);
            require 'View/DetailClient.php';
        }
    }
    else{
        require 'View/Home.php';
    }
}

function Logout(){
    $_SESSION = array();
    session_destroy();
    $_GET['action'] = "home";
    require 'View/Home.php';
}
function EmailClientAdm($infos){

    $login = $infos["login"];
    try {

        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $to = "luanabannwart@gmail.com";
        $client =  $infos["email"];

        $subject = "Votre login chez TecleGil";
        $message = "<HTML><BODY>";
        $message .= "Vous avez un message de " . $infos['nom'] . "<br/><br/>";
        $message .= $infos["messageDuClient"] . "<br/><br/>";
        $message .= "OS:" . $infos["os"] . "<br/>";
        $message .= "</BODY></HTML>";

        $headers = "From: \"TecleGil\"$client\n";
        $headers .= "Reply-To: $client\n";
        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

        if (mail($to, $subject, $message, $headers)) {
            $_GET['EmailMessage'] = "<div class='alert alert-success'>Votre email a été envoyer</div>";
        } else {
            $_GET['EmailMessage'] = "<div class='alert alert-danger'>Un erreur se produit</div>";
        }
    }catch (Exception $e){
        $_GET['EmailMessage'] = "<div class='alert alert-danger'>Un erreur se produit</div>";
    }
    Client($login);
}