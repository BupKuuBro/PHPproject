<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminboardDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
$db = new ADMINBOARD();
$row = $db->ADMINBOARDUPDATELIST($_GET["ID"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 수정(관리자)</title>
    </head>
    <body>
        <form method="POST" action="/Admin/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
        <h1>계정 수정하기(관리자용)</h1>
        <form method="POST" action="Adminboardupaction.php">
        <input type="hidden" name="OLDNAME" value="<?= $row["NAME"] ?>">
        게시판 ID<input type="text" name="ID" value="<?= $row["ID"] ?>" readonly><br>
        게시판 이름<input type="text" name="NAME" value="<?= $row["NAME"] ?>"><br>
        게시판 생성일<input type="text" name="DAY" value="<?= $row["DATE"] ?>"><br>
        게시판 숨김여부<input type="text" name="HIDDEN" value="<?= $row["HIDDEN"] ?>">(0 숨김 1표시)<br>
        <input type="submit" value="수정">
        </form>
     
    </body>
</html>