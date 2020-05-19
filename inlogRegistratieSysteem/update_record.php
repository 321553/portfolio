<?php 

    var_dump($_POST);
    //We maken contact met de mysql-server
    include("./connect_db.php");

    // We includen de sanitize funtion om de $_POST waarden schoon te maken.
    include("./functions.php");

    $id = $_POST["id"];
    $userrole = sanitize($_POST["userrole"]);

    $sql = "UPDATE `login` SET      `userrole` = '$userrole' 
             WHERE `id` = $id;";
    mysqli_query($conn, $sql);

    header("location: ./index.php?content=gebruikersrollen");
?>