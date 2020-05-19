<?php
    $id = $_GET["id"];
    
    //We maken contact met de mysql-server
    include("./connect_db.php");

    // We includen de sanitize funtion om de $_POST waarden schoon te maken.
    include("./functions.php");

    $sql = "select * from `users` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);
?>

    <main class="container">
   
    </div>
    <div class="row">
     <div class="col-12">
            <form action="./update_record.php" method="post">
        
        
        <div class="form-group">
            <label for="userrole">gebruikersrollen</label> 
            <select class="form-control" id="userrole" name="userrole">                   
                    <option value="customer">customer</option>
                    <option value="moderator">moderator</option>
                    <option value="root">root</option>
                    <option value="influencer">influencer</option>
                </select>
        </div>

        

               
        </div>
        <input type="hidden" name = "id" value ="<?php echo $id; ?>">
        <button type="submit" class="btn btn-primary">Versturen</button>
        </form>
        </div>
        </div>
        </div>
    
    </main>
