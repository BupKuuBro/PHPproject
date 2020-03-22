<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminaccountDAO.php");
$db = new ADMINUSER();
if(!isset($_POST["PASSWORD"])){//어드민은 패스워드 해독 키를 알수 없기 때문에 dao 상에서 암호화 처리가 불가함
    $ENCRYPT = base64_encode(openssl_encrypt($_POST["PASSWORD"], 'aes-128-cbc', $_POST["PASSWORD"],true,str_repeat(chr(0), 16)));
}
else{
    $ENCRYPT = $_POST["HIDDENPASSWORD"];
}
$db->ADMINUPDATE($ENCRYPT, $_POST["PHONE"],  $_POST["BIRTH"],  $_POST["NAME"], $_POST["QUESTION"], $_POST["ANSWER"], $_POST["DAY"], $_POST["ID"]);
?>

