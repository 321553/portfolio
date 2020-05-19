<?php
//We maken contact met de mysql-server
include("./connect_db.php");

// We includen de sanitize funtion om de $_POST waarden schoon te maken.
include("./functions.php");

// Dit is een select query om de records uit de tabel te halen
$sql = "SELECT * FROM `login`";

// vuur de query af op de database en je krijgt antwoord terug. stop dit $result
$result = mysqli_query($conn, $sql);





?>
    <main class="container">

    <div class="row">
     <div class="col-12">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>


            </tr>
        </thead>

        <tbody>
            <?php
                        // $resultis niet leesbaar, we maken er een associatief array van
                        while ($record = mysqli_fetch_assoc($result)) {
                        echo "<tr><th scope = 'row'>" . $record["id"] . "</th>" .
                     "<td>" . $record["email"] . "</td>" .
                     "<td>" . $record["userrole"] . "</td>" .



                    "<td>
                        <a href='./update.php?id=". $record["id"] ."'>
                        <img src='./img/icons/edit.png' alt='edit' style='width: 20px; height: 20px;'>
                        </a>
                        </td>
                     <td>
                        <a href='./delete.php?id=". $record["id"] ."'>
                        <img src='./img/icons/b_drop.png' alt='drop' style='width: 20px; height: 20px;'>
                        </a>
                        </td>
                         </tr>";
                         }
            ?>
        </tbody>
</table>

     </div>
    </div>

    </main>