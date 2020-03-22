<?php 

//세션이 있는지 검사(유효성 검사)
function SESSIONCHECK(){
    session_start();
    if(isset($_SESSION["ID"])){
       return true;
    }
    else{
        return false;
    }
}

//세션이 없는지 검사(유효성 검사)
function NOSESSIONCHECK(){
    session_start();
    if(!isset($_SESSION["ID"])){
       return true;
    }
    else{
        return false;
    }
}

//어드민 또는 특정ID와 세션이 맞는지 검사
function USERCHECK($ID){
    session_start();
    if($_SESSION["ID"] == $ID || $_SESSION["ID"] == "admin"){
        return true;
    }
    else{
       return false;
    }
}


//세션이 있다면 강제 리다이렉팅
function SESSON_REDIRECTING($rink){
    session_start();
    if(isset($_SESSION["ID"])){
        header("location:$rink");
    }
}


//무작위 글자 생성(10글자)
function RANDOMSTR(){
    $num = 10;
    $characters = "0123456789abcdefghrjklmnopqrstuvwxyzABCDEFGHIJKLNMOPQRSTUVWXYZ";
    $string_gen = "";
    while($num){
        $string_gen .= $characters[mt_rand(0, strlen($characters)-1)];
        $num--;
    }
    return $string_gen;
}
?>