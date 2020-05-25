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
               require 'View/Client.php';
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
function Client(){
    require 'View/Client.php';
}
function AdmStatusEnCours(){
    require 'View/AdmStatusEnCours.php';
}


function NouvelleIntervention($intervention){
    if(empty($intervention)) {
        $Customers = SelectCustomers();
        $OS = SelectMaxIdIntervention();
        require 'View/Intervention.php';
    }
    else{

        //Verifier si la couleur existe déjà
        $ResultColor = SelectColorWhereNom($intervention["couleur"]);
        //Si existe = recuperer l'id
        if(count($ResultColor)==1){
            $idColor= $ResultColor[0]["id"];
        }
        //Si existe pas = l'inserer
        else{
            $idColor = InsertColor($intervention["couleur"]);
        }

        //Inserer les données dans la table equipement
        $idEquipement = InsertEquipement($intervention["equipement"],$intervention["driver"],$intervention["caracteristique"],$intervention["passwordPC"],$idColor);

        if($intervention["status"] == "En file d'attente"){$idStatus = 1;}
        if($intervention["status"] == "En cours"){$idStatus = 2;}
        if($intervention["status"] == "Prêt"){$idStatus = 3;}

        //Inserer l'intervention
        $Result = InsertIntervention($intervention["OS"],$intervention,$idEquipement,$intervention["idClient"],$idStatus);
        if($Result){
            $_GET["MessageConfirm"] = "<div class='alert alert-success'>Les données ont été bien enregister dans la base de données</div>";
        }
        else{
            $_GET["MessageConfirm"] = "<div class='alert alert-danger'>Un erreur a été produit</div>";
        }

        $Customers = SelectCustomers();
        $OS = SelectMaxIdIntervention();
        $_GET['action'] = "NouvelleIntervention";
        require 'View/Intervention.php';

    }
}


function AjouterClient($Client){

    if(empty($Client)) {
        require 'View/AjouterClient.php';
    }
    else{

        $hashPassword = md5($Client["password"]);

        //Verifier si la localite existe deja
        $ResultLocality= SelectLocalitie($Client["city"]);
        //Si existe = recuperer l'id
        if(count($ResultLocality)==1){
            $idLocality= $ResultLocality[0]["id"];
        }
        //Si existe pas = l'inserer
        else{
            $idLocality = InsertLocalities($Client["city"], $Client["npa"]);
        }

        $confirm = InsertCustomers($Client,$hashPassword,$idLocality);
        if($confirm){
            $_GET["MessageConfirm"] = "<div class='alert alert-success'>Le client a été ajouté à la base de données</div>";
        }
        else{
            $_GET["MessageConfirm"] = "<div class='alert alert-danger'>Un erreur se produit</div>";
        }
        $_GET['action'] = "AjouterClient";
        require 'View/AjouterClient.php';
    }
}