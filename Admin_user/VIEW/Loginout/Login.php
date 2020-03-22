<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdmincheckingDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINREDIRECTING();
$db = new ADMINCHECKING();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="LoginStyle.css">
    </head>
    <body>
        <form class="box" action="Login.php" method="POST">
            <h1>WELCOME ADMIN</h1>
            <input type="text" name="ID" placeholder="ID" required>
            <input type="password" name="PASSWORD" placeholder="PASSWORD" required>
            <?php
            if(isset($_POST["ID"])){
               $db->ADMINLOGIN($_POST["ID"], $_POST["PASSWORD"]);
            }
            ?>
            <input type="submit" value="로그인"><br>
        </form>
    </body>
</html>