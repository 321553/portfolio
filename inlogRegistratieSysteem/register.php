<?php 
include("./connect_db.php");

include("./functions.php");
// het email is nu schoon

$email = sanitize($_POST["email"]);

$sql = "SELECT * FROM `login` WHERE `email` = '$email'";

//vuur query af op database
$result = mysqli_query($conn, $sql);

// tel het aantal resultaten uit de database voor dat emailadres
if (mysqli_num_rows($result) == 1) {
    echo '<div class="alert alert-secondary" role="alert">
   Dit email is al in gebruik.
  </div> ';
    header("Refresh:4; url=./index.php?content=registerform");
}else{
  //PASSWORD VERZINNEN! 
  date_default_timezone_set("Europe/Amsterdam");
  $date = date('d/m/Y H:i:s:u ');
  $part_of_email = substr($email,3,4);
  // echo $date.$part_of_email."|".$email; exit();
  $password = $date.$part_of_email;

  //hash van dit password gaat mee met de activatielink
  $password_hash = password_hash($password,PASSWORD_BCRYPT);

// we maken onze insert-query
$sql = "INSERT INTO `login` (`id`,
                             `email`,
                             `password`,
                             `userrole`)
                   VALUES   (NULL,
                             '$email',
                             '$password',
                             'inspection')";

    $result = mysqli_query($conn, $sql);

    // met mysqli_insert_id($conn) kun je het laatst gemaakte id aanvragen
    $id = mysqli_insert_id($conn);
    // var_dump($result);

    if($result) {
      $to = "$email";
      $subject = "Activatielink http://www.loginregistration.com";
      $message =  '<!DOCTYPE html>
                   <html>
                   <head>
                   <title>Test </title>
                   <style>
                    body {background-color: #E9ECEF;}
                   </style>
                   </head>
                   <body>
                   <h1>Beste klant,</h1> <p>Bedankt voor het registreren.</p>
                   <p>Door op de onderstaande activatielinkt te klikken word het registratieproces voltooid.</p>
                   <p>
                   <a href="http://inlog321553.stateu.org/index.php?content=createpassword&id=' . $id . '&pw='
                    . $password_hash . '">Activeer Uw account</a> 
                   </p>
                   <p>Groet,</p> 
                   <p>THE FBI</p>
                   </body>
                  </html>';
    
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: Admin@loginregistration.com' . "\r\n";
      $headers .= 'Cc: E@E.com; B@B.nl' . "\r\n";
      $headers .= 'Bcc: myboss@example.com' . "\r\n";

      mail($to,$subject,$message,$headers);

        echo ' <div class="alert alert-success" role="alert">
        U heeft één email gekregen.
      </div> ';
      header("Refresh: 4; url=./index.php?content=registerform");
    }else{
        echo ' <div class="alert alert-danger" role="alert">
        U heeft geen email gekregen.
      </div> ';
      header("Refresh: 4; url=./index.php?content=registerform");
    }

}
?>
