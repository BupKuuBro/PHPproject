<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/boardDAO.php");
$db = new BOARDDATA();
$row = $db->LISTBOARD($_GET["BOARDNAME"]);
$count = count($row);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = 'utf-8'>
    <title>게시판 검색결과</title>
    <link rel="stylesheet" href="/Normal/Index/Boardliststyle.css">
</head>
<body>
    <?php
    if(!isset($row)){
        print("<h2 align=center>게시판이 검색되지 않았습니다</h2> <br> <h5 align=center><a href='/Normal_user/VIEW/Board/Selectboard.php'>다시 검색하기</a></h5>");
    }
    else{
    ?>
    <h2 align=center><?php print($count) ?>개의 게시판 검색됨</h2>
    <table align = center>
        <thead align = "center">
            <tr>
            <td width = "50" align="center">ID</td>
            <td width = "500" align = "center">게시판 이름</td>
            <td width = "120" align = "center">만들어진 날짜</td>
            </tr>
        </thead>
        <tbody>
            <tr class = "even"> <?php
            while($count--){
                if($row[$count]["HIDDEN"] == 0){
                    print("<td width = '50' align = 'center'>0</td>");
                    print("<td width = '50' align = 'center'>관리자에 의해 숨겨진 게시판입니다</td>");
                    print("<td width = '50' align = 'center'>0</td>");
                }
                else{
                    ?>
                <td width = "50" align = "center"><?php print($row[$count]["ID"]); ?></td>
                <td width = "500" align = "center"><a href="/Normal_user/VIEW/Post/List/view.php?BOARDNAME=<?php print($row[$count]["NAME"]); ?>"><?php print($row[$count]["NAME"]); ?></td>
                <td width = "120" align = "center"><?php print($row[$count]["DATE"]); ?></td>
            <?php } 
                ?>
            </tr>
            <?php
                }
            }?>
        </tbody>
    </table>
</body>
</html>