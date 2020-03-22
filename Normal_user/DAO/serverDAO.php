<?php
class DATABASE{
    protected $pdo;
    //db 연결을 위한 생성자
    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:host=localhost; dbname=xhfleodhkd;charset=utf8","xhfleodhkd","wjdvlf00");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);   
        }
        catch(Exception $e){
            die('오류 :'.$e->getmessage());
        }
        return $this->pdo;
    }
}