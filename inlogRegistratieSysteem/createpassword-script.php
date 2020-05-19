<?php
    //maak verbinding met de database
    include("./connect_db.php");

    // Maak de functie sanitize beschikbaar op de pagina functions.php
    include("./functions.php");

    $password = sanitize($_POST["password"]);
    $verify_password = sanitize($_POST["verify_password"]);
    $id = sanitize($_POST["id"]);
    $pw = sanitize($_POST["pw"]);

    if (!strcmp($password, $verify_password)){

        $sql = "SELECT * FROM `login` where `id` = $id";

        $result = mysqli_query($conn, $sql);

       if (mysqli_num_rows($result) == 1 ) {

        $record = mysqli_fetch_assoc($result);

        if (password_verify($record["password"], $pw) ) {
           //sla het password op in de database

           $blowfish_password = password_hash($password, PASSWORD_BCRYPT);

           if (!empty($password)&& !empty($verify_password)) {
               $sql = "UPDATE `login` 
               SET    `password` = '$blowfish_password'
               WHERE  `id`       =  $id";
       
               $result = mysqli_query($conn, $sql);
             
   
               if($result) {
               $sql = "SELECT * FROM `login` WHERE `id` =$id";
   
               $result = mysqli_query ($conn, $sql);
   
               $record = mysqli_fetch_assoc($result);
   
               $email = $record["email"];
   
                 echo '<div class="alert alert-success" role="alert">
                 Word door gestuurd naar login pagina
                  </div> ';
                  header("Refresh: 4; url=./index.php?content=loginform&email=$email");
                  }else{
                      echo '<div class="alert alert-danger" role="alert">
                      Probeer het nogmaals ;)
                    </div> ';
                    header("Refresh: 4; url=./index.php?content=home");
                  }
                  }else{
                      echo '<div class="alert alert-danger" role="alert">
                      wachtwoord veld niet ingevuld. probeer het nog een keer
                    </div> ';
                    header("Refresh: 4; url=./index.php?content=createpassword&id=$id");
                  }

        }else{
          //u mag geen gebruik maken van de activatiepagina 
            echo '<div class="alert alert-danger" role="alert">
          Het gehashde password matched niet met het is
          </div> ';
          header("Refresh: 4; url=./index.php?content=home");
        }
      }else{
          echo '<div class="alert alert-danger" role="alert">
          het id in de activatielink is niet bij ons bekent.
        </div> ';
        header("Refresh: 2; url=./index.php?content=home");
      }

    }else{
        echo '<div class="alert alert-danger" role="alert">
        Wachtwoorden zijn niet het zelfde.
      </div> ';
      header("Refresh: 4; url=./index.php?content=createpassword&id=$id&pw=$pw");
    }
?>