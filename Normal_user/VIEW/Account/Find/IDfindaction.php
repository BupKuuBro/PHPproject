<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/userDAO.php");
$db = new USERDATA();
$row = $db->FINUSER($_POST["BIRTH"] ,$_POST["NAME"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 찾기</title>
        <link rel="stylesheet" href="/Normal_user/CSS/CreateAccountPhp.css">
    </head>
    <body>
        <div class ="box">
        <?php
        if(!isset($row)){
            print("<h1>ID 찾기 결과</h1>");
            print("ID가 존재하지 않습니다.<br><br>");
            print("<a href='/Normal_user/VIEW/LoginOut/Loginform'>로그인 화면으로 돌아가기</a>");
        }
        else{
            if($row["BIRTH"] == $_POST["BIRTH"] && $row["QUESTION"] == $_POST["QUESTION"]){
                if($row["ANSWER"] == $_POST["ANSWER"]){
                    print("<h1>ID 찾기 결과</h1>");
                    print("당신의 id는 &nbsp;".$row["ID"]."&nbsp; 입니다.<br><br>");
                    print("<a href='/Normal_user/VIEW/LoginOut/Loginform.php'>로그인 화면으로 돌아가기</a><br>");
                    print("<a href='/Normal_user/VIEW/Account/Find/PWfindform.php'>비밀번호 찾기</a>");
                }
            }
            else{
                print("<h1>ID 찾기 결과</h1>");
                print("ID가 존재하지 않습니다.<br><br>");
                print("<a href='/Normal_user/VIEW/LoginOut/Loginform.php'>로그인 화면으로 돌아가기</a>");
            }
        }
        ?>
        </div>
    </body>
</html>