<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/boardDAO.php");
$db = new BOARDDATA();
$db->DELPOST($_GET["BOARDNAME"],$_GET["POSTID"]);
?>
