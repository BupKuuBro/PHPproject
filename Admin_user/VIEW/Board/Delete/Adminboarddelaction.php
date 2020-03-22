<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminboardDAO.php");
$db = new ADMINBOARD();
$db->ADMINDELTABLE($_POST["NAME"]);
$db->ADMINDELCOLUMM($_POST["NAME"]);
?>