<?php
include_once 'DB.php';

class Studierichting{
    private $afk;
    private $omschrijving = null;
    private $rijBestaat = false;
    private $conn = null;

    public function __construct(string $afk){
        $this->afk = $afk;
        $this->conn = DB::getConnection('Klas');
        $sql = "select * from Studierichting where afk=:afk";
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
    
    public function setOmschrijving(string $omschrijving): void{
        $this->omschrijving = $omschrijving;
    }
    

    public function bestaatRij(): bool {
        return $this->rijBestaat;
    }

    

    public function insert(): void {
        if ($this->omschrijving == null) {
            echo "<br>" . "foutje";
             throw new Exception('Omschrijving is leeg');
        }
        $sqlDelete = 'delete from Studierichting where afk = :afk';
        $sqlInsert= 'insert into Studierichting(afk,omschrijving) values (:afk,:omschrijving)';
        
        if ($this->rijBestaat) {
            try {
                $this->conn->beginTransaction();
                $stmt = $this->conn->prepare($sqlDelete);
                $stmt->execute(['afk'=>$this->afk]);
                $stmt = $this->conn->prepare($sqlInsert); 
                $stmt->execute(['afk'=>$this->afk,'omschrijving'=>$this->omschrijving]);
                $this->conn->commit();
            } catch(Error $e){
                $this->conn->rollback();
                echo '<br>'. "rollback: ".$e->getMessage();
            }            
        } else {
            try {                                
                $stmt = $this->conn->prepare($sqlInsert); 
                $stmt->execute(['afk'=>$this->afk,'omschrijving'=>$this->omschrijving]);
               
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

 
