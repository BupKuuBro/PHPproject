<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/userDAO.php");
$db = new USERDATA();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>아이디 중복검사</title>
        <script type="text/javascript">
        function setParentText(){
            opener.document.getElementById("uid").value = document.getElementById("checkid").value
            window.close()
        }
        </script>
    </head>
    <body>
        <form method="POST" action="/Normal_user/VIEW/Account/Create/IDcheck.php">
            <?php
            if(isset($_POST["ID"])){
                $count = $db->IDCHECK($_POST["ID"]);
                if($count == 0){?>
                    사용 가능한 id 입니다.<br>
                    <input type="button" value="이 ID 사용하기" onclick="setParentText()"><br>
                <?php
                }
                else{
                    print("사용 불가능한 id 입니다.<br>");
                }
            }
            ?>
            <input type="text" name="ID" id= "checkid" value="<?php if(isset($_POST["ID"])){print $_POST["ID"];} ?>">
            <input type="submit" value="중복검사">
        </form>
    </body>
</html>