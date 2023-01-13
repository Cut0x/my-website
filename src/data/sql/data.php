<?php
    $db_host="mysql-cutox.alwaysdata.net"; 
    $db_user="cutox";
    $db_password="Loic2||005||";   
    $db_name="cutox_data";

    try {
	    $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOEXCEPTION $e) {
	    $e->getMessage();
    }

    $webhookURL = "";
?>