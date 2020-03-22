<?php
//세션 권한 검사
function ADMINPERMISSION(){
    session_start();
    if($_SESSION["ID"] != "admin" && !isset($_SESSION["ID"])){
        header("/error.html");
    }
}

//어드민이면 리다이렉팅
function ADMINREDIRECTING(){
    session_start();
    if($_SESSION["ID"] == "admin"){
        header("/Admin_user/VIEW/Index/Index_Board.php");
    }
}
?>