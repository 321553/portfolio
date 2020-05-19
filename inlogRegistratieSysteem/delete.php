<?php 

// Zet je id in een variabele id
$id = $_GET["id"];

//maak een verbinding met de mysql-server
include("./connect_db.php");

// maak een delete query om een record te verwijderen
$sql = "DELETE  FROM `login` WHERE `id` = $id"; 

// verstuur een sql query naar de database
mysqli_query($conn,$sql);

// stuur de gebruiker door naar show.php
header("location: ./index.php?content=gebruikersrollen");

// We includen de sanitize funtion om de $_POST waarden schoon te maken.
include("./functions.php");
?>