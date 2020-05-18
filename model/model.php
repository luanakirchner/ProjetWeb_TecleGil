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