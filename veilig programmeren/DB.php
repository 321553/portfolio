<?php 
class DB {
    protected static $connection =  null;  
    private static $verbinding = null;  
    private $dns;    
    private $file = null;
 
    private function __construct($file = 'DB.ini'){
       $this->file = $file;
       if (self::$verbinding == 'Klas'){
           $this->getConnAutoUser();
       }       
       $this->file = null;
    }

    public static function getConnection(string $verbinding){
        self::$verbinding = $verbinding;
        if ($verbinding == 'Klas'){
            if (! self::$connection) {
                new DB();
            }
            return self::$connection;            
      }           
        return null;
    }

    private function getConnAutoUser(){
       
        if (!($settings = parse_ini_file($this->file, TRUE))) {            
            throw new Exception('unable to open file '.$this->file);            
        }     
        try {
            $this->dns = $settings['Klas']['driver']. ':host='.$settings['Klas']['host'].';dbname='.$settings['Klas']['schema'].';port='.$settings['Klas']['port'];
            echo "de dns: " . $this->dns . '<br>';
            self::$connection = new PDO($this->dns,$settings['Klas']['username'],$settings['Klas']['password']);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_PERSISTENT, false);
            self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            echo 'connected to db';
        } catch(PDOException $e){
            echo $this->dns . '<br>';
            echo "could not connect to db: Klas" . '<br>';
            echo $e->getMessage();
            exit;
        }
    }
     
}
?>
