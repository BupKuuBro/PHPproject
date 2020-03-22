<?php
require_once("serverDAO.php");
class USERDATA extends DATABASE {
    
    //유저가입
    public function CREUSER($id, $password, $phone, $birth, $name, $question, $answer){
        try{
            $ENCRYPT = base64_encode(openssl_encrypt($password, 'aes-128-cbc', $password,true,str_repeat(chr(0), 16)));
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("INSERT INTO `userinfo` (`ID`, `PASSWORD`, `PHONE`, `BIRTH`, `NAME`, `QUESTION`, `ANSWER`, `DATE`) VALUES (:id, :passwd, :phone, :birth, :name, :question, :answer, CURRENT_DATE )");
            $stmh->bindValue(':id',$id,PDO::PARAM_STR);
            $stmh->bindValue(':passwd',$ENCRYPT,PDO::PARAM_STR);
            $stmh->bindValue(':phone',$phone,PDO::PARAM_STR);
            $stmh->bindValue(':birth',$birth,PDO::PARAM_STR);
            $stmh->bindValue(':name',$name,PDO::PARAM_STR);
            $stmh->bindValue(':question',$question,PDO::PARAM_STR);
            $stmh->bindValue(':answer',$answer,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            return print("<h1>가입을 축하드립니다!!.</h1> <br> <a href='/Normal_user/VIEW/LoginOut/Loginform.php'> 로그인하러 가기<a>");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            return print "error:".$e->getMessage();
        }
    }

    //유저 탈퇴
    public function DELUSER(){
        try{
            session_start();
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("DELETE FROM `USERINFO` WHERE `USERINFO`.`ID` = :id");
            $stmh->bindValue(':id',$_SESSION["id"],PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            session_destroy();
            header("Location:/index.php");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //유저 정보 표시(업데이트)
    public function VIEWUSER(){
        try{
            session_start();
            $stmh = $this->pdo->prepare("select * from userinfo where ID = :id");
            $stmh->bindValue(':id',$_SESSION["ID"],PDO::PARAM_STR);
            $stmh->execute();
            $row=$stmh->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //유저 업데이트
    public function UPUSER($password, $phone, $birth, $name, $question, $answer){
        try{
            session_start();
            $ENCRYPT = base64_encode(openssl_encrypt($password, 'aes-128-cbc', $password,true,str_repeat(chr(0), 16)));
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("UPDATE `userinfo` SET `PASSWORD` = :password , `PHONE` = :phone , `BIRTH` = :birth, `Name` = :name , `QUESTION` = :question , `ANSWER` = :answer  WHERE userinfo.ID = :id ");
            $stmh->bindValue(':password',$ENCRYPT,PDO::PARAM_STR);
            $stmh->bindValue(':phone',$phone,PDO::PARAM_STR);
            $stmh->bindValue(':birth',$birth,PDO::PARAM_STR);
            $stmh->bindValue(':name',$name,PDO::PARAM_STR);
            $stmh->bindValue(':question',$question,PDO::PARAM_STR);
            $stmh->bindValue(':answer',$answer,PDO::PARAM_STR);
            $stmh->bindValue(':id',$_SESSION["ID"],PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            header("Location:/Normal_user/VIEW/Account/Update/PasswordCheckform.html");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }
   
    //유저 찾기(ID)
    public function FINUSER($birth ,$name){
        try{
            $stmh = $this->pdo->prepare("select * from userinfo where BIRTH = :birth AND NAME = :name");
            $stmh->bindValue(':birth',$birth,PDO::PARAM_STR);
            $stmh->bindValue(':name',$name,PDO::PARAM_STR);
            $stmh->execute();
            $row=$stmh->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //유저 찾기(PW)
    public function FINPW($name ,$id){
        try{
            $stmh = $this->pdo->prepare("select * from userinfo where NAME = :name AND ID = :id");
            $stmh->bindValue(':name',$name,PDO::PARAM_STR);
            $stmh->bindValue(':id',$id,PDO::PARAM_STR);
            $stmh->execute();
            $row=$stmh->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //유저 찾기(PW리셋)
    public function RESETPW($password, $id){
        try{
            $this->pdo->beginTransaction();
            $ENCRYPT = base64_encode(openssl_encrypt($password, 'aes-128-cbc', $password,true,str_repeat(chr(0), 16)));
            $stmh = $this->pdo->prepare("UPDATE userinfo SET PASSWORD = '$ENCRYPT' WHERE userinfo.ID = '$id' ");
            $stmh->execute();
            $this->pdo->commit();
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //ID 중복검사
    public function IDCHECK($ID){
        try{
            $stmh = $this->pdo->prepare("select * from userinfo where Id = :id");
            $stmh->bindValue(':id',$ID,PDO::PARAM_STR);
            $stmh->execute();
            $count = $stmh->rowCount();
            return $count;
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }
}
?>
