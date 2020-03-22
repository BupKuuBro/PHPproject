<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>탈퇴 재확인</title>
        <link rel="stylesheet" href="/Normal_user/CSS/Findaccount.css">
        <script>
            function submit(){
                <?php
                require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/userDAO.php");
                $db = new USERDATA();
                $db->DELUSER();
                ?>
            }
        </script>
    </head>
    <body>
        <div class="box">
            <h1>정말로 탈퇴하시겠습니까?</h1>
            탈퇴하면 활동했던 모든 기록이 날아가고 더이상 글을 수정할 수 없습니다.<br>
            정말 탈퇴하시겠습니까?
            <input type="button" onclick="submit()">
            <a href="/index.php">탈퇴하기 싫어요 난 탈퇴 안할래요</a><br>
        </div>
    </body>
</html>