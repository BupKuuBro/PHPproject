<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminaccountDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
$db = new ADMINUSER();
$row = $db->ADMINUSERLIST($_POST["VALUE"], $_POST["OPTION"]);
$count = count($row);
if(!isset($count)){
    $count = 0;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>계정 리스트</title>
    </head>
    <body>
        <form method="POST" action="Adminlist.php">
            <input type="text" name="VALUE"><br>
            이름으로 검색<input type="radio" name="OPTION" value="NAME">
            아이디로 검색<input type="radio" name="OPTION" value="ID">
            <input type="submit" value="검색">
        </form>
        <form method="POST" action="/Admin_user/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
        <a href="/Admin_user/VIEW/Account/Create/Admincreateform.php">계정 만들기</a>
        <a href="/Admin_user/VIEW/Index/Account_Board.php">뒤로 가기</a>
        <table border="1">
            <h1>데이터<?= $count ?> 건 검색됨
            <th>ID</th><th>Phone</th><th>Birthday</th><th>Name</th><th>Question</th><th>Answer</th><th>Day</th><th>Rename</th><th>Delete</th>
            <?php
            while($count--){?>
            <tr>
                <td><?= $row[$count]["ID"] ?></td>
                <td><?= $row[$count]["PHONE"] ?></td>
                <td><?= $row[$count]["BIRTH"] ?></td>
                <td><?= $row[$count]["NAME"] ?></td>
                <td><?= $row[$count]["QUESTION"] ?></td>
                <td><?= $row[$count]["ANSWER"] ?></td>
                <td><?= $row[$count]["DATE"] ?></td>
                <td><a href="/Admin_user/VIEW/Account/Update/Adminupdateform.php?ID=<?= $row[$count]["ID"] ?>">수정</td>
                <td><a href="/Admin_user/VIEW/Account/Delete/Admindeleteform.php?ID=<?= $row[$count]["ID"] ?>">삭제</td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
