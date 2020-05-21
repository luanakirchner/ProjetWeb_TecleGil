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
    $customer= 'INSERT INTO `customers`(`firstName`, `lastname`, `telephone`, `street`, `email`, `login`, `password`,`Localities_id`) VALUES('.$separ.$Client["firstname"].$separ.','.$separ.$Client["lastname"].$separ.','.$separ.$Client["telephone"].$separ.','.$separ.$Client["street"].$separ.','.$separ.$Client["email"].$separ.','.$separ.$Client["login"].$separ.','.$separ.$password.$separ.','.$separ.$idLocality.$separ.')';
    $queryResult = executeQueryIDU($customer);
    return $queryResult;
}

function InsertLocalities($locality,$npa){

    require_once  'model/dbconnection.php';
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
    echo $req;
    return $resultats;
}
function SelectLocalitie($locality){
    $strSeparator = '\'';
    $Result = 'SELECT * FROM `localities` WHERE city='.$strSeparator.$locality.$strSeparator.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQuerySelect($Result);
    return $queryResult;
}