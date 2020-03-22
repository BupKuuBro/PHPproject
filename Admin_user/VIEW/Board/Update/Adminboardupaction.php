<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminboardDAO.php");
$db = new ADMINBOARD();
$db->ADMINBOARDUPDATECOLUUM($_POST["NAME"], $_POST["DAY"], $_POST["HIDDEN"], $_POST["ID"]);
$db->ADMINBOARDUPDATETABLE($_POST["OLDNAME"], $_POST["NAME"]);
?>
