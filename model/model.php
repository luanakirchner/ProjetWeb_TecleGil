<?php

function IsLoginCorrectCustomers($login,$password){
    $result = false;
    $strSeparator = '\'';
    require_once  'model/dbconnection.php';

    $loginQuery = 'SELECT * FROM customers WHERE login ='.$strSeparator.$login.$strSeparator.';';
    $queryResult = executeQuerySelect($loginQuery);

    if(count($queryResult) == 1){
        $userHashPsw = $queryResult[0]['password'];
        $hashpasswordDebug = password_hash($password, PASSWORD_DEFAULT);
        $result = password_verify($password, $userHashPsw);

        return $result;
    }
    else{
        return $result;
    }
}

function IsLoginCorrectAdmin($login,$password){
    $result = false;
    $strSeparator = '\'';
    require_once  'model/dbconnection.php';

    $loginQuery = 'SELECT * FROM administrators WHERE login ='.$strSeparator.$login.$strSeparator.';';
    $queryResult = executeQuerySelect($loginQuery);

    if(count($queryResult) == 1){
        $userHashPsw = $queryResult[0]['password'];
        $hashpasswordDebug = password_hash($password, PASSWORD_DEFAULT);
        $result = password_verify($password, $userHashPsw);

        return $result;
    }
    else{
        return $result;
    }
}

function CreateSession($login, $admin){
    $_SESSION['$login'] = $login;
    $_SESSION['admin'] = $admin;
}

function InsertCustomers($Client,$password,$idLocality){

    require_once  'model/dbconnection.php';
    $separ = '\'';
    $customer= 'INSERT INTO `customers`(`firstName`, `lastname`, `telephone`, `street`, `email`, `login`, `password`,`Localities_id`) VALUES('.$separ.addslashes($Client["firstname"]).$separ.','.$separ.addslashes($Client["lastname"]).$separ.','.$separ.$Client["telephone"].$separ.','.$separ.addslashes($Client["street"]).$separ.','.$separ.$Client["email"].$separ.','.$separ.$Client["login"].$separ.','.$separ.$password.$separ.','.$separ.$idLocality.$separ.')';
    $queryResult = executeQueryIDU($customer);
    echo $queryResult;
    return $queryResult;
}

function InsertLocalities($locality,$npa){

    $strSeparator = '\'';
    $Result = 'INSERT INTO `localities`(`city`, `npa`) VALUES  ('.$strSeparator.$locality.$strSeparator.','.$strSeparator.$npa.$strSeparator.');';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);

    if($queryResult){
        $getlastid = MaxIdLocalities();
        $idLocality = $getlastid[0]['id'];
    }

    return $idLocality;
}
function MaxIdLocalities(){
    $req = 'SELECT MAX(`id`)as id FROM `localities`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}
function SelectLocalitie($locality){
    $strSeparator = '\'';
    $Result = 'SELECT * FROM `localities` WHERE city='.$strSeparator.$locality.$strSeparator.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}

function SelectCustomers(){
    $Result = 'SELECT * FROM `customers`';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}
function SelectMaxIdIntervention(){
    $req = 'SELECT MAX(`id`)as id FROM `interventions`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}
function SelectColorWhereNom($nom){
    $strSeparator = '\'';
    $Result = 'SELECT * FROM `colors` WHERE `color`='.$strSeparator.$nom.$strSeparator.'; ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}
function MaxIdColor(){
    $req = 'SELECT MAX(`id`)as id FROM `colors`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}

function InsertColor($color){
    $strSeparator = '\'';
    $Result = 'INSERT INTO `colors`(`color`) VALUES ('.$strSeparator.$color.$strSeparator.');';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);

    if($queryResult){
        $getlastid = MaxIdColor();
        $idLocality = $getlastid[0]['id'];
    }

    return $idLocality;
}
function InsertEquipement($equipment, $driver, $characteristics, $password, $idColor){
    $strSeparator = '\'';
    $Result = 'INSERT INTO `equipments`(`equipment`, `driver`, `characteristics`, `password`, `Colors_id`) VALUES('.$strSeparator.$equipment.$strSeparator.','.$strSeparator.addslashes($driver).$strSeparator.','.$strSeparator.addslashes($characteristics).$strSeparator.','.$strSeparator.$password.$strSeparator.','.$strSeparator.$idColor.$strSeparator.');';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);

    if($queryResult){
        $getlastid = MaxIdEquipement();
        $idLocality = $getlastid[0]['id'];
    }

    return $idLocality;
}
function MaxIdEquipement(){
    $req = 'SELECT MAX(`id`)as id FROM `equipments`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}
function InsertIntervention($OS,$intervention,$idEquipement,$idClient,$idStatus){
    $strSep = '\'';
    $Result= 'INSERT INTO `interventions`() VALUES ('.$strSep.$OS.$strSep.','.$strSep.addslashes($intervention["accessoires"]).$strSep.','.$strSep.addslashes($intervention["descriptionClient"]).$strSep.','.$strSep.addslashes($intervention["descriptionAdm"]).$strSep.','.$strSep.addslashes($intervention["probleme"]).$strSep.','.$strSep.addslashes($intervention["service"]).$strSep.','.$strSep.$intervention["date"].$strSep.',null,'.$strSep.$intervention["date"].$strSep.','.$strSep.$idEquipement.$strSep.','.$strSep.$idStatus.$strSep.','.$strSep.$idClient.$strSep.');';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}