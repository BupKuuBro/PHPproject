<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminboardDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Admin_user/DAO/AdminfunctionDAO.php");
ADMINPERMISSION();
$db = new ADMINBOARD();
$row = $db->ADMINBOARDLIST($_POST["VALUE"]);
if(!$row){
    print("<h1>게시판이 없습니다!</h1>
    <a href='/Admin_user/VIEW/Board/Create/Adminboardcreform.php'>게시판 만들기</a>");
    exit;
}
$count = count($row);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>게시판 리스트</title>
    </head>
    <body>
        <form method="POST" action="/Admin/VIEW/Loginout/Logoutaction.php">
            <input type="hidden" name="LOGOUT" value="1">
            <input type="submit" value="관리자 로그아웃">
        </form>
        <form method="POST" action="Adminboardlist.php">
            <input type="text" name="VALUE"><br>
            <input type="submit" value="검색">
        </form>
        <a href="/Admin_user/VIEW/Board/Create/Adminboardcreform.php">게시판 만들기</a>
        <a href="/Admin_user/VIEW/Index/Normal_Board.php">뒤로 가기</a>
        <table border="1">
            <h1>데이터<?php print($count); ?> 건 검색됨
            <th>ID</th><th>name</th><th>Day</th><th>Hidden</th><th>Rename</th><th>Delete</th>
            <?php
            while($count--){ ?>
            <tr>
                <td><?= $row[$count]["ID"] ?></td>
                <td><?= $row[$count]["NAME"] ?></td>
                <td><?= $row[$count]["DATE"] ?></td>
                <td><?php if($row[$count]["HIDDEN"] == 0){ print("숨김");} else{print("표시");} ?></td>
                <td><a href="/Admin_user/VIEW/Board/Update/Adminboardupform.php?ID=<?= $row[$count]["ID"] ?>">수정</td>
                <td><a href="/Admin_user/VIEW/Board/Delete/Adminboarddelform.php?NAME=<?= $row[$count]["NAME"] ?>">삭제</td>
            </tr>
            <?php }  ?>
        </table> 
    </body>
</html>