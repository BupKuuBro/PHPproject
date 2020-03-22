<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/checkingDAO.php");
$db = new CHECKING();
if($db->LOGIN($_POST["ID"], $_POST["PASSWORD"])){
    header("Location:/Normal_user/VIEW/Board/Selectboard.php");
}
else{ 
    header("Location:/Normal_user/VIEW/LoginOut/Loginform.php?SUCCESS=1");
}
?>
