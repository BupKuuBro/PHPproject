<?php
require_once("serverDAO.php");
class BOARDDATA extends DATABASE {

    //게시판 리스트
    public function LISTBOARD($boardname){//게시판 이름
        try{
            if(!isset($boardname)){
                $stmh = $this->pdo->prepare("select * from boardinfo ");
                $stmh->execute();
                $row=$stmh->fetchall();
                return $row;
            }
            else{
                $search="%".$boardname."%";
                $stmh = $this->pdo->prepare("select * from boardinfo where NAME like :name");
                $stmh->bindValue(':name',$search,PDO::PARAM_STR);
                $stmh->execute();
                $row=$stmh->fetchall();
                return $row;
            }
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //글 리스트
    public function LISTPOST($boardname){//게시판 이름
        try{
                $stmh = $this->pdo->prepare("SELECT * FROM $boardname ORDER BY id DESC");
                $stmh->execute();
                $row=$stmh->fetchall();
                return $row;
        }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //글쓰기
    public function WRITEPOST($boardname, $title, $content, $user){//게시판 이름, 제목, 내용, 유저 순
        try{
            $this->pdo->beginTransaction();
            $stmh = $this->pdo->prepare("INSERT INTO $boardname (`ID`, `NAME`, `CONTENT`, `DATE`, `USER`, `HIT`) VALUES (NULL, '$title' , '$content' , CURRENT_DATE, '$user' , '0')");
            $stmh->execute();
            $this->pdo->commit();
            header("Location:/Normal_user/VIEW/Post/List/view.php?BOARDNAME=$boardname");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //글 수정
    public function UPDATEPOST($boardname ,$postid, $title, $content){//글 id 글 이름 글 내용
        try{
            $this->pdo-> beginTransaction();
            $stmh = $this->pdo->prepare("UPDATE $boardname SET `name` = '$title', `content` = :content WHERE $boardname.ID = $postid");
            $stmh->bindValue(':content',$content,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            header("Location:/Normal_user/VIEW/Post/View/view.php?BOARDNAME=$boardname&POSTID=$postid");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //글 삭제
    public function DELPOST($boardname, $postid){
        try{
            $this->pdo -> beginTransaction();
            $stmh = $this->pdo->prepare("DELETE FROM $boardname WHERE $boardname.ID = $postid");
            $stmh -> execute();
            $this->pdo->commit();
            header("Location:/Normal_user/VIEW/Post/List/view.php?BOARDNAME=$boardname");
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }

    //글 뷰
    public function POSTVIEW($boardname, $postid){
        try{
            $stmh = $this->pdo->prepare("select * from $boardname where ID = $postid");
            $stmh -> execute();
            $row = $stmh->fetch(PDO::FETCH_ASSOC);
            return $row;
            }
        catch(PDOException $e){
            print "error:".$e -> getMessage();
        }
    }

    //조회수 증가
    public function POSTVIEWS($boardname, $postid){
        try{
            $this->pdo->beginTransaction();
            $query = "UPDATE $boardname SET `hit` = hit+1 WHERE $boardname .ID = $postid";
            $stmh = $this->pdo->prepare($query);
            $stmh -> execute();
            $this->pdo->commit();
        }
        catch(PDOException $e){
            $this->pdo->rollBack();
            print "error:".$e -> getMessage();
        }
    }
}
?>