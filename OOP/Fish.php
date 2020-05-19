<?php
require_once "./Animal.php";

class Fish extends Animal{

private $ZoetOfZoutWater;
public function __construct(int $ChipRegistrationNumber,int  $day, int $month,int $year,string $name,string $ZoetOfZoutWater){
    $this->ZoetOfZoutWater = $ZoetOfZoutWater;
    parent::__construct($ChipRegistrationNumber, $day, $month, $year, $name);
    }

    public function __toString()
   {
    return parent::__toString() . " en hij zwemt in " . $this->ZoetOfZoutWater;
  }

  public function Getwater()
  {
      return $this->ZoetOfZoutWater;
  }


}



?>