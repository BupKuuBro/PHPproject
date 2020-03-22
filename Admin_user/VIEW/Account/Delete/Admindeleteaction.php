<?php
 require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminaccountDAO.php");
 $db = new ADMINUSER();
 $db->ADMINDEL($_POST["ID"]);
 ?>
