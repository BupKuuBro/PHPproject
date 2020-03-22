<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/functionDAO.php");
SESSIONCHECK();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 찾기</title>
        <link rel="stylesheet" href="/Normal_user/CSS/FindAccount.css">
    </head>
    <body>
        <form class="box" action="/Normal_user/VIEW/Account/Find/PWfindaction.php" method="POST">
            <h1>비밀번호 찾기</h1>
            ID를 입력하세요:<input type="text" name="ID" required><br>
            이름을 입력하세요:<input type="text" name="NAME" required><br>
            아이디 생성시 입력한 질문을 입력하세요:<input type="text" name="QUESTION" required><br>
            아이디 생성시 입력한 답변을 입력하세요:<input type="text" name="ANSWER" required><br>
            <input type="submit" value="비밀번호 찾기">
            <a href="/Normal_user/VIEW/Account/Find/IDfindform.php">ID 찾기</a>&nbsp;&nbsp;&nbsp;
            <a href="/Normal_user/VIEW/LoginOut/Loginform.php">로그인 화면으로 돌아가기</a>
        </form>
    </body>
</html>