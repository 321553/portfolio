<?php 
    session_unset();
    session_destroy();
    echo ' <div class="alert alert-danger" role="alert">
        U bent uitgelogd en word doorgestuurd naar de homepagina
      </div> ';
    header("Refresh: 4; url=./index.php?content=home");

?>