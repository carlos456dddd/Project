<?php
/*DESKTOP-F7U88KK\sqlexpress, 1434*/
        $serverName='localhost';
        $uid='conexion';
        $pwd='123456';
        $databaseName = 'bd_SGS';
        $connectionInfo = array('UID' => $uid, 'PWD' => $pwd, 'Database' => $databaseName, 'CharacterSet' => 'UTF-8');

        $con = sqlsrv_connect($serverName, $connectionInfo);
        if ($con === false){
            die(print_r(sqlsrv_errors(), true));
        }
?>