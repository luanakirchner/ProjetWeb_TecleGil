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
function Contact(){
    require 'View/Contact.php';
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
function NouvelleIntervention(){
    require 'View/Intervention.php';
}
function AjouterClient(){
    require 'View/AjouterClient.php';
}