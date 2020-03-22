<!DOCTYPE HTML>
<html>
    <head>
        <title>계정 생성을 축하드립니다</title>
        <link rel="stylesheet" href="/Normal_user/CSS/CreateAccountPhp.css">
    </head>
    <body>  
        <div class="box">
        <?php
        require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/userDAO.php");
        $db = new USERDATA();
        $db->CREUSER($_POST["ID"], $_POST["PASSWORD"], $_POST["PHONE"], $_POST["BIRTH"], $_POST["NAME"], $_POST["QUESTION"], $_POST["ANSWER"]);
        ?>
        </div>
    </body>
</html>