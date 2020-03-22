<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/boardDAO.php");
$db = new BOARDDATA();
$db->UPDATEPOST($_POST["BOARDNAME"] ,$_POST["POSTID"], $_POST["TITLE"], $_POST["CONTENT"]);
?>
