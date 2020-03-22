<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminaccountDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
$db = new ADMINUSER();
$row = $db->ADMINUSERUPDATELIST($_GET["ID"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 수정(관리자)</title>
    </head>
    <body>
        <form method="POST" action="/Admin_user/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
        <h1>계정 수정하기(관리자용)</h1>
        <form method="POST" action="/Admin_user/VIEW/Account/Update/Adminupdateaction.php">
            <input type="hidden" name="HIDDENPASSWORD" value="<?= $row['PASSWORD'] ?>">
            아이디:<input type="text" name="ID" readonly value="<?= $row["ID"] ?>">(20자 이내)<br>
            비밀번호(재설정만 가능):<input type="text" name="PASSWORD" >(20자 이내)<br>
            핸드폰:<input type="text" name="PHONE" value="<?= $row['PHONE'] ?>" >(010-1111-2222)<br>
            생일:<input type="text" name="BIRTH" value="<?= $row['BIRTH'] ?>" >(2018-12-31 -> 20181231)<br>
            이름:<input type="text" name="NAME" value="<?= $row['NAME'] ?>" >(20자 이내)<br>
            계정 복구 질문:<input type="text" name="QUESTION" value="<?= $row['QUESTION'] ?>" >(20자 이내)<br>
            계정 복구 답변:<input type="text" name="ANSWER"value="<?= $row['ANSWER'] ?>" >(20자 이내)<br>
            가입일:<input type="date" name="DAY" value="<?= $row["DATE"] ?>" >(가급적 현재날짜로)<br>
            <input type="submit" value="수정">
        </form>
    </body>
</html>