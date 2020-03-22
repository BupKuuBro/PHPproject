<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/boardDAO.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Normal_user/DAO/functionDAO.php");
$db = new BOARDDATA();
$row = $db->POSTVIEW($_GET["BOARDNAME"], $_GET["POSTID"]);
$db->POSTVIEWS($_GET["BOARDNAME"],$_GET["POSTID"]);
$result = USERCHECK($row["USER"]);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/Normal/Board/View/viewstyle.css">
        <title><?php print($row["NAME"]); ?></title>

        <!-- 삭제 스크립트 부분 -->
        <script> 
        function btn(){ 
            if(confirm("정말 삭제하시겠습니까?")){
               location.replace("/Normal_user/VIEW/Post/Delete/Delete.php?POSTID=<?php print($_GET['POSTID']); ?>&BOARDNAME=<?php print($_GET['BOARDNAME']); ?>");
            }
        } 
    </script>

    </head>
    <body>
        <table class="view_table" align=center>
        <tr>
            <td colspan="4" class="view_title"><?php print($row["NAME"]); ?></td>
        </tr>
        <tr>
            <td class="view_id">작성자</td>
            <td class="view_id2"><?php print($row["USER"]); ?></td>
            <td class="view_hit">조회수</td>
            <td class="view_hit2"><?php print($row["HIT"]); ?></td>
        </tr>
        <tr>
            <td colspan="4" class="view_content" valign="top">
            <?php print($row["CONTENT"]); ?></td>
        </tr>
        </table>
    
        <div class="view_btn">
            <button class="view_btn1" onclick="location.href='/Normal_user/VIEW/Post/List/view.php?BOARDNAME=<?php print($_GET['BOARDNAME']); ?>'">목록으로</button>
           <?php
            if($result){ ?>
            <button class="view_btn1" onclick="location.href='/Normal_user/VIEW/Post/Update/Updateform.php?POSTID=<?php print($_GET['POSTID']); ?>&BOARDNAME=<?php print($_GET['BOARDNAME']); ?>'">수정</button>
            <button class="view_btn1" onclick="btn()">삭제</button>
            <?php } ?>
        </div>
    </body>
<html>
<?php

?>

 

