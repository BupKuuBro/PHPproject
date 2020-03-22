<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 만들기(관리자)</title>
    </head>
    <body>
        <form method="POST" action="/Admin_user/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
        <h1>계정 만들기(관리자용)</h1>
        <form method="POST" action="/Admin_user/VIEW/Account/Create/Admincreateaction.php">
            아이디:<input type="text" name="ID">(20자 이내)<br>
            비밀번호:<input type="text" name="PASSWORD">(20자 이내)<br>
            핸드폰:<input type="text" name="PHONE">(010-1111-2222)<br>
            생일:<input type="text" name="BIRTH">(2018-12-31 -> 20181231)<br>
            이름:<input type="text" name="NAME">(20자 이내)<br>
            계정 복구 질문:<input type="text" name="QUESTION">(20자 이내)<br>
            계정 복구 답변:<input type="text" name="ANSWER">(20자 이내)<br>
            가입일:<input type="date" name="DAY">(가급적 현재날짜로)<br>
            <input type="submit" value="등록">
        </form>
    </body>
</html>