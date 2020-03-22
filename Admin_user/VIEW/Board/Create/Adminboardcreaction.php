<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminboardDAO.php");
$db = new ADMINBOARD();
$db->ADMINCRETABLE($_POST["NAME"]);
$db->ADMINCRECOLUMM($_POST["NAME"], $_POST["HIDDEN"]);
?>