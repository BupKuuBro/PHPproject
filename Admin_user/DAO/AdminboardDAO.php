<?php
require_once("AdminserverDAO.php");
class ADMINBOARD extends ADMINDATA {

    //어드민용 게시판 만들기(테이블 생성)
    public function ADMINCRETABLE($name){
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("CREATE TABLE $name ( ID int(255) AUTO_INCREMENT PRIMARY KEY NOT NULL , NAME VARCHAR(20) NOT NULL , CONTENT VARCHAR(300) NOT NULL , DATE VARCHAR(20) NOT NULL, USER VARCHAR(20) NOT NULL, HIT int(255) NOT NULL )");
            $stmh->execute();
            $this->pdo->commit();
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 게시판 만들기(컬럼 추가)
    public function ADMINCRECOLUMM($name, $hidden){
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("INSERT INTO `boardinfo` (`NAME`, `DATE`, `HIDDEN`) VALUES ('$name', CURRENT_DATE, '$hidden')");
            $stmh->execute();
            $this->pdo->commit();
            return print("<h1>등록에 성공하였습니다.</h1>
            <a href='/Admin_user/VIEW/Board/List/Adminboardlist.php'>게시판 리스트 조회</a><br>
            <a href='/Admin_user/VIEW/Board/Create/Adminboardcreform.php'>다른 게시판 만들기</a>");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 게시판 제거(테이블 제거)
    public function ADMINDELTABLE($name){
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("DROP TABLE $name");
            $stmh->execute();
            $this->pdo->commit();
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 게시판 만들기(컬럼 제거)
    public function ADMINDELCOLUMM($name){
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("DELETE FROM `boardinfo` WHERE `boardinfo`.`NAME` = '$name'");
            $stmh->execute();
            $this->pdo->commit();
            header("Location:/Admin_user/VIEW/Board/List/Adminboardlist.php");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 게시판리스트 로드
    public function ADMINBOARDLIST($value){
        try{
            if(isset($value)){//검색 값 유무 확인
                $search= "%".$value."%";
                $stmh = $this->pdo->prepare("select * from boardinfo where NAME like '$search'");
                $stmh->execute();
                $row = $stmh->fetchall(PDO::FETCH_ASSOC);
                return $row;
            }
            else{
                $stmh = $this->pdo->prepare("select * from boardinfo ");
                $stmh->execute();
                $row = $stmh->fetchall(PDO::FETCH_ASSOC);
                return $row;
            }
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 게시판 정보 업데이트(표시)
    public function ADMINBOARDUPDATELIST($id){
        try{
            $stmh = $this->pdo->prepare("select * from boardinfo where ID = '$id'");
            $stmh->execute();
            $row=$stmh->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 게시판 정보 업데이트(컬럼)
    public function ADMINBOARDUPDATECOLUUM($name, $day, $hidden, $id){
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("UPDATE `boardinfo` SET `NAME` = '$name', `DATE` = '$day', `HIDDEN` = '$hidden' WHERE `boardinfo`.`ID` = '$id' ");
            $stmh->execute();
            $this->pdo->commit();
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //어드민용 게시판 정보 업데이트(테이블)
    public function ADMINBOARDUPDATETABLE($oldname, $newname){
        try{
            if($newname == $oldname){
                header("Location:/Admin_user/VIEW/Board/List/Adminboardlist.php");
            }
            else{
                $this->pdo->beginTransaction();
                $stmh = $this->pdo->prepare("RENAME TABLE $oldname TO $newname");
                $stmh->execute();
                $this->pdo->commit();
                header("Location:/Admin_user/VIEW/Board/List/Adminboardlist.php");
            }
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }
}
?>