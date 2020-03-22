<?php
require_once("AdminserverDAO.php");
class ADMINCHECKING extends ADMINDATA {

    //로그인
    public function ADMINLOGIN($id, $password){
        session_start();
        if($id == "admin" && $password == "adminpower"){
            $_SESSION["ID"] = "admin";
            header("Location:/Admin_user/VIEW/Index/Index_Board.php");
        }
        else{
            print("관리자 로그인에 실패하셨습니다");
        }
    }
    
    //로그아웃
    public function LOGOUT(){
        session_start();
        session_destroy();
        header("Location:/index.php");
    }
}
?>