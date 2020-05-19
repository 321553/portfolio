<?php
include_once 'DB.php';

class Klas{
    private $afk;
    private $omschrijving = null;
    private $mentor = null;
    private $studierichting = null;
    private $rijBestaat = false;
    private $conn = null;

    public function __construct(string $afk){
        $this->afk = $afk;
        $this->conn = DB::getConnection('Klas');
        $sql = "select * from Klas where afk=:afk";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['afk'=>$this->afk]);
        if ($stmt->rowCount() == 1){
            $this->rijBestaat = true;
            $row = $stmt->fetch();
        };
    }
    
    public function getAfk():string {
        return $this->afk;
    }
    
    public function getOmschrijving():string {
        return $this->omschrijving;
    }
    
    public function getMentor():string {
        return $this->mentor;
    }
    
    public function getStudierichting():string {
        return $this->studierichting;
    }
    
    public function setOmschrijving(string $omschrijving):void {
        $this->omschrijving = $omschrijving;
    }
    
    public function setMentor(string $mentor):void {
        $this->mentor = $mentor;
    }
    
    public function setStudierichting(string $studierichting):void {
        $this->studierichting = $studierichting;
    }
    
    public function bestaatRij(): bool {
        return $this->rijBestaat;
    }

    

    public function insert(): void {
        if ($this->omschrijving == null) {
            echo "<br>" . "foutje";
             throw new Exception('Omschrijving is leeg');
        }
        if ($this->mentor == null) {
            echo "<br>" . "foutje";
             throw new Exception('Mentor is leeg');
        }
        if ($this->studierichting == null) {
            echo "<br>" . "foutje";
             throw new Exception('Studierichting is leeg');
        }
        $sqlDelete = 'delete from Klas where omschrijving = :omschrijving';
        $sqlInsert= 'insert into Klas(afk,omschrijving,mentor,studierichting) values (:afk,:omschrijving,:mentor,:studierichting)';
        
        if ($this->rijBestaat) {
            try {
                $this->conn->beginTransaction();
                $stmt = $this->conn->prepare($sqlDelete);
                $stmt->execute(['omschrijving'=>$this->omschrijving]);
                $stmt = $this->conn->prepare($sqlInsert); 
                $stmt->execute(['afk'=>$this->afk,'omschrijving'=>$this->omschrijving,'mentor'=>$this->mentor,'studierichting'=>$this->studierichting]);
                $this->conn->commit();
            } catch(Error $e){
                $this->conn->rollback();
                echo '<br>'. "rollback: ".$e->getMessage();
            }            
        } else {
            try {                                
                $stmt = $this->conn->prepare($sqlInsert); 
                $stmt->execute(['afk'=>$this->afk,'omschrijving'=>$this->omschrijving,'mentor'=>$this->mentor,'studierichting'=>$this->studierichting]);
               
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

 
