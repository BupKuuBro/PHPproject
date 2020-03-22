<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 만들기</title>
        <script>
             function checkid()//아이디 중복검사를 위한 팝업창
        { 
            window.name = "creaccounthtml";
            openWin = window.open("/Normal_user/VIEW/Account/Create/IDcheck.php","creaccountphp", "width=570, height=350, resizable = no, scrollbars = no");    
        }
        </script>
        <link rel="stylesheet" href="/Normal_user/CSS/CreateAccountHtml.css">
    </head>
    <body>
        <form class="box" action="/Normal_user/VIEW/Account/Create/Createaction.php" method="POST">
            <h1>계정 생성</h1>
            아이디 &nbsp;<input type="button" value="중복검사" onclick="checkid();" />
            <input type="text" name="ID" id="uid" required onkeypress="return false;" placeholder="20자 이내로 입력" /><br>
            비밀번호<input type="password" name="PASSWORD" placeholder="20자 이내로 입력" required><br>
            핸드폰번호<input type="text" name="PHONE" placeholder="010-1234-7891 형식으로 입력" required><br>
            생일<input type="text" name="BIRTH" placeholder="2001년 01월 01일 -> 20010101" required><br>
            이름<input type="text" name="NAME" placeholder="20자 이내로 입력" required><br>
            계정 복구시 질문<input type="text" name="QUESTION" placeholder="20자 이내로 입력,공백이 없게" required><br>
            답변<input type="text" name="ANSWER" placeholder="20자 이내로 입력" required>
            <input type="submit" value="계정 만들기">
            <a href="/Normal_user/VIEW/LoginOut/Loginform.php">로그인 화면으로 돌아가기</a>
        </form>
    </body>
</html>