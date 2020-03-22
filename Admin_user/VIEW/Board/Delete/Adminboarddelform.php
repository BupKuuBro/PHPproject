<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>게시판 삭제 경고</title>
    </head>
    <body>
        <h1>경고!</h1>
        게시판을 삭제할 경우 복구가 불가능하며 그동안 유저들이 작성한 모든 글과 자료가 삭제됩니다
        진행하시겠습니까?
        <form action="Adminboarddelaction.php" method="POST">
            <input type="hidden" name="NAME" value="<?= $_GET["NAME"] ?>">
            <input type="submit" value="예">
        </form>
        <button onclick="location ='(링크 적을 것)'">아니오</button>
    </body>
</html>

