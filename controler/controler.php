<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
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
        $_GET['action'] = "Client";
        require 'View/Client.php';
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