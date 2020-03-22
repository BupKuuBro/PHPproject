<?php
require_once("AdminserverDAO.php");
class ADMINUSER extends ADMINDATA {

    //어드민용 계정생성
    public function ADMINCREATE($id, $password, $phone, $birth, $name, $question, $answer, $day){
        try{
            $ENCRYPT = base64_encode(openssl_encrypt($password, 'aes-128-cbc', $password,true,str_repeat(chr(0), 16)));
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("INSERT INTO `userinfo` (`ID`, `PASSWORD`, `PHONE`, `BIRTH`, `NAME`, `QUESTION`, `ANSWER`, `DATE`) VALUES (:id, :passwd, :phone, :birth, :name, :question, :answer, :day )");
            $stmh->bindValue(':id',$id,PDO::PARAM_STR);
            $stmh->bindValue(':passwd',$ENCRYPT,PDO::PARAM_STR);
            $stmh->bindValue(':phone',$phone,PDO::PARAM_STR);
            $stmh->bindValue(':birth',$birth,PDO::PARAM_STR);
            $stmh->bindValue(':name',$name,PDO::PARAM_STR);
            $stmh->bindValue(':question',$question,PDO::PARAM_STR);
            $stmh->bindValue(':answer',$answer,PDO::PARAM_STR);
            $stmh->bindValue(':day',$day,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            return print("<h1>등록에 성공하였습니다</h1> <br> 
            <a href='/Admin_user/VIEW/Account/List/Adminlist.php'>계정 리스트 조회</a><br>
            <a href='/Admin_user/VIEW/Account/Create/Admincreateform.php'>다른 계정 만들기</a>");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            return print "error:".$e->getMessage();
        }
    }

    //어드민용 계정 삭제
    public function ADMINDEL($id){
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("DELETE FROM `userinfo` WHERE `userinfo`.`Id` = :id");
            $stmh->bindValue(':id',$id,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            header("Location:/Admin_user/VIEW/Account/List/Adminlist.php");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 유저리스트 로드
    public function ADMINUSERLIST($value, $option){
        try{
            if(isset($option) && isset($value)){//검색 옵션 지정
                $search= "%".$value."%";
                $stmh = $this->pdo->prepare("select * from userinfo where $option like '$search'");
                $stmh->execute();
                $row = $stmh->fetchall();
                return $row;
            }
            else{
                $stmh = $this->pdo->prepare("select * from userinfo");
                $stmh->execute();
                $row = $stmh->fetchall();
                return $row;
            }
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }
    
    //어드민용 유저정보 수정(유저 정보 표시)
    public function ADMINUSERUPDATELIST($id){
        try{
            $stmh = $this->pdo->prepare("select * from userinfo where ID = :id");
            $stmh->bindValue(':id',$id,PDO::PARAM_STR);
            $stmh->execute();
            $row=$stmh->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 유저정보 수정(유저 정보 업데이트)
    public function ADMINUPDATE($password, $phone, $birth, $name, $question, $answer, $day, $id){
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("UPDATE `userinfo` SET PASSWORD = :password , PHONE = '$phone' , BIRTH = '$birth', Name = '$name' , QUESTION = '$question' , ANSWER = '$answer' , DATE = '$day' WHERE userinfo.ID = '$id' ");
            $stmh->bindValue(':password',$password,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            header("Location:/Admin_user/VIEW/Account/List/Adminlist.php");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }
}
?>