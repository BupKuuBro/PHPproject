<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/userDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/functionDAO.php");
$db = new USERDATA();
$row = $db->FINPW($_POST["NAME"],$_POST["ID"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>계정 찾기</title>
        <link rel="stylesheet" href="/Normal_user/CSS/FindAccount.css">
    </head>
    <body>
        <div class ="box">
        <?php
        if(!isset($row)){
            print("<h1>비밀번호 찾기 결과</h1>");
            print("ID가 조회되지 않습니다.<br><br>");
            print("<a href='/Normal_user/VIEW/LoginOut/Loginform.php'>로그인 화면으로 돌아가기</a>");
        }
        else{
            if($row["ID"] == $_POST["ID"] && $row["QUESTION"] == $_POST["QUESTION"]){
                if($row["ANSWER"] == $_POST["ANSWER"]){
                    $str = RANDOMSTR();
                    $db->RESETPW($str,$row["ID"]);
                    print("<h1>비밀번호 찾기 결과</h1>");
                    print("당신의 임시 비밀번호는".$str."입니다. <br> 바로 변경해주시길 바랍니다.<br>");
                    print("<a href='/Normal_user/VIEW/LoginOut/Loginform.php'>로그인 화면으로 돌아가기</a><br>");
                }
            }
            else{
            print("<h1>비밀번호 찾기 결과</h1>");
            print("ID가 조회되지 않습니다.<br><br>");
            print("<a href='/Normal_user/VIEW/LoginOut/Loginform.php'>로그인 화면으로 돌아가기</a>");
            }
        }
        ?>
        </div>
    </body>
</html>