<?php
require_once("serverDAO.php");
class CHECKING extends DATABASE {

    //로그인
    public function LOGIN($id, $password){
        try{
            session_start();
            $stmh = $this->pdo->prepare("select * from userinfo where ID = :id ");
            $stmh->bindValue(':id',$id,PDO::PARAM_STR);
            $stmh->execute();
            $row = $stmh->fetch(PDO::FETCH_ASSOC);
            $count = $stmh->rowCount();
            $DECRYPT = openssl_decrypt(base64_decode($row["PASSWORD"]), 'aes-128-cbc', $password, true, str_repeat(chr(0),16));
            if(isset($count)){
                if($row["ID"] == $id && $password == $DECRYPT){
                    $_SESSION["ID"] = $id;
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }
    
    //로그아웃
    public function LOGOUT(){
        session_start();
        session_destroy();
        header("Location:/index.php");
    }

    //비밀번호만 체크
    public function PASSWDCHECK($password){
       try{
            session_start();
            $stmh = $this->pdo->prepare("select * from userinfo where ID = :id ");
            $stmh->bindValue(':id',$_SESSION["ID"],PDO::PARAM_STR);
            $stmh->execute();
            $row = $stmh->fetch(PDO::FETCH_ASSOC);
            $DECRYPT = openssl_decrypt(base64_decode($row["PASSWORD"]), 'aes-128-cbc', $password, true, str_repeat(chr(0),16));
            if($DECRYPT == $password){
                return $DECRYPT;
            }
            else{
                return false;
            }
        }
       catch(PDOException $e){
        print "error:".$e -> getMessage();
        }
    }
    
}