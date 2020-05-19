<?php

require_once "./SimpleDate.php";
// de class
class Animal{
    
    // de attributen
    protected $ChipRegistrationNumber ;
    protected $name;
    protected $IsReserved;
    private $dateOfBirth;

    // de constructor 
    public function __construct($chipRegistrationNumber, $day, $month, $year, $name){
        $this->ChipRegistrationNumber = $chipRegistrationNumber;
        $this->Name = $name;
        $this->dateOfBirth  = new Simpledate($day,$month,$year);

    }

    //de getters / setters halen de gegevens op en setten ze 
    public function getDate(){
        return $this->dateOfBirth;
    }

    public function getName(){
        return $this->name;
    }

    public function getChipRegistrationNumber(){
        return $this->ChipRegistrationNumber;
    }


    // de tostring functie  zet alles achter elkaar met tekst erbij
    public function __toString()
    {
        return" chipregistratienummer is " . $this->ChipRegistrationNumber . " de naam is " . $this->Name . " en de geboortedatum is " . $this->dateOfBirth;
    }


}









?>