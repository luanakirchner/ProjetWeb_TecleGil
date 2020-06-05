<?php
/*Luana Kirchner Bannwart
 * 05/2020
 * Version 1.0
 */
session_start();
require 'controler/controler.php';
if(isset($_GET['action'])){
    $action = $_GET['action'];

    switch ($action){
        case 'home':
            home();
            break;
        case 'NousServices':
            NousServices();
            break;
        case 'Contact':
             Contact($_POST);
             break;
        case 'QuiSommesNous':
            QuiSommesNous();
            break;
        case 'Login':
            Login($_POST);
            break;
        case 'Client':
            Client($_POST);
            break;
        case 'AdmStatusEnCours':
            AdmStatusEnCours();
            break;
        case 'NouvelleIntervention':
            NouvelleIntervention($_POST);
            break;
        case 'AjouterClient':
            AjouterClient();
            break;
        case 'TousLesClients':
            TousLesClients();
            break;
        case 'DetailClient':
            DetailClient($_GET);
            break;
        case 'UpdateCustomer':
            UpdateCustomer($_POST);
            break;
        case 'UpdateIntervention':
            UpdateIntervention($_POST);
            break;
        case 'Logout':
            Logout();
            break;
        case 'AjouterClientForm':
            AjouterClientForm($_POST);
            break;
        case 'EmailClientAdm':
            EmailClientAdm($_POST);
            break;
        case 'NousServicesAdm':
            NousServicesAdm($_POST);
            break;
        case 'MotDePasseOblie':
            MotDePasseOblie($_POST);
            break;
        default:
            home();

    }
}
else{
    home();
}
?>