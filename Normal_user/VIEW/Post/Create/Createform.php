<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset = 'utf-8'>
        <link rel="stylesheet" href="/Normal_user/CSS/PostCreateStyle.css">
</head>
<body>
        <form method = "POST" action = "/Normal_user/VIEW/Post/Create/Createaction.php">
                <input type="hidden" name="BOARDNAME" value="<?php print($_GET['BOARDNAME']); ?>">
                <table  style="padding-top:50px" align = center width=900 border=0 cellpadding=2 >
                        <tr>
                        <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
                        </tr>
                        <tr>
                        <td bgcolor=white>
                        <table class = "table2">
                                <tr>
                                <td>제목</td>
                                <td><input type ="text" name ="TITLE" size=60 required></td>
                                </tr>
        
                                <tr>
                                <td>내용</td>
                                <td><textarea name ="CONTENT" cols=85 rows=15></textarea></td>
                                </tr>
                                </table>
        
                                <center>
                                <input type = "submit" value="작성">
                                </center>
                        </td>
                        </tr>
                </table>
        </form>
</body>
</html>

