<?php
    if (!isset($_SESSION["id"])){
    echo '<div class="alert alert-danger" role="alert">
    U moet eerst ingelogd zijn.
  </div>';
 header("Refresh: 4; url=./index.php?content=loginform");
 exit();
}else if( !in_array($_SESSION["userrole"], $userrole)){  
    echo '<div class="alert alert-danger" role="alert">
    u heeft geen toegang
  </div>';
 header("Refresh: 4; url=./index.php?content=logout");

 exit();
}
?>
