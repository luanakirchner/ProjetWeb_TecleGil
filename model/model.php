<?php

function IsLoginCorrectCustomers($login,$password){
    $result = false;
    $strSeparator = '\'';
    require_once  'model/dbconnection.php';

    $loginQuery = 'SELECT * FROM Customers WHERE login ='.$strSeparator.$login.$strSeparator.';';
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
function SelectCustomersWhereLogin($login){
    $result = false;
    $strSeparator = '\'';
    require_once  'model/dbconnection.php';

    $loginQuery = 'SELECT * FROM Customers WHERE login ='.$strSeparator.$login.$strSeparator.';';
    $queryResult = executeQuerySelect($loginQuery);
    return $queryResult;
}

function IsLoginCorrectAdmin($login,$password){
    $result = false;
    $strSeparator = '\'';
    require_once  'model/dbconnection.php';

    $loginQuery = 'SELECT * FROM Administrators WHERE login ='.$strSeparator.$login.$strSeparator.';';
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
    $_SESSION['login'] = $login;
    $_SESSION['admin'] = $admin;
}

function InsertCustomers($Client,$password,$idLocality){

    require_once  'model/dbconnection.php';
    $separ = '\'';
    $customer= 'INSERT INTO `Customers`(`firstName`, `lastname`, `telephone`, `street`, `email`, `login`, `password`,`Localities_id`) VALUES('.$separ.addslashes($Client["firstname"]).$separ.','.$separ.addslashes($Client["lastname"]).$separ.','.$separ.$Client["telephone"].$separ.','.$separ.addslashes($Client["street"]).$separ.','.$separ.$Client["email"].$separ.','.$separ.$Client["login"].$separ.','.$separ.$password.$separ.','.$separ.$idLocality.$separ.')';
    $queryResult = executeQueryIDU($customer);
    echo $queryResult;
    return $queryResult;
}

function InsertLocalities($locality,$npa){

    $strSeparator = '\'';
    $Result = 'INSERT INTO `Localities`(`city`, `npa`) VALUES  ('.$strSeparator.$locality.$strSeparator.','.$strSeparator.$npa.$strSeparator.');';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);

    if($queryResult){
        $getlastid = MaxIdLocalities();
        $idLocality = $getlastid[0]['id'];
    }

    return $idLocality;
}
function MaxIdLocalities(){
    $req = 'SELECT MAX(`id`)as id FROM `Localities`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}
function SelectLocalitie($locality){
    $strSeparator = '\'';
    $Result = 'SELECT * FROM `Localities` WHERE city='.$strSeparator.$locality.$strSeparator.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}

function SelectCustomers(){
    $Result = 'SELECT * FROM `Customers`ORDER by firstname';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}
function SelectMaxIdIntervention(){
    $req = 'SELECT MAX(`id`)as id FROM `Interventions`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}
function SelectColorWhereNom($nom){
    $strSeparator = '\'';
    $Result = 'SELECT * FROM `Colors` WHERE `color`='.$strSeparator.$nom.$strSeparator.'; ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}
function MaxIdColor(){
    $req = 'SELECT MAX(`id`)as id FROM `Colors`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}

function InsertColor($color){
    $strSeparator = '\'';
    $Result = 'INSERT INTO `Colors`(`color`) VALUES ('.$strSeparator.$color.$strSeparator.');';

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
    $Result = 'INSERT INTO `Equipments`(`equipment`, `driver`, `characteristics`, `password`, `Colors_id`) VALUES('.$strSeparator.$equipment.$strSeparator.','.$strSeparator.addslashes($driver).$strSeparator.','.$strSeparator.addslashes($characteristics).$strSeparator.','.$strSeparator.$password.$strSeparator.','.$strSeparator.$idColor.$strSeparator.');';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);

    if($queryResult){
        $getlastid = MaxIdEquipement();
        $idLocality = $getlastid[0]['id'];
    }

    return $idLocality;
}
function MaxIdEquipement(){
    $req = 'SELECT MAX(`id`)as id FROM `Equipments`;';
    $resultats = executeQuerySelect($req);
    return $resultats;
}
function InsertIntervention($OS,$intervention,$idEquipement,$idClient,$idStatus){
    $strSep = '\'';
    $Result= 'INSERT INTO `Interventions`() VALUES ('.$strSep.$OS.$strSep.','.$strSep.addslashes($intervention["accessoires"]).$strSep.','.$strSep.addslashes($intervention["descriptionClient"]).$strSep.','.$strSep.addslashes($intervention["descriptionAdm"]).$strSep.','.$strSep.addslashes($intervention["probleme"]).$strSep.','.$strSep.addslashes($intervention["service"]).$strSep.','.$strSep.$intervention["date"].$strSep.',null,'.$strSep.$intervention["date"].$strSep.','.$strSep.$idEquipement.$strSep.','.$strSep.$idStatus.$strSep.','.$strSep.$idClient.$strSep.');';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}

function SelectCustomersWhereId($id){
    $strSeparator = '\'';
    $Result = 'SELECT Customers.id,Customers.firstname,Customers.lastname, Customers.telephone, Customers.street, Customers.email, Customers.login, Customers.password, Localities.city, Localities.npa FROM `Customers` Inner JOIN Localities on Customers.Localities_id = Localities.id WHERE Customers.id='.$strSeparator.$id.$strSeparator.'; ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}

function SelectInterventionsnWhereIdCustomer($idClient){

    $strSeparator = '\'';
    $Result='SELECt Status.status, Interventions.id as IdIntervention, Interventions.accessories, Interventions.descriptionCustomer, Interventions.descriptionAdm, Interventions.problem, Interventions.service, Interventions.arrivalDate, Equipments.equipment,Equipments.id as idEquipment, Equipments.driver, Equipments.id as idEquipement,  Equipments.characteristics, Equipments.password, Colors.color FROM `Interventions` INNER JOIN Status on Interventions.Status_id = Status.id INNER JOIN Equipments on Interventions.Equipments_id= Equipments.id Left JOIN Colors on Equipments.Colors_id = Colors.id WHERE Interventions.Customers_id = '.$strSeparator.$idClient.$strSeparator.' ; ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;

}

function UpdateCoustomer($idClient,$firstname,$lastname,$telephone,$email,$login,$street,$idLocality){
    $sep = '\'';
    $Result='UPDATE `Customers` SET `firstname`='.$sep.addslashes($firstname).$sep.',`lastname`='.$sep.addslashes($lastname).$sep.',`telephone`='.$sep.$telephone.$sep.',`street`='.$sep.addslashes($street).$sep.',`email`='.$sep.$email.$sep.',`login`='.$sep.addslashes($login).$sep.',`Localities_id`='.$sep.$idLocality.$sep.' WHERE `id`='.$sep.$idClient.$sep.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}
function UpdateEquiment($idEquipment, $driver,$characteristics,$password,$idColor){
    $sep = '\'';
    $Result='UPDATE `Equipments` SET `driver`='.$sep.addslashes($driver).$sep.',`characteristics`='.$sep.addslashes($characteristics).$sep.',`password`='.$sep.$password.$sep.',`Colors_id`='.$sep.$idColor.$sep.' WHERE `id`='.$sep.$idEquipment.$sep.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}
function UpdateInterventionWhereIntervention($idIntervention,$accessories,$descAdm,$descCustomer,$problem,$service,$idStatus,$date){
    $sep = '\'';
    $Result='UPDATE `Interventions` SET `accessories`='.$sep.addslashes($accessories).$sep.', `descriptionCustomer`='.$sep.addslashes($descCustomer).$sep.',`descriptionAdm`='.$sep.addslashes($descAdm).$sep.',`problem`='.$sep.addslashes($problem).$sep.',`service`='.$sep.addslashes($service).$sep.', `lastUpdate`='.$sep.$date.$sep.',`Status_id`='.$sep.$idStatus.$sep.' WHERE id='.$sep.$idIntervention.$sep.'; ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($Result);
    return $queryResult;
}

function SelectInterventionWhereClient($idClient){
    $strSeparator = '\'';
    $Result = 'SELECT Equipments.equipment, Interventions.descriptionCustomer, Interventions.lastUpdate, Status.status From Interventions INNER JOIN Equipments on Interventions.Equipments_id = Equipments.id INNER JOIN Status on Interventions.Status_id = Status.id Where Interventions.Customers_id ='.$strSeparator.$idClient.$strSeparator.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}
function SelectInterventionEnCours(){
    $Result = 'SELECT Status.status, Interventions.id as idIntervention,Interventions.arrivalDate, Interventions.problem, Customers.firstname,Customers.lastname, Customers.id as idCustomer FROM `Interventions` INNER JOIN Customers on Interventions.Customers_id = Customers.id INNER JOIN Status on Interventions.Status_id = Status.id WHERE Status.id != 3;';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}
function SelectLogin(){
    $Result = 'SELECT `login`FROM `Customers` ';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}

function SelecHistoriqueInterventionsWhereCustomers($idClient){
    $strSeparator = '\'';
    $Result = 'SELECT Interventions.id, Interventions.arrivalDate, Interventions.dateOfDeparture, Interventions.problem FROM Interventions WHERE Interventions.Customers_id ='.$strSeparator.$idClient.$strSeparator.' AND Interventions.Status_id = 3;';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}