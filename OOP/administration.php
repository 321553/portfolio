<?php
require_once "./Dog.php";
require_once "./Cat.php";
require_once "./Bird.php";
require_once "./Fish.php";

class administration{
private $Animal = [];

// voegt een animal toe 
public function add(Animal $animal) : bool{ 
    $this->Animal [] = $animal;
    if($this->find($animal->getChipRegistrationNumber()) == $animal){
        return true;
    }else{
        return false;
    }
}

//verwijdert een animal op basis van chipnummer
public function remove($chipNumber) : bool{
    foreach($this->Animal as $index=>$values){
        if($chipNumber == $values->getChipRegistrationNumber()){
            unset($this->Animal[$index]);
        }
    }
    if(!$this->find($chipNumber)){
        return true ;
    }else
    return false;
}


// zoekt een animal op met het chipnummer
public function find($chipNumber) {
    foreach($this->Animal as $values){
        if($chipNumber == $values->getChipRegistrationNumber()){
            return $values;
        }
    }   

}


}

?>