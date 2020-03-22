<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/boardDAO.php");
$db = new BOARDDATA();
$db->WRITEPOST($_POST["BOARDNAME"], $_POST["TITLE"], $_POST["CONTENT"], $_SESSION["ID"]);
?>
