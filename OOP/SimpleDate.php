<?php

//de class Simpledate kan datums aanmaken die aangewezen kunnen worden aan andere objecten
class Simpledate{
    private $Day;
    private $Month;
    private $Year;

public function __construct($day, $month, $year){
    $this->Day = $day;
    $this->Month = $month;
    $this->Year = $year;
}

public function getDay(){
    return $this->Day;
}

public function getMonth(){
    return $this->Month;
}

public function getYear(){
    return $this->Year;
}

public function __toString()
{
    return  $this->getDay() . "-" . $this->getMonth() . "-" .  $this->getYear(); 
}
}

?>