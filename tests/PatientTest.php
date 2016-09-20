<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Patient.php";

    $server = 'mysql:host=localhost:8889;dbname=doctor_office';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

?>
