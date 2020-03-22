<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/checkingDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/functionDAO.php");
SESSIONCHECK();
$db = new CHECKING();
$db->LOGOUT();
?>