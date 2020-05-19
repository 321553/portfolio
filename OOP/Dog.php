<?php
require_once "./Animal.php";
require_once "./SimpleDate.php";

// de class Dog en de class Animal erbij geërft 
class Dog extends Animal{
 
    private $LastWalkDate;

    public function __construct($chipRegistrationNumber,  $birthday, $birthmonth, $birthyear, $walkday, $walkmonth, $walkyear, $name){
        parent::__construct($chipRegistrationNumber, $birthday, $birthmonth, $birthyear, $name);
        $this->LastWalkDate = new Simpledate($walkday, $walkmonth, $walkyear);
    }

    public function __toString()
    {
        return parent::__toString() . " en hij is voor het laatst uitgelaten op " . $this->GetLastWalkDate();
    }

    public function GetLastWalkDate(){
        return $this->LastWalkDate;
    }

}

?>