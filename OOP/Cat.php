<?php
require_once "./Animal.php";

// de class Cat en de class Animal erbij geërft 
class Cat extends Animal{

    private $BadHabits; 

    public function __construct(int $ChipRegistrationNumber,int  $day, int $month,int $year,string $name,string $BadHabits){
    $this->BadHabits = $BadHabits;
    parent::__construct($ChipRegistrationNumber, $day, $month, $year, $name);
    }

    public function __toString()
    {
        return parent::__toString() . " en zijn slechte gewoonte is " . $this->BadHabits;
    }
    
    public function GetBadhabits()
    {
        return $this->BadHabits;
    }


}




?>