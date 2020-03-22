<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/functionDAO.php");
SESSON_REDIRECTING("/Normal_user/VIEW/Board/SelectBoard.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>환영합니다!</title>
    <link rel="stylesheet" href="/Normal_user/CSS/IndexStyle.css">
    <meta name="viewport" content="width=device=width, initial-scale=1">
</head>
<body>
    <div class="ladnding-page">
        <div class="page-content">
            <h1>환영합니다!</h1>
            <p>
                MR.J의 게시판에 오신것을 진심으로 환영합니다! <br>
                가입하지 않으셨다면 회원가입 또는 게스트(글쓰기 및 덧글쓰기 지원되지 않음)을<br>
                가입하셨다면 바로 게시판에 들어가셔서 즐기세요!
            </p>
            <a href="/Normal_user/VIEW/LoginOut/Loginform.php"><h2>가입하셨다면</h2><br>로그인</a>
            <a href="/Normal_user/VIEW/Account/Create/Createform.php"><h2>처음이시라면</h2><br>회원가입</a><br><br>
            <a href="/Normal_user/VIEW/Board/Selectboard.php"><h2>열람만 하고 싶으시다면</h2><br>게스트</a>
        </div>
    </div>
</body>