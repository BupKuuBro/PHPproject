<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminaccountDAO.php");
$db = new ADMINUSER();
$db->ADMINCREATE($_POST["ID"], $_POST["PASSWORD"], $_POST["PHONE"], $_POST["BIRTH"], $_POST["NAME"], $_POST["QUESTION"], $_POST["ANSWER"], $_POST["DAY"])
?>
