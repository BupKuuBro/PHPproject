<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>게시판 관리 페이지</title>
    </head>
    <body>
        <h1>게시판 관리 페이지</h1>
        <h3>각종 게시판 만들기,숨기기등을 관리합니다</h3>
        <a href="Index_board.php">뒤로가기</a><br>
        <a href="/Admin_user/VIEW/Board/Create/Adminboardcreform.php">게시판 만들기</a><br>
        <a href="/Admin_user/VIEW/Board/List/Adminboardlist.php">게시판 삭제 및 수정 및 숨기기</a>
        <form method="POST" action="/Admin/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
    </body>
</html>