<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/functionDAO.php");
SESSON_REDIRECTING("/Normal_user/VIEW/Board/Boardlist.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="/Normal_user/CSS/AccountLoginStyle.css">
    </head>
    <body>
        <form class="box" action="/Normal_user/VIEW/LoginOut/Loginaction.php" method="POST">
            <h1>Login</h1>
            <input type="text" name="ID" placeholder="ID" required>
            <input type="password" name="PASSWORD" placeholder="PASSWORD" required>
            <?php
            if(isset($_GET["SUCCESS"])){
                print("ID또는 비밀번호가 틀립니다");
            }
            ?>
            <input type="submit" value="로그인"><br>
            <a href="/Normal_user/VIEW/Account/Create/Createform.php">계정 만들기</a><br>
            <a href="/Normal_user/VIEW/Account/Find/IDfindform.php">id나 비밀번호를 잃어버리셨나요?</a>
        </form>
    </body>
</html>