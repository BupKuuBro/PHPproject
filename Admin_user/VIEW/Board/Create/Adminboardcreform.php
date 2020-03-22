<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>게시판 만들기</title>
    </head>
    <body>
        <h1>게시판 만들기</h1>
        게시판을 만듭니다 단, 생성시에는 게시판의 이름과 숨김여부만 결정 가능합니다<br><br>
        <form action="Adminboardcreaction.php" method="POST">
            게시판 이름<input type="text" name="NAME"><br>
            게시판 숨김여부<br>
            숨김<input type="radio" name="HIDDEN"value="0"> 표시<input type="radio" name="HIDDEN" value="1"><br>
            <input type="submit" value="게시판 생성!">
        </form>
    </body>
</html>