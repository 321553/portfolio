<div class="row">
    <div class= "col-4">
    </div>
   <div class= "col-4"> 

    <form action="./index.php?content=createpassword-script" method="post">
    <div class="form-group">
        <label for="InputPassword">wachtwoord</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="Vul hier uw wachtwoord in" name= "password">
    </div>
    <div class="form-group">
        <label for="InputPassword2">herhaal wachtwoord</label>
        <input type="password" class="form-control" id="InputPassword2" placeholder="herhaal uw wachtwoord" name="verify_password">
    </div>
    <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
    <input type="hidden" value="<?php echo $_GET["pw"]; ?>" name="pw">
    <button type="submit" class="btn btn-primary">Sla op</button>
    </form>
   </div>
   <div class= "col-4">
    </div>