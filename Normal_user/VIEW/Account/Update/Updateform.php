<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/checkingDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/userDAO.php");
$check = new CHECKING();
$db = new USERDATA();
$checking = $check->PASSWDCHECK($_POST["PASSWORD"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>내 정보 수정</title>
        <link rel="stylesheet" href="/Normal_user/CSS/FindAccount.css">
    </head>
    <body>
        <?php
        if($checking){
            $row = $db->VIEWUSER();
            ?>
            <form class="box" action="/Normal_user/VIEW/Account/Update/Updateaction.php" method="POST">
                <h1>내 정보 수정</h1>
                아이디 <input type="text" name="id" required readonly value="<?= $row["ID"] ?>" /><br>
                비밀번호<input type="text" name="PASSWORD" placeholder="20자 이내로 입력" required value="<?= $checking ?>"><br>
                핸드폰번호<input type="text" name="PHONE" placeholder="010-1234-7891 형식으로 입력" required value="<?= $row["PHONE"] ?>" ><br>
                생일<input type="text" name="BIRTH" placeholder="2001년 01월 01일 -> 20010101" required value="<?= $row["BIRTH"] ?>" ><br>
                이름<input type="text" name="NAME" placeholder="20자 이내로 입력" required value="<?= $row["NAME"] ?>"><br>
                계정 복구 질문<input type="text" name="QUESTION" placeholder="20자 이내로 입력" required value="<?= $row["QUESTION"] ?>"><br>
                답변<input type="text" name="ANSWER" placeholder="20자 이내로 입력" required value="<?= $row["ANSWER"] ?>">
                <input type="submit" value="수정하기">
                <a href="/index.php">초기화면으로 돌아가기</a>
                <a href="/Normal_sever/VIEW/Account/Delete/Delete.php">회원탈퇴</a>
            </form>
            <?php
        }
        else{
            ?>
            <div class="box">
                <h1>비밀번호가 일치하지 않습니다.</h1>
                <a href="/index.html">초기화면으로 돌아가기</a>
            </div>
            <?php
        }
        ?>
    </body>
</html>
