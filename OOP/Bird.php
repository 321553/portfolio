<?php
require_once "./Animal.php";

// de class Bird en de class Animal erbij geërft 
class Bird extends Animal{

    private $color;

    public function __construct(int $ChipRegistrationNumber,int  $day, int $month,int $year,string $name,string $color){
        $this->color = $color;
        parent::__construct($ChipRegistrationNumber, $day, $month, $year, $name);
        }

        public function __toString()
       {
        return parent::__toString() . " en de kleur is " . $this->color;
      }

      public function Getcolor()
      {
          return $this->color;
      }

}


?>