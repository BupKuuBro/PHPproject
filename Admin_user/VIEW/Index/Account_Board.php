<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 관리 페이지</title>
    </head>
    <body>
        <h1>계정 관리 페이지</h1>
        <h3>각종 계정을 만들기,삭제,관리,업데이트 합니다</h3>
        <a href="Index_Board.php">뒤로가기</a><br>
        <a href="/Admin_user/VIEW/Account/Create/Admincreateform.php">계정 만들기</a><br>
        <a href="/Admin_user/VIEW/Account/List/Adminlist.php">계정 리스트 및 삭제와 업데이트 병행</a>
        <form method="POST" action="/Admin_user/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
    </body>
</html>