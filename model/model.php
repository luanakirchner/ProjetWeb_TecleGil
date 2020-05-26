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
    $Result = 'SELECT * FROM `customers`ORDER by firstname';
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

function SelectCustomersWhereId($id){
    $strSeparator = '\'';
    $Result = 'SELECT customers.id,customers.firstname,customers.lastname, customers.telephone, customers.street, customers.email, customers.login, customers.password, localities.city, localities.npa FROM `customers` Inner JOIN localities on customers.Localities_id = localities.id WHERE customers.id='.$strSeparator.$id.$strSeparator.'; ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}

function SelectInterventionsnWhereIdCustomer($idClient){

    $strSeparator = '\'';
    $Result='SELECt status.status, interventions.id as idIntervention, interventions.accessories, interventions.descriptionCustomer, interventions.descriptionAdm, interventions.problem, interventions.service, interventions.arrivalDate, equipments.equipment,equipments.id as idEquipment, equipments.driver, equipments.id as idEquipement,  equipments.characteristics, equipments.password, colors.color FROM `interventions` INNER JOIN status on interventions.Status_id = status.id INNER JOIN equipments on interventions.Equipments_id= equipments.id Left JOIN colors on equipments.Colors_id = colors.id WHERE interventions.Customers_id = '.$strSeparator.$idClient.$strSeparator.' AND status.id != 3  ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;

}

function UpdateCoustomer($idClient,$firstname,$lastname,$telephone,$email,$login,$street,$idLocality){
    $sep = '\'';
    $Result='UPDATE `customers` SET `firstname`='.$sep.addslashes($firstname).$sep.',`lastname`='.$sep.addslashes($lastname).$sep.',`telephone`='.$sep.$telephone.$sep.',`street`='.$sep.addslashes($street).$sep.',`email`='.$sep.$email.$sep.',`login`='.$sep.addslashes($login).$sep.',`Localities_id`='.$sep.$idLocality.$sep.' WHERE `id`='.$sep.$idClient.$sep.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}
function UpdateEquiment($idEquipment, $driver,$characteristics,$password,$idColor){
    $sep = '\'';
    $Result='UPDATE `equipments` SET `driver`='.$sep.addslashes($driver).$sep.',`characteristics`='.$sep.addslashes($characteristics).$sep.',`password`='.$sep.$password.$sep.',`Colors_id`='.$sep.$idColor.$sep.' WHERE `id`='.$sep.$idEquipment.$sep.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}
function UpdateIntervention($idIntervention,$accessories,$descAdm,$descCustomer,$problem,$service,$idStatus,$date){
    $sep = '\'';
    $Result='UPDATE `interventions` SET `accessories`='.$sep.addslashes($accessories).$sep.', `descriptionCustomer`='.$sep.addslashes($descCustomer).$sep.',`descriptionAdm`='.$sep.addslashes($descAdm).$sep.',`problem`='.$sep.addslashes($problem).$sep.',`service`='.$sep.addslashes($service).$sep.', `lastUpdate`='.$sep.$date.$sep.',`Status_id`='.$sep.$idStatus.$sep.',WHERE id='.$sep.$idIntervention.$sep.'; ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}