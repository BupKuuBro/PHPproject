<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 삭제 경고</title>
    </head>
    <body>
        <h1>경고!</h1>
        계정을 삭제할 경우 다시는 복구할 수 없습니다 정말 삭제하시겠습니까?
        <form action="Admindeleteaction.php" method="POST">
            <input type="hidden" name="ID" value="<?= $_GET["ID"] ?>">
            <input type="submit" value="예">
        </form>
        <button onclick="location ='/Admin/Account/List/AAL.php'">아니오</button>
    </body>
</html>

