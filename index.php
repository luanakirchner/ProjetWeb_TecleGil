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
        default:
            home();
    }
}
else{
    home();
}
?>