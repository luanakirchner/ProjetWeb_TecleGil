<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
require 'model/model.php';

/*
 * Afficher la page Home du site
*/
function home(){
    require 'View/Home.php';
}

/*
 * Afficher la page Nos services du site
*/
function NousServices(){
    $infoNousServices = SelectNousServices();
    require 'View/NousServices.php';
}

/*
 * Afficher la page Nous services Adm du site
 * Modifier les informations de la page
*/
function NousServicesAdm($service){
    if(@$_SESSION["admin"]) {
        if (empty($service)) {
            $infoNousServices = SelectNousServices();
            require 'View/NousServicesAdm.php';
        }
        else{
            //Si un image a été selectionnée
            if($_FILES['addPhoto']['name'] != ""){
                //Recuperer le nom de l'image
                $nameImage = $_FILES['addPhoto']['name'];
                //Transferer l'image dans le dossier image
                if(move_uploaded_file($_FILES['addPhoto']['tmp_name'], "img/$nameImage")){
                    $service['Photo'] = "img/$nameImage";
                }
                else{
                    $_GET["Erreur"] ="<div class='alert alert-danger'>Problème avec la photo</div>";
                }
            }

            $result = UpadateServices($service["idService"],$service["title"],$service["Photo"],$service["description"]);
            if($result){
                $_GET["MessageConfirm"] = "<div class='alert alert-success'>Les données ont été bien enregister dans la base de données</div>";
            }
            else{
                $_GET["MessageConfirm"] = "<div class='alert alert-danger'>Un problème est arrivé</div>";
            }
            $infoNousServices = SelectNousServices();
            require 'View/NousServicesAdm.php';
        }
    }
    else{
        require 'View/Home.php';
    }
}

/*
 * Afficher la page Contact du site
 * Envoyer l'email au administrateur
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

/*
 * Function captcha pour la page contact du site
*/
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

/*
 * Afficher la page Qui Sommes nous
*/
function QuiSommesNous(){
    require 'View/QuiSommesNous.php';
}

/*
 * Afficher la page Login
 * Se connecter au site
*/
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

/*
 * Afficher la page Client du site aprés sa connection
*/
function Client($login){

    $Client = SelectCustomersWhereLogin($login);
    $infoIntervention = SelectInterventionWhereClient($Client[0]["id"]);
    $_GET["Nom"] = $Client[0]["firstname"];
    $_GET["id"] = $Client[0]["id"];
    $_GET["email"] = $Client[0]["email"];
    $_GET["login"] = $login;
    require 'View/Client.php';
}

/*
 * Afficher la page administrateur avec les de l'intervention status en cours
*/
function AdmStatusEnCours(){

    if(@$_SESSION["admin"]) {
        require 'View/AdmStatusEnCours.php';
    }
    else{
        require 'View/Home.php';
    }
}

/*
 * Afficher la page Nouvelle intervention
 * Ajouter un intervention dans la base de données
*/
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

/*
 * Afficher la page Ajouter un client
*/
function AjouterClient(){

    if(@$_SESSION["admin"]) {
        require 'View/AjouterClient.php';
    }
    else{
        require 'View/Home.php';
    }

}

/*
 * Ajouter un client dans la base de données
*/
function AjouterClientForm($Client){

    if(@$_SESSION["admin"]) {
        if (empty($Client)) {
            require 'View/AjouterClient.php';
        } else {

            $hashPassword= password_hash($Client["password"], PASSWORD_DEFAULT);

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

                $messageEmail = "";
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
                            echo $e->getMessage();
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

/*
 * Afficher la page avec tous les clients existant dans la base de données
*/
function TousLesClients(){
    if(@$_SESSION["admin"]) {
        $resultatClients = SelectCustomers();
        require 'View/TousLesClients.php';
    }
    else{
        require 'View/Home.php';
    }

}

/*
 * Afficher la page avec tous les information du client selectionée
*/
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

/*
 * Changer les informations du client
*/
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
            $hashPassword= password_hash($client["password"], PASSWORD_DEFAULT);
            $confirm = UpdateCoustomer($client["idClient"], $client["firstname"], $client["lastname"], $client["telephone"], $client["email"], $client["login"], $client["street"],$hashPassword, $idLocality);

            if ($confirm) {
                $messageEmail ="";
                //Si la case pour envoyer le login a été coché
                if(isset($client["EnvoyerLeLogin"])){
                    if($client["email"]!="") {
                        try {

                            ini_set('display_errors', 1);
                            error_reporting(E_ALL);

                            $to = $client["email"];

                            $subject = "Votre login chez TecleGil";
                            $message = "<HTML><BODY>";
                            $message .= "Bonjour" . $client['firstname'] . "<br/>";
                            $message .= "Voice votre login:<br/>";
                            $message .= "Login:" . $client["login"] . "<br/>";
                            $message .= "Mot de passe:" . $client["password"] . "<br/>";
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
                            $messageEmail = "Un erreur se produit pour envoyer le login au client";
                        }
                    }
                    else{
                        $messageEmail = "L'email avec le login n'as pas peut etrê envoyé au client";
                    }
                }
                $_GET["MessageConfirm"] = "<div class='alert alert-success'>Le client a été modifié à la base de données. ".$messageEmail."</div>";
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

/*
 * Afficher les information de une intervention
*/
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
            /*---Recuperer le id du status--*/
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
                //Si l'intervention est prêt
                if($idStatus==3){
                    StatusPret($intervention["idIntervention"],$today);
                    //Envoyer l'email
                }
                $_GET["MessageConfirm"] = "<div class='alert alert-success'>La modification a été fait</div>";
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

/*
 * Se déconnecter du site
*/
function Logout(){
    $_SESSION = array();
    session_destroy();
    $_GET['action'] = "home";
    require 'View/Home.php';
}

/*
 * Envoyer un email au administrateur du site à partir de la page client
*/
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

/*
 * Envoyer un email au administrateur du site pour soliciter un nouveau mot de passe
*/
function MotDePasseOblie($infos){

    if(empty($infos)){
        require "View/MotDePasseOblie.php";
    }
    else{
        try {
            $to = "luanabannwart@gmail.com";
            $nom = $infos["nom"];
            $prenom = $infos["prenom"];

            $subject = "Mot de passe oblie";
            $message = "<HTML><BODY>";
            $message .= "Vous avez une demande de recuperation de mot de passe, de la part de: " .$nom." ".$prenom."<br/><br/>";
            $message .= "</BODY></HTML>";

            $headers = "From: \"TecleGil\"<luana.kirchner-bannwart@infoshop.mycpnv.ch>\n";
            $headers .= "Reply-To: luana.kirchner-bannwart@infoshop.mycpnv.ch\n";
            $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

            if (mail($to, $subject, $message, $headers)) {
                $_GET['MessageConfirm'] = "<div class='alert alert-success'>Votre demande a été envoyer</div>";
            } else {
                $_GET['MessageConfirm'] = "<div class='alert alert-danger'>Un erreur se produit</div>";
            }
        }
        catch (Exception $e){
            $_GET['MessageConfirm'] = "<div class='alert alert-danger'>Un erreur se produit</div>";
         }
        require "View/MotDePasseOblie.php";
    }
}