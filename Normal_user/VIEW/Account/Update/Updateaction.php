<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/userDAO.php");
$db = new USERDATA();
$db->UPUSER($_POST["PASSWORD"], $_POST["PHONE"], $_POST["BIRTH"], $_POST["NAME"], $_POST["QUESTION"], $_POST["ANSWER"]);
?>
