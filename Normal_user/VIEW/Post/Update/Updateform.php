<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/boardDAO.php");
$db = new BOARDDATA();
$row = $db->POSTVIEW($_GET["BOARDNAME"],$_GET["POSTID"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
        <link rel="stylesheet" href="/Normal/Board/Create/Createstyle.css">
        <title>게시글 수정</title>
    </head>
    <body>
    <form method = "POST" action = "Updateaction.php">
        <input type="hidden" name="BOARDNAME" value="<?php print($_GET["BOARDNAME"]); ?>">
        <input type="hidden" name="POSTID" value="<?php print($_GET["POSTID"]); ?>">
        <table  style="padding-top:50px" align = center width=900 border=0 cellpadding=2 >
            <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 수정하기</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                        <tr>
                        <td>제목</td>
                        <td><input type ="text" name ="TITLE" size=60 value="<?php print($row['NAME']); ?>" required></td>
                        </tr>
 
                        <tr>
                        <td>내용</td>
                        <td><textarea name ="CONTENT" cols=85 rows=15 ><?php print($row['CONTENT']); ?></textarea></td>
                        </tr>
                        </table>
 
                        <center>
                        <input type = "submit" value="수정">
                        </center>
                </td>
                </tr>
        </table>
        </form>
    </body>
<html>

 
