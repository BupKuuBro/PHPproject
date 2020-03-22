<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/functionDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/boardDAO.php");
$db = new BOARDDATA();
$row = $db->LISTPOST($_GET["BOARDNAME"]);
$count = count($row);
$result = SESSIONCHECK();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = 'utf-8'>
    <title><?php print($_GET["BOARDNAME"]); ?>게시판</title>
    <link rel="stylesheet" href="/Normal_user/CSS/BoardListStyle.css">
</head>
<body>
    <h2 align=center><?php print($_GET["BOARDNAME"]); ?>게시판</h2>
        <?php
        if(isset($_SESSION["ID"])){
                ?>
                <div class="userbox">
                <?php print($_SESSION["ID"]); ?>님
                <button onclick="location ='/Normal_user/VIEW/LoginOut/Logoutaction.php'">로그아웃</button>
                <button onclick="location ='/Normal_user/VIEW/Account/Update/PasswordCheckform.html'">내정보수정</button>
        </div>
        <?php
        }
        else{
                ?>
                <div class="userbox">
                        게스트 접속중입니다.
                        <button onclick="location ='/Normal_user/VIEW/LoginOut/Loginform.php'">로그인</button>
                        <button onclick="location ='/index.php'">초기화면</button>
                </div>  
                <?php
        }
        ?>
        <br><br>
    <table align = center>
        <thead align = "center">
            <tr>
                <td width = "50" align="center">번호</td>
                <td width = "500" align = "center">제목</td>
                <td width = "100" align = "center">작성자</td>
                <td width = "200" align = "center">날짜</td>
                <td width = "50" align = "center">조회수</td>
            </tr>
        </thead>
        <tbody>
            <tr class = "even"> <?php
            while($count--){
                ?>
                <td width = "50" align = "center"><?php print($row[$count]["ID"]); ?></td>
                <td width = "500" align = "center"><a href="/Normal_user/VIEW/Post/View/view.php?BOARDNAME=<?php print($_GET['BOARDNAME']); ?>&POSTID=<?php print($row[$count]['ID']); ?>"><?php print($row[$count]['NAME']) ?></a></td>
                <td width = "50" align = "center"><?php print($row[$count]["USER"]); ?></td>
                <td width = "120" align = "center"><?php print($row[$count]["DATE"]); ?></td>
                <td width = "50" align = "center"><?php print($row[$count]["HIT"]); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    if($result){ ?>
        <div class = text>
        <font style="cursor: hand" onClick="location.href='/Normal_user/VIEW/Post/Create/Createform.php?BOARDNAME=<?php print($_GET['BOARDNAME']); ?>'">글쓰기</font>
        </div> 
    <?php } ?>
    </body>
</html>
 
        

