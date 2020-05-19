<?php
    require_once 'Klas.php';
    include_once 'Docent.php';
    include_once 'Studierichting.php';

    $Docent = new Docent("HOI");
    $Studierichting = new Studierichting("DDR");
    $Klas = new Klas("KAMP");

    $Docent->setAchternaam('Influenza');
    $Docent->setTel('064343655');
    $Studierichting->setOmschrijving('Oude richting');
    $Klas->setOmschrijving('Klas');
    $Klas->setStudierichting('DDR');
    $Klas->setMentor('HOI');

    echo '<br>'. $Docent->getAfk() . '<br>' . $Docent->getAchternaam() . '<br>' . $Docent->getTel();
    echo '<br><br><br>';
    echo '<br>'. $Studierichting->getAfk() . '<br>' . $Studierichting->getOmschrijving();
    echo '<br><br><br>';
    echo '<br>'. $Klas->getAfk() . '<br>' . $Klas->getOmschrijving() . '<br>' . $Klas->getStudierichting() . '<br>' . $Klas->getMentor();
    $Docent->insert();
    $Studierichting->insert();
    $Klas->insert();
?>
