<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>관리자 초기 페이지</title>
    </head>
    <body>
        <h1>관리자씨 환영합니다.</h1>
        <a href="Account_Board.php">사용자 계정 관리 페이지</a><br>
        <a href="Normal_Board.php">게시판 관리 페이지</a><br>
        <a href="/index.php">일반용 게시판</a>
        <form method="POST" action="/Admin_user/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
    </body>
</html>