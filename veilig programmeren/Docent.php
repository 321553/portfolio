<?php
include_once 'DB.php';

class Docent{
    private $afk;
    private $achternaam = null;
    private $tel = null;
    private $rijBestaat = false;
    private $conn = null;

    public function __construct(string $afk){
        $this->afk = $afk;
        $this->conn = DB::getConnection('Klas');
        $sql = "select * from Docent where afk=:afk";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['afk'=>$this->afk]);
        if ($stmt->rowCount() == 1){
            $this->rijBestaat = true;
            $row = $stmt->fetch();
            $this->achternaam = $row->achternaam;
            $this->tel = $row->tel;
        };
    }
    
    public function getAfk():string {
        return $this->afk;
    }
    
    public function getAchternaam():string {
        return $this->achternaam;
    }
    
    public function getTel():string {
        return $this->tel;
    }
    
    public function setAchternaam(string $achternaam):void {
        $achternaam = $this->achternaam;
    }
    
    public function setTel(string $tel):void {
        $tel = $this->tel;
    }
   

    public function bestaatRij(): bool {
        return $this->rijBestaat;
    }


    public function insert(): void {
        if ($this->achternaam == null) {
            echo "<br>" . "foutje";
             throw new Exception('Achternaam is leeg');
        }
        if ($this->tel == null) {
            echo "<br>" . "foutje";
             throw new Exception('Tel is leeg');
        }
        $sqlDelete = 'delete from Docent where afk = :afk';
        $sqlInsert= 'insert into Docent(afk,achternaam,tel) values (:afk,:achternaam,:tel)';
        
        if ($this->rijBestaat) {
            try {
                $this->conn->beginTransaction();
                $stmt = $this->conn->prepare($sqlDelete);
                $stmt->execute(['afk'=>$this->afk]);
                $stmt = $this->conn->prepare($sqlInsert); 
                $stmt->execute(['afk'=>$this->afk,'achternaam'=>$this->achternaam,'tel'=>$this->tel]);
                $this->conn->commit();
            } catch(Error $e){
                $this->conn->rollback();
                echo '<br>'. "rollback: ".$e->getMessage();
            }            
        } else {
            try {                                
                $stmt = $this->conn->prepare($sqlInsert); 
                $stmt->execute(['afk'=>$this->afk,'achternaam'=>$this->achternaam,'tel'=>$this->tel]);
               
            } catch(Error $e){                
                echo '<br>'. "??? ".$e->getMessage();
            }            
        }
        


    }
    public function update(){
        $this->insert();
    }
}

?>

 
