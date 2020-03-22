<?php
session_start();
if(isset($_SESSION["ID"])){
    $id = $_SESSION["ID"];
}
else{
    $id = "guest";
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>게시판 선택</title>
    <link rel="stylesheet" href="/Normal_user/CSS/SelectBoardStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script>
             function checkname()
        { 
            var input = document.getElementById("input").value;
            location ="/Normal_user/VIEW/Board/Boardlist.php?BOARDNAME="+input; 

        }
    </script>
</head>
<body>
    <div class="newsletter">
        <h1><?php print($id) ?>님
            <span>환영합니다.</span>
        </h1>
        <p>여기서 게시판을 검색하시면 됩니다. 처음 오셨거나 <br>
            모든 게시판을 보시고 싶으시다면 공란으로 검색하시면 됩니다.</p>

        <form method="GET" action="/Normal_user/VIEW/Board/Selectboard.php" class="txtb">
            <input name="BOARDNAME" type="text" id="input" placeholder="가고싶은 게시판 입력">
            <button type="button" onclick="checkname();"><i class="fas fa-arrow-right"></i></button>
        </form>
        </div>
    </div>
</body>