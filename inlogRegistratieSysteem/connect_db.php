<?php 
// dit zijn constante waarden voor het inloggen in de database
define("SERVERNAME", "45.79.98.195");
define("USERNAME", "adhpqhcl_root");
define("PASSWORD", "xZ14SIZnPwwF");
define("DBNAME", "adhpqhcl_inlog12");

// hier maak ik verbinding met mysqli-server en database
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
?>

