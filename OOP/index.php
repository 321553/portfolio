<?php

require_once "./administration.php";

$animalShelter = new administration();

$dog1 = new Dog(1234, 12,12,2012, 11,11,2011, "KEES");
$cat1 = new Cat(1235, 19,12,2009, "Minoes","teveel aandacht zoeken");
$bird1 = new Bird(1236, 06,07,2019,"Kakel","geel");
$fish1 = new Fish(1237,11,05,1996,"willem","zoutwater");

echo $dog1;
echo "<br>";
echo $cat1;
echo "<br>";
echo $bird1;
echo "<br>";
echo $fish1;
echo "<br>";

//voegt de dieren toe aan de administratie
echo $animalShelter->add($dog1);
echo $animalShelter->add($cat1);
echo $animalShelter->add($bird1);
echo $animalShelter->add($fish1);



?>